<?php
namespace App\Shell;

use Cake\Cache\Cache;
use Cake\Chronos\Chronos;
use Cake\Console\Shell;
use Cake\Http\Client;
use Cake\I18n\FrozenTime;
use Cake\Utility\Text;

/**
 * Units shell command.
 */
class UnitsShell extends Shell
{

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
     * @return bool|int Success or error code.
     */
    public function main() 
    {
        $this->out($this->OptionParser->help());
    }

    /**
     * Update the local database unit data with data pulled from ExviusWiki.com
     */
    public function update()
    {
        $dbBackup = $this->in('Have you backed up the database?', ['y', 'n'], 'n');
        if ($dbBackup === 'n') {
            $this->out(__("<info>It is recommended to backup the database before running this shell.</info>"));
            $this->_stop();
        }

        $unitListUrl = 'https://exviuswiki.com/Unit_List';

        $html = Cache::read('unitList', 'day');
        if (!$html) {
            $client = new Client();
            $response = $client->get($unitListUrl);

            if (!$response->isOk()) {
                $this->out(__("<error>Something went wrong. Response from `$unitListUrl` was {$response->getStatusCode()} {$response->getReasonPhrase()}</error>"));
                $this->_stop();
            }

            $html = $response->body();
            Cache::write('unitList', $html, 'day');
        }

        // Turn off parsing warnings
        // @see http://php.net/manual/en/domdocument.loadhtml.php#95463
        libxml_use_internal_errors(true);

        $document = new \DOMDocument();
        $document->loadHTML($html, LIBXML_NONET);

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
                    $unit['name'] = trim($row->childNodes->item(3)->nodeValue);
                    $unit['origin'] = trim($row->childNodes->item(5)->nodeValue);
                    $unit['roles'] = trim($row->childNodes->item(7)->nodeValue);
                    $unit['minRarity'] = trim($row->childNodes->item(9)->nodeValue);
                    $unit['maxRarity'] = trim($row->childNodes->item(11)->nodeValue);
                    $unit['trustMaster'] = trim($row->childNodes->item(13)->nodeValue);

                    /* @var \App\Model\Entity\Unit $localUnit */
                    $this->loadModel('Units');
                    $localUnit = $this->Units->find()
                        ->where(['name' => $unit['name']])
                        ->first();

                    if (!$localUnit) {
                        $localUnit = $this->buildNewUnit($unit);
                    }

                    $localUnit->set('specialisations', $this->getRole($unit));
                    $localUnit->set('origin', $this->getOrigin($unit));
                    $localUnit->set('base_rarity', $this->getRarity($unit, $unit['minRarity']));
                    $localUnit->set('max_rarity', $this->getRarity($unit, $unit['maxRarity']));
                    $localUnit->set('trust_master_reward', $unit['trustMaster']);
                    $localUnit->set('modified', new FrozenTime());

                    // TODO: Find out why the new unit entity, seems to drop it's primary key when trying to update
//                    if ($unit['name'] === 'Lid') {
//                        var_dump($localUnit);
//                        exit;
//                    }

                    if ($this->Units->save($localUnit)) {
                        $this->out(__("Updated information for `{$unit['name']}`"));
                    } else {
                        $this->out(__("<error>Could not save new data for `{$unit['name']}`</error>"));
                        $this->_stop();
                    }
                }
            } // End looping table rows
        } // End looping tables
    }

    /**
     * Create a new Unit entity, using data from the ExviusWiki.com unit page
     *
     * @param array $unit
     * @return \App\Model\Entity\Unit
     */
    protected function buildNewUnit(array $unit)
    {
        $localUnit = $this->Units->newEntity();
        $localUnit->set('name', $unit['name']);

        $wikiName = Text::slug($unit['name'], '_');
        $singleUnitUrl = 'https://exviuswiki.com/' . $wikiName;

        $unitPageHtml = Cache::read($wikiName, 'day');
        if (!$unitPageHtml) {
            // Use the random wait here, to attempt to simulate random traffic, and avoid bashing their server.
            $wait = rand(5, 19);
            $this->out("<info>Cannot find `{$unit['name']}` in the local db. Adding new unit in $wait seconds.</info>");
            sleep($wait);

            $client = new Client();
            $response = $client->get($singleUnitUrl);

            if (!$response->isOk()) {
                $this->out(__("<error>Something went wrong. Response from `$singleUnitUrl` was {$response->getStatusCode()} {$response->getReasonPhrase()}</error>"));
                $this->_stop();
            }

            $unitPageHtml = $response->body();
            Cache::write($wikiName, $unitPageHtml, 'day');
        } else {
            $this->out("<info>Cannot find `{$unit['name']}` in the local db. Adding new unit from cache.</info>");
        }

        $document = new \DOMDocument();
        $document->loadHTML($unitPageHtml);

        $content = $document->getElementById('mw-content-text');
        $tables = $content->getElementsByTagName('table');

        // Load extra data from the unit details table
        $unitDataTable = $tables->item(0);

        $job = trim($unitDataTable->childNodes->item(3)->childNodes->item(2)->nodeValue);
        $unit['job'] = $job;
        $localUnit->set('job', $this->getJob($unit));

        $gender = trim($unitDataTable->childNodes->item(6)->childNodes->item(2)->nodeValue);
        $unit['gender'] = $gender;
        $localUnit->set('gender', $this->getGender($unit));

        $race = trim($unitDataTable->childNodes->item(7)->childNodes->item(2)->nodeValue);
        $unit['race'] = $race;
        $localUnit->set('race', $this->getRace($unit));

        // Get the highest rarity stats for the unit
        $unitStatsTable = $tables->item(1);
        $lastRow = (int)$unitStatsTable->childNodes->length - 1;

        $hp = (int)trim($unitStatsTable->childNodes->item($lastRow)->childNodes->item(2)->nodeValue);
        $localUnit->set('hp', $hp);

        $mp = (int)trim($unitStatsTable->childNodes->item($lastRow)->childNodes->item(4)->nodeValue);
        $localUnit->set('mp', $mp);

        $atk = (int)trim($unitStatsTable->childNodes->item($lastRow)->childNodes->item(6)->nodeValue);
        $localUnit->set('atk', $atk);

        $def = (int)trim($unitStatsTable->childNodes->item($lastRow)->childNodes->item(8)->nodeValue);
        $localUnit->set('def', $def);

        $mag = (int)trim($unitStatsTable->childNodes->item($lastRow)->childNodes->item(10)->nodeValue);
        $localUnit->set('mag', $mag);

        $spr = (int)trim($unitStatsTable->childNodes->item($lastRow)->childNodes->item(12)->nodeValue);
        $localUnit->set('spr', $spr);

        $hits = (int)trim($unitStatsTable->childNodes->item($lastRow)->childNodes->item(14)->nodeValue);
        $localUnit->set('hits', $hits);

        // Get the description
        $content->getElementsByTagName('p');
        $description = $content->childNodes->item(1)->nodeValue;
        $localUnit->set('description', $description);

        return $localUnit;
    }

    /**
     * Get a gender entity by name
     *
     * @param array $unit
     *
     * @return \Cake\Datasource\EntityInterface
     */
    protected function getGender(array $unit)
    {
        $this->loadModel('Genders');
        $gender = $this->Genders->find()
            ->where(['name' => $unit['gender']])
            ->first();

        if (!$gender) {
            $this->out("<error>Could not find gender `{$unit['gender']}` for unit {$unit['name']}</error>");
            $this->_stop();
        }

        return $gender;
    }

    /**
     * Convert a string into a job entity
     *
     * @param array $unit
     *
     * @return \Cake\Datasource\EntityInterface
     */
    protected function getJob(array $unit)
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
                $this->out("Added new job `{$unit['job']}` for unit `{$unit['name']}`");
            }
        }

        return $job;
    }

    /**
     * Convert the name of an origin into an entity form for linking
     *
     * @param array $unit
     *
     * @return \Cake\Datasource\EntityInterface
     */
    protected function getOrigin(array $unit)
    {
        $this->loadModel('Origins');
        $origin = $this->Origins->find()
            ->where(['shortname' => $unit['origin']])
            ->first();

        if (!$origin) {
            $this->out("<error>Could not find origin `{$unit['origin']}` for unit {$unit['name']}</error>");
            $this->_stop();
        }

        return $origin;
    }

    /**
     * Convert a comma separated role string into an array of specialisation entities
     *
     * @param array $unit
     *
     * @return array
     */
    protected function getRole(array $unit)
    {
        $this->loadModel('Specialisations');
        $roles = $this->Specialisations->find()
            ->where([
                'name IN' => explode(', ', $unit['roles'])
            ]);

        if (!$roles) {
            $this->out("<error>Could not find roles `{$unit['roles']}` for unit {$unit['name']}</error>");
            $this->_stop();
        }

        return $roles->toArray();
    }

    /**
     * Convert a rarity star rating into an entity
     *
     * @param array $unit
     * @param int $rarity
     *
     * @return \Cake\Datasource\EntityInterface
     */
    protected function getRarity(array $unit, $rarity)
    {
        $this->loadModel('Rarities');
        $rarity = $this->Rarities->find()
            ->where(['stars' => $rarity])
            ->first();

        if (!$rarity) {
            $this->out("<error>Could not find rarity `{$rarity}` for unit {$unit['name']}</error>");
            $this->_stop();
        }

        return $rarity;
    }

    /**
     * Convert a race into an entity
     *
     * @param array $unit
     *
     * @return \Cake\Datasource\EntityInterface
     */
    protected function getRace(array $unit)
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
                $this->out("Added new race `{$unit['job']}` for unit `{$unit['name']}`");
            }
        }

        return $race;
    }
}
