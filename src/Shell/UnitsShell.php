<?php
namespace App\Shell;

use App\Model\Entity\Gender;
use App\Model\Entity\Job;
use App\Model\Entity\Origin;
use App\Model\Entity\Race;
use App\Model\Entity\Rarity;
use App\Model\Entity\Unit;
use Cake\Cache\Cache;
use Cake\Chronos\Chronos;
use Cake\Console\ConsoleIo;
use Cake\Console\Shell;
use Cake\Http\Client;
use Cake\I18n\FrozenTime;
use Cake\Utility\Text;

/**
 * Units shell command.
 *
 * @property \App\Model\Table\UnitsTable $Units
 * @property \App\Model\Table\GendersTable $Genders
 * @property \App\Model\Table\JobsTable $Jobs
 * @property \App\Model\Table\OriginsTable $Origins
 * @property \App\Model\Table\SpecialisationsTable $Specialisations
 * @property \App\Model\Table\RaritiesTable $Rarities
 * @property \App\Model\Table\RacesTable $Races
 */
class UnitsShell extends Shell
{
    /**
     * UnitsShell constructor.
     *
     * @param \Cake\Console\ConsoleIo|null $io ConsoleIO instance to modify
     */
    public function __construct($io = null)
    {
        parent::__construct($io);

        $this->_io->styles('unit', ['text' => 'magenta']);
        $this->_io->styles('success', ['text' => 'green']);
    }

    /**
     * Manage the available sub-commands along with their arguments and help
     *
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     *
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        $parser->addSubcommand('update', [
            'help' => __('Synchronise the units from the wiki with those in the local database.'),
            'parser' => [
                'description' => [__('This command will parse the exviuswiki unit data and update, or add to the local database')]
            ]
        ]);

        return $parser;
    }

    /**
     * main() method.
     *
     * @return void
     */
    public function main()
    {
        $this->out($this->OptionParser->help());
    }

    /**
     * Update the local database unit data with data pulled from ExviusWiki.com
     *
     * @return void
     */
    public function update()
    {
        $dbBackup = $this->in('Have you backed up the database?', ['y', 'n'], 'n');
        if ($dbBackup === 'n') {
            $this->out(__("<info>It is recommended to backup the database before running this shell.</info>"));
            $this->_stop();
        }

        $unitListUrl = 'https://exvius.gamepedia.com/Unit_List';

        $html = Cache::read('unitList', 'day');
        if (!$html) {
            $client = new Client();
            $response = $client->get($unitListUrl);

            if (!$response->isOk()) {
                if ($response->isRedirect()) {
                    $this->out(__("<error>Got a redirect response from `$unitListUrl` was {$response->getStatusCode()} {$response->getReasonPhrase()}, tried to redirect to {$response->getHeaderLine('Location')}.</error>"));
                    $this->_stop();
                } else {
                    $this->out(__("<error>Something went wrong. Response from `$unitListUrl` was {$response->getStatusCode()} {$response->getReasonPhrase()}</error>"));
                    $this->_stop();
                }
            }

            $html = $response->body();
            Cache::write('unitList', $html, 'day');

            $this->out('<comment>Loading unit list from the wiki.</comment>', 2);
        } else {
            $this->out('<comment>Loading unit list from cache.</comment>', 2);
        }

        $updated = 0;
        $added = 0;

        // Turn off parsing warnings
        // @see http://php.net/manual/en/domdocument.loadhtml.php#95463
        libxml_use_internal_errors(true);

        $document = new \DOMDocument();
        $document->loadHTML($html, LIBXML_NONET);
        $document->preserveWhiteSpace = false;

        $contentDiv = $document->getElementById('mw-content-text');

        /* @var \DOMNodeList $tables */
        $tables = $contentDiv->getElementsByTagName('table');

        for ($k = 0; $k <= 3; $k++) {
            $table = $tables->item($k);

            // Start at index 3 to skip the header row
            for ($j = 3; $j < $table->childNodes->length; $j++) {
                $row = $table->childNodes->item($j);

                if ($row->hasChildNodes()) {
                    $unit = [];
                    $unit['sprite'] = $row->childNodes->item(1)->childNodes->item(1)->childNodes->item(0)->attributes->getNamedItem('src')->value;
                    $unit['name'] = trim($row->childNodes->item(3)->nodeValue);
                    $unit['origin'] = trim($row->childNodes->item(5)->nodeValue);
                    $unit['roles'] = trim($row->childNodes->item(7)->nodeValue);
                    $unit['minRarity'] = trim($row->childNodes->item(9)->nodeValue);
                    $unit['maxRarity'] = trim($row->childNodes->item(11)->nodeValue);
                    $unit['trustMaster'] = trim($row->childNodes->item(13)->nodeValue);

                    /* @var \App\Model\Entity\Unit $localUnit */
                    $this->loadModel('Units');
                    $localUnit = $this->Units->find()
                        ->contain([
                            'MaxRarity'
                        ])
                        ->where(['name' => $unit['name']])
                        ->first();

                    if (!$localUnit) {
                        $added++;
                        $localUnit = $this->buildNewUnit($unit);
                    } else {
                        if ($localUnit->max_rarity->get('stars') !== (int)$unit['maxRarity'] || empty($localUnit->get('image'))) {
                            $spriteDetails = $this->saveSprite($unit, $localUnit);
                            $localUnit->set('image', $spriteDetails['filename']);
                            $localUnit->set('image_dir', $spriteDetails['directory']);
                        }
                    }

                    $localUnit->set('specialisations', $this->getRole($unit));
                    $localUnit->set('origin', $this->getOrigin($unit));
                    $localUnit->set('base_rarity', $this->getRarity($unit, $unit['minRarity']));
                    $localUnit->set('max_rarity', $this->getRarity($unit, $unit['maxRarity']));
                    $localUnit->set('trust_master_reward', $unit['trustMaster']);
                    $localUnit->set('modified', new FrozenTime());

                    if ($this->Units->save($localUnit)) {
                        $updated++;
                        $this->out(__("<success>Updated information for </success>`<unit>{$unit['name']}</unit>`"));
                    } else {
                        $this->out(__("<error>Could not save new data for </error>`<unit>{$unit['name']}</unit>`"));
                        $this->_stop();
                    }
                }
            } // End looping table rows
        } // End looping tables

        $this->out(null, 2);
        $this->out("Completed. Updated <info>$updated</info> and added <info>$added</info>.");
    }

    /**
     * Create a new Unit entity, using data from the ExviusWiki.com unit page
     *
     * @param array $unit Array of unit data pulled from the web
     * @return \App\Model\Entity\Unit
     */
    protected function buildNewUnit(array $unit): Unit
    {
        $localUnit = $this->Units->newEntity();
        $localUnit->set('name', $unit['name']);

        if (strpos($unit['name'], "'") !== false) {
            $wikiName = urlencode($unit['name']);
            $wikiName = str_replace(' ', '_', $wikiName);
        } else {
            $wikiName = Text::slug($unit['name'], ['replacement' => '_']);
        }

        $singleUnitUrl = 'https://exvius.gamepedia.com/' . $wikiName;

        $unitPageHtml = Cache::read($wikiName, 'day');
        if (!$unitPageHtml) {
            // Use the random wait here, to attempt to simulate random traffic, and avoid bashing their server.
            $wait = rand(5, 19);
            $this->out("<warning>Cannot find </warning>`<unit>{$unit['name']}</unit>`<warning> in the local db. Adding new unit in $wait seconds.</warning>");
            sleep($wait);

            $client = new Client();
            $response = $client->get($singleUnitUrl);

            if (!$response->isOk()) {
                if ($response->isRedirect()) {
                    $this->out(__("<error>Got a redirect response from `$singleUnitUrl` was {$response->getStatusCode()} {$response->getReasonPhrase()}, tried to redirect to {$response->getHeaderLine('Location')}.</error>"));
                    $this->_stop();
                } else {
                    $this->out(__("<error>Something went wrong. Response from `$singleUnitUrl` was {$response->getStatusCode()} {$response->getReasonPhrase()}</error>"));
                    $this->_stop();
                }
            }

            $unitPageHtml = $response->body();
            Cache::write($wikiName, $unitPageHtml, 'day');
        } else {
            $this->out("<info>Cannot find </info>`<unit>{$unit['name']}</unit>`<info> in the local db. Adding new unit from cache.</info>");
        }

        $document = new \DOMDocument();
        $document->loadHTML($unitPageHtml);

        $content = $document->getElementById('mw-content-text');
        $tables = $content->getElementsByTagName('table');

        // Load extra data from the unit details table
        $unitDataTable = $tables->item(0);

        $job = trim($unitDataTable
            ->childNodes
            ->item(7)
            ->childNodes->item(3)
            ->nodeValue);
        $unit['job'] = $job;
        $localUnit->set('job', $this->getJob($unit));

        $gender = preg_replace("/\W+/", '', $unitDataTable->childNodes->item(19)->childNodes->item(3)->nodeValue);
        $unit['gender'] = $gender;
        $localUnit->set('gender', $this->getGender($unit));

        $race = trim($unitDataTable->childNodes->item(21)->childNodes->item(3)->nodeValue);
        $unit['race'] = $race;
        $localUnit->set('race', $this->getRace($unit));

        // Trust masters are in an extra table element
        $finder = new \DOMXPath($document);
        $tables = $finder->query("//table[contains(concat(' ', @class, ' '), ' wikitable ') and not(contains(concat(' ', @class, ' '), ' ibox '))]");

        $unitStatsTable = $tables->item(0);

        $lastRow = (int)$unitStatsTable->childNodes->length - 1;

        // Get the highest rarity stats for the unit
        $hp = (int)trim(
            $unitStatsTable
                ->childNodes
                ->item($lastRow)
                ->childNodes
                ->item(3)
                ->nodeValue
        );
        $localUnit->set('hp', $hp);

        $mp = (int)trim(
            $unitStatsTable
                ->childNodes
                ->item($lastRow)
                ->childNodes
                ->item(5)
                ->nodeValue
        );
        $localUnit->set('mp', $mp);

        $atk = (int)trim($unitStatsTable->childNodes->item($lastRow)->childNodes->item(7)->nodeValue);
        $localUnit->set('atk', $atk);

        $def = (int)trim($unitStatsTable->childNodes->item($lastRow)->childNodes->item(9)->nodeValue);
        $localUnit->set('def', $def);

        $mag = (int)trim($unitStatsTable->childNodes->item($lastRow)->childNodes->item(11)->nodeValue);
        $localUnit->set('mag', $mag);

        $spr = (int)trim($unitStatsTable->childNodes->item($lastRow)->childNodes->item(13)->nodeValue);
        $localUnit->set('spr', $spr);

        $hits = (int)trim($unitStatsTable->childNodes->item($lastRow)->childNodes->item(15)->nodeValue);
        $localUnit->set('hits', $hits);

        // Get the description
        $firstParagraph = $document->getElementsByTagName('p')[0];
        $description = $firstParagraph->nodeValue;
        $localUnit->set('description', $description);

        // Save the sprite
        $spriteDetails = $this->saveSprite($unit, $localUnit);
        $localUnit->set('image', $spriteDetails['filename']);
        $localUnit->set('image_dir', $spriteDetails['directory']);

        return $localUnit;
    }

    /**
     * Copy the remote sprite image to the local file system and return it's details
     *
     * @param array $unit Array of unit data
     * @param \App\Model\Entity\Unit|null $localUnit The current unit entity from the local db
     *
     * @return array
     */
    protected function saveSprite(array $unit, Unit $localUnit = null): array
    {
        if ($localUnit !== null && !empty($localUnit->get('image_dir'))) {
            $folder = $localUnit->get('image_dir');
        } else {
            $folder = Text::uuid();
        }

        $remoteImage = explode('?', $unit['sprite']);

        $fileName = basename($remoteImage[0]);

        $localImage = WWW_ROOT . 'files' . DS . 'units' . DS . 'image' . DS . $folder . DS . $fileName;
        if (!file_exists(WWW_ROOT . 'files' . DS . 'units' . DS . 'image' . DS . $folder)) {
            mkdir(WWW_ROOT . 'files' . DS . 'units' . DS . 'image' . DS . $folder);
        }
        copy($remoteImage[0], $localImage);

        $this->out("-> Copying new sprite for unit `<unit>{$unit['name']}</unit>`");

        return [
            'filename' => $fileName,
            'directory' => $folder
        ];
    }

    /**
     * Get a gender entity by name
     *
     * @param array $unit Array of unit data
     *
     * @return \App\Model\Entity\Gender
     */
    protected function getGender(array $unit): Gender
    {
        $this->loadModel('Genders');
        $gender = $this->Genders->find()
            ->where(['name' => $unit['gender']])
            ->first();

        if (!$gender) {
            $this->out("<error>Could not find gender `{$unit['gender']}` for unit</error> `<unit>{$unit['name']}</unit>`");
            $this->_stop();
        }

        return $gender;
    }

    /**
     * Convert a string into a job entity
     *
     * @param array $unit Array of unit data
     *
     * @return \App\Model\Entity\Job
     */
    protected function getJob(array $unit): Job
    {
        $this->loadModel('Jobs');
        $job = $this->Jobs->find()
            ->where(['name' => $unit['job']])
            ->first();

        if (!$job) {
            $job = $this->Jobs->newEntity([
                'name' => $unit['job']
            ]);

            if ($this->Jobs->save($job)) {
                $this->out("-> Added new job `<comment>{$unit['job']}</comment>` for unit `<unit>{$unit['name']}</unit>`");
            }
        }

        return $job;
    }

    /**
     * Convert the name of an origin into an entity form for linking
     *
     * @param array $unit Array of unit data
     *
     * @return \App\Model\Entity\Origin
     */
    protected function getOrigin(array $unit): Origin
    {
        $this->loadModel('Origins');
        $origin = $this->Origins->find()
            ->where(['shortname' => $unit['origin']])
            ->first();

        if (!$origin) {
            $origin = $this->Origins->newEntity([
                'name' => $unit['origin'],
                'shortname' => $unit['origin'],
            ]);

            if ($this->Origins->save($origin)) {
                $this->out("-> Added new origin `<comment>{$origin['name']}</comment>` for unit `<unit>{$unit['name']}</unit>`");
            }
        }

        return $origin;
    }

    /**
     * Convert a comma separated role string into an array of specialisation entities
     *
     * @param array $unit Array of unit data
     *
     * @return array
     */
    protected function getRole(array $unit): array
    {
        $this->loadModel('Specialisations');
        $roles = $this->Specialisations->find()
            ->where([
                'name IN' => explode(', ', $unit['roles'])
            ]);

        if (!$roles) {
            $this->out("<error>Could not find roles `{$unit['roles']}` for unit</error> `<unit>{$unit['name']}</unit>`");
            $this->_stop();
        }

        return $roles->toArray();
    }

    /**
     * Convert a rarity star rating into an entity
     *
     * @param array $unit Array of unit data
     * @param int $rarity Rarity in number of stars
     *
     * @return \App\Model\Entity\Rarity
     */
    protected function getRarity(array $unit, $rarity): Rarity
    {
        $this->loadModel('Rarities');
        $rarity = $this->Rarities->find()
            ->where(['stars' => $rarity])
            ->first();

        if (!$rarity) {
            $this->out("<error>Could not find rarity `{$rarity}` for unit</error> `<unit>{$unit['name']}</unit>`");
            $this->_stop();
        }

        return $rarity;
    }

    /**
     * Convert a race into an entity
     *
     * @param array $unit Array of unit data
     *
     * @return \App\Model\Entity\Race
     */
    protected function getRace(array $unit): Race
    {
        $this->loadModel('Races');
        $race = $this->Races->find()
            ->where(['name' => $unit['race']])
            ->first();

        if (!$race) {
            $race = $this->Races->newEntity([
                'name' => $unit['race']
            ]);

            if ($this->Races->save($race)) {
                $this->out("-> Added new race `<comment>{$unit['job']}</comment>` for unit `<unit>{$unit['name']}</unit>`");
            }
        }

        return $race;
    }
}
