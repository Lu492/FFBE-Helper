<?php

/**
 * UnitsController.php
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace App\Controller;

use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Utility\Text;

/**
 * @property \App\Model\Table\RaritiesTable $Rarities
 * @property \App\Model\Table\UnitsTable $Units
 * @property \Search\Controller\Component\PrgComponent $Prg
 */
class UnitsController extends AppController
{
    /**
     * Initialize the controller
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Search.Prg', ['action' => ['index']]);

        $this->Auth->allow([
            'index'
        ]);
    }

    /**
     * beforeFilter method
     *
     * @param \Cake\Event\Event $event Event instance
     *
     * @return void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $this->loadModel('Rarities');
        $this->set('rarities', $this->Rarities->find()->order('stars')->toArray());

        // Reset the saved party in the session when not doing ajax to refresh units
        if (!$this->request->is('ajax') && $this->request->getSession()->read('party') !== null) {
            $this->request->getSession()->delete('party');
        }
    }

    /**
     * List all the available units
     *
     * Can generate different lists of units depending on what is passed
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        if (empty($this->request->getParam('type'))) {
            $this->request = $this->request->withParam('type', 'all');
        }

        $this->paginate = [
            'sortWhitelist' => [
                'name',
                'origin_id',
                'Jobs.name',
                'base_rarity',
                'max_rarity',
                'Acquires.rarity',
                'Acquires.level',
                'Acquires.trust',
                'hp', 'mp', 'atk', 'def', 'mag', 'spr', 'hits'
            ]
        ];

        $query = $this->Units->find('search', ['search' => $this->request->getQuery()])
            ->contain([
                'Races',
                'Jobs',
                'Genders',
                'Origins',
                'Specialisations',
                'BaseRarity',
                'MaxRarity'
            ]);

        if (empty($this->request->getQuery('sort'))) {
            $query->order(['Units.name']);
        }

        // Don't try and filter units if the user isn't logged in
        if (empty($this->Auth->user('id')) && $this->request->getParam('type') !== 'all') {
            $this->Flash->set(__('You must login to access that page.'), ['key' => 'auth']);

            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        if ($this->request->getParam('type') === 'acquired') {
            $query->matching('Acquires', function ($q) {
                return $q->where(['Acquires.user_id' => $this->Auth->user('id')]);
            });
        } elseif ($this->request->getParam('type') === 'available') {
            $query->notMatching('Acquires', function ($q) {
                return $q->where(['Acquires.user_id' => $this->Auth->user('id')]);
            });
        }

        $this->set('units', $this->paginate($query, ['limit' => 150]));
        $this->set('origins', $this->Units->Origins->find('list', ['keyField' => 'id', 'valueField' => 'shortname'])->order('shortname'));
        $this->set('jobs', $this->Units->Jobs->find('list')->order('name'));
        $this->set('specialisations', $this->Units->Specialisations->find('list')->order('name'));
        $this->set('lastUpdate', $this->Units->find()->order(['modified' => 'desc'])->first());
    }

    /**
     * Add a new unit to the acquired units
     *
     * @return \Cake\Http\Response|null
     */
    public function acquire()
    {
        if ($this->request->is('post')) {
            $acquire = $this->Units->Acquires->newEntity($this->request->getData());
            $acquire->set('user_id', $this->Auth->user('id'));

            if ($this->Units->Acquires->save($acquire)) {
                $this->Flash->success(__("You've successfully acquired ") . $this->request->getData('unit_name') . '.');

                return $this->redirect(['action' => 'index', 'type' => 'acquired']);
            } else {
                $message = __("Could not acquire ") . $this->request->getData('unit_name') . __('. Please try again.');
                if (!empty($acquire->errors())) {
                    $message .= "<ul>";
                    foreach ($acquire->errors() as $error) {
                        $message .= "<li>" . $error[key($error)] . "</li>";
                    }
                    $message .= "</ul>";
                }
                $this->Flash->error($message);
            }
        }

        return $this->redirect($this->referer());
    }

    /**
     * Generate json list for jQueryUI auto-complete
     *
     * Expects a query param of q with a string to search for, and responds with json
     *
     * @return void
     * @throws NotFoundException
     */
    public function unitList()
    {
        $this->request->allowMethod(['get']);
        $this->request->accepts('application/json');

        if (!$this->request->is('ajax')) {
            throw new NotFoundException();
        }

        $units = $this->Units->find()
            ->contain([
                'BaseRarity',
                'MaxRarity'
            ])
            ->select([
                'value' => 'Units.id',
                'label' => 'name',
                'BaseRarity.stars',
                'MaxRarity.stars'
            ]);

        if (!empty($this->request->query['q'])) {
            $units->where(['name LIKE' => '%' . $this->request->query['q'] . '%']);
        }

        $units->order('name');

        $this->set('units', $units);
        $this->set('_serialize', ['units']);
    }

    /**
     * Load a single unit-card via ajax
     *
     * @return \Cake\Http\Response
     */
    public function singleUnit()
    {
        $this->request->allowMethod(['post']);

        if (!$this->request->is('ajax')) {
            throw new NotFoundException();
        }

        $options = [];
        if (!empty($this->request->getData('unitId'))) {
            $options['unitId'] = $this->request->getData('unitId');
        }

        if (!empty($this->request->getData('specialisationId'))) {
            $options['specialisationId'] = $this->request->getData('specialisationId');

            $specialisation = $this->Units->Specialisations->find()
                ->where(['id' => $this->request->getData('specialisationId')])
                ->first();
            $this->set('header', $specialisation->get('name'));
            $this->set('specialisationId', $specialisation->get('id'));
        }

        if ($this->request->getSession()->read('party') !== null) {
            $options['existingParty'] = $this->request->getSession()->read('party');
        }

        $unit = $this->Units->selectUnit($this->Auth->user('id'), $options);

        if ($this->request->getSession()->read('party') !== null) {
            $this->request->getSession()->write('party', array_merge($this->request->getSession()->read('party'), [$unit->get('id')]));
        }

        $this->set('unit', $unit);

        return $this->render('/Element/unit-card');
    }

    /**
     * Try and auto-generate a balanced party based on stats and roles
     *
     * @return \Cake\Http\Response|null
     */
    public function partyBalanced()
    {
        if (!$this->Units->Acquires->checkUnitCount($this->Auth->user('id'))) {
            $this->Flash->error(_('Sorry you do not have enough units in your collection. You need at least one unit.'));

            return $this->redirect(['controller' => 'Units', 'action' => 'index', 'type' => 'acquired']);
        }

        $this->Units->party = [];
        $userId = $this->Auth->user('id');

        $roles = $this->Units->Specialisations->find('list')->order(['team_pick_order' => 'asc']);
        foreach ($roles as $id => $role) {
            $slug = Text::slug(strtolower($role), ['replacement' => '_']);

            $options = ['specialisationId' => $id];
            if ($this->request->getSession()->read('party') !== null) {
                $options = array_merge($options, ['existingParty' => $this->request->getSession()->read('party')]);
            }

            $unit = $this->Units->selectUnit($userId, $options);

            $this->set($slug, $unit);
        }

        $this->request->getSession()->write('party', $this->Units->party);

        return $this->render('party');
    }

    /**
     * Try and auto-generate a party based on pure stats
     *
     * @return \Cake\Http\Response|null
     */
    public function partyStats()
    {
        if (!$this->Units->Acquires->checkUnitCount($this->Auth->user('id'))) {
            $this->Flash->error(_('Sorry you do not have enough units in your collection. You need at least one unit.'));

            return $this->redirect(['controller' => 'Units', 'action' => 'index', 'type' => 'acquired']);
        }

        $this->Units->party = [];
        $userId = $this->Auth->user('id');

        $roles = $this->Units->Specialisations->find('list')->order(['team_pick_order' => 'asc']);
        foreach ($roles as $id => $role) {
            $slug = Text::slug(strtolower($role), ['replacement' => '_']);
            $stats = $this->Units->Specialisations->favouredStats($id);
            $statsOrder = $this->Units->Specialisations->favouredStats($id, true);
            $unit = $this->Units->selectUnit($userId, ['stats' => $statsOrder]);
            $unit->set('stats', $stats);

            $this->set($slug, $unit);
        }

        $this->request->getSession()->write('party', $this->Units->party);

        return $this->render('party');
    }

    /**
     * Generate a party with a limit maximum rarity
     *
     * @return \Cake\Http\Response|null
     */
    public function partyRarity()
    {
        if (!$this->Units->Acquires->checkUnitCount($this->Auth->user('id'))) {
            $this->Flash->error(_('Sorry you do not have enough units in your collection. You need at least one unit.'));

            return $this->redirect(['controller' => 'Units', 'action' => 'index', 'type' => 'acquired']);
        }

        $this->Units->party = [];
        $userId = $this->Auth->user('id');

        $rarity = 5;
        if ($this->request->getQuery('rarity') !== null) {
            $rarity = $this->request->getQuery('rarity');
        }

        $roles = $this->Units->Specialisations->find('list')->order(['team_pick_order' => 'asc']);
        foreach ($roles as $id => $role) {
            $slug = Text::slug(strtolower($role), ['replacement' => '_']);
            $stats = $this->Units->Specialisations->favouredStats($id);
            $statsOrder = $this->Units->Specialisations->favouredStats($id, true);

            $options = ['rarity' => $rarity, 'fallback' => false];

            if ($this->request->getQuery('roles') == 1) {
                $options = array_merge($options, ['specialisationId' => $id]);
            } else {
                $options = array_merge($options, ['stats' => $statsOrder]);
            }
            $unit = $this->Units->selectUnit($userId, $options);

            if ($unit !== null) {
                $unit->set('stats', $stats);
            }

            $this->set($slug, $unit);
        }

        $this->request->data = $this->request->query;

        $this->request->getSession()->write('party', $this->Units->party);

        return $this->render('party');
    }

    /**
     * Create the basic view variables to render the blank unit cards
     *
     * @return \Cake\Http\Response
     */
    public function partyManual()
    {
        $this->set('tank', null);
        $this->set('physical_damage', null);
        $this->set('magic_damage', null);
        $this->set('support', null);
        $this->set('healing', null);
        $this->set('hybrid_damage', null);

        return $this->render('party');
    }

    /**
     * Find a list of the current users acquired units which are closest to their rarities maximum level
     *
     * @return void
     */
    public function closestToLevel()
    {
        $units = $this->Units->Acquires->find()
            ->select([
                'levels_remaining' => '(rarities.max_level - acquires.level)'
            ])
            ->enableAutoFields()
            ->contain([
                'Units',
                'Rarities'
            ])
            ->where(['Acquires.user_id' => $this->Auth->user('id')])
            ->having(['levels_remaining > 0 AND levels_remaining <= 20'])
            ->order(['levels_remaining' => 'asc']);

        $this->set('units', $units);
    }
}
