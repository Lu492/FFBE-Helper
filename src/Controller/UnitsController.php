<?php

/**
 * UnitsController.php
 *
 * @author David Yell <dyell@ukwebmedia.com>
 * @copyright 2016 UK Web Media Ltd
 */

namespace App\Controller;

use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Utility\Text;

class UnitsController extends AppController
{
    /**
     * Initialize the controller
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
     * @param \Cake\Event\Event $event
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $this->loadModel('Rarities');
        $this->set('rarities', $this->Rarities->find()->order('stars')->toArray());
    }

    /**
     * List all the available units
     *
     * Can generate different lists of units depending on what is passed
     *
     * @return \Cake\Network\Response
     */
    public function index()
    {
        if (empty($this->request->params['type'])) {
            $this->request->params['type'] = 'all';
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

        $query = $this->Units->find('search', ['search' => $this->request->query])
            ->contain([
                'Races',
                'Jobs',
                'Genders',
                'Origins',
                'Specialisations',
                'BaseRarity',
                'MaxRarity'
            ]);

        if (empty($this->request->query['sort'])) {
            $query->order(['Units.name']);
        }

        // Don't try and filter units if the user isn't logged in
        if (empty($this->Auth->user('id')) && $this->request->params['type'] !== 'all') {
            $this->Flash->set(__('You must login to access that page.'), ['key' => 'auth']);
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        if ($this->request->params['type'] === 'acquired') {
            $query->matching('Acquires', function ($q) {
                return $q->where(['Acquires.user_id' => $this->Auth->user('id')]);
            });
        } elseif ($this->request->params['type'] === 'available') {
            $query->notMatching('Acquires', function ($q) {
                return $q->where(['Acquires.user_id' => $this->Auth->user('id')]);
            });
        }

        $this->set('units', $this->paginate($query, ['limit' => 150]));
        $this->set('origins', $this->Units->Origins->find('list', ['keyField' => 'id', 'valueField' => 'shortname'])->order('shortname'));
        $this->set('jobs', $this->Units->Jobs->find('list')->order('name'));
        $this->set('specialisations', $this->Units->Specialisations->find('list')->order('name'));
    }

    /**
     * Add a new unit to the acquired units
     *
     * @return \Cake\Network\Response|null
     */
    public function acquire()
    {
        if ($this->request->is('post')) {
            $acquire = $this->Units->Acquires->newEntity($this->request->data);
            $acquire->set('user_id', $this->Auth->user('id'));

            if ($this->Units->Acquires->save($acquire)) {
                $this->Flash->success(__("You've successfully acquired ") . $this->request->data['unit_name'] . '.');
                return $this->redirect(['action' => 'index', 'type' => 'acquired']);
            } else {
                $message = __("Could not acquire ") . $this->request->data['unit_name'] . __('. Please try again.');
                if (!empty($acquire->errors())) {
                    $message .= "<ul>";
                    foreach ($acquire->errors() as $error) {
                        $message.= "<li>" . $error[key($error)] . "</li>";
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
     * @return string
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
     * @return \Cake\Network\Response
     */
    public function singleUnit()
    {
        $this->request->allowMethod(['post']);

        if (!$this->request->is('ajax')) {
            throw new NotFoundException();
        }

        $unit = $this->Units->selectUnit($this->Auth->user('id'), ['unitId' => $this->request->data('unitId')]);

        $this->set('unit', $unit);
        return $this->render('/Element/unit-card');
    }

    /**
     * Ensure that the current user has at least one unit to make a party with
     *
     * @return \Cake\Network\Response|null
     *
     * TODO: This should be a table method
     */
    protected function hasUnits()
    {
        $unitCount = $this->Units->Acquires->find()
            ->where(['Acquires.user_id' => $this->Auth->user('id')])
            ->count();

        if ($unitCount < 1) {
            $this->Flash->error(_('Sorry you do not have enough units in your collection. You need at least one unit.'));
            return $this->redirect(['controller' => 'Units', 'action' => 'index', 'type' => 'acquired']);
        }
    }

    /**
     * Try and auto-generate a balanced party based on stats and roles
     */
    public function partyBalanced()
    {
        $this->hasUnits();

        $this->Units->party = [];
        $userId = $this->Auth->user('id');

        $roles = $this->Units->Specialisations->find('list')->order(['team_pick_order' => 'asc']);
        foreach ($roles as $id => $role) {
            $slug = Text::slug(strtolower($role), '_');
            $unit = $this->Units->selectUnit($userId, ['specialisationId' => $id]);

            $this->set($slug, $unit);
        }

        return $this->render('party');
    }

    /**
     * Try and auto-generate a party based on pure stats
     */
    public function partyStats()
    {
        $this->hasUnits();

        $this->Units->party = [];
        $userId = $this->Auth->user('id');

        $roles = $this->Units->Specialisations->find('list')->order(['team_pick_order' => 'asc']);
        foreach ($roles as $id => $role) {
            $slug = Text::slug(strtolower($role), '_');
            $stats = $this->Units->Specialisations->favouredStats($id);
            $statsOrder = $this->Units->Specialisations->favouredStats($id, true);
            $unit = $this->Units->selectUnit($userId, ['stats' => $statsOrder]);
            $unit->set('stats', $stats);

            $this->set($slug, $unit);
        }

        return $this->render('party');
    }

    /**
     * Generate a party with a limit maximum rarity
     */
    public function partyRarity()
    {
        $this->hasUnits();

        $this->Units->party = [];
        $userId = $this->Auth->user('id');

        $rarity = 5;
        if ($this->request->query('rarity') !== null) {
            $rarity = $this->request->query('rarity');
        }

        $roles = $this->Units->Specialisations->find('list')->order(['team_pick_order' => 'asc']);
        foreach ($roles as $id => $role) {
            $slug = Text::slug(strtolower($role), '_');
            $stats = $this->Units->Specialisations->favouredStats($id);
            $statsOrder = $this->Units->Specialisations->favouredStats($id, true);

            $options = ['rarity' => $rarity, 'fallback' => false];

            if ($this->request->query('roles') == 1) {
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

        return $this->render('party');
    }

    public function partyManual()
    {
        $this->set('tank' , null);
        $this->set('physical_damage', null);
        $this->set('magic_damage', null);
        $this->set('support', null);
        $this->set('healing', null);
        $this->set('hybrid_damage', null);

        return $this->render('party');
    }
}