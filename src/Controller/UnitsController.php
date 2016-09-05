<?php

/**
 * UnitsController.php
 *
 * @author David Yell <dyell@ukwebmedia.com>
 * @copyright 2016 UK Web Media Ltd
 */

namespace App\Controller;

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
     * List all the available units
     *
     * Can generate different lists of units depending on what is passed
     *
     * @return \Cake\Network\Response
     */
    public function index()
    {
        $this->paginate = [
            'sortWhitelist' => [
                'name',
                'origin_id',
                'Jobs.name',
                'base_rarity',
                'max_rarity',
                'Acquires.rarity',
                'Acquires.level',
                'hp', 'mp', 'atk', 'def', 'mag', 'spr', 'hits'
            ]
        ];

        // Acquire a new unit
        if ($this->request->is('post')) {
            $acquire = $this->Units->Acquires->newEntity($this->request->data);
            $acquire->set('user_id', $this->Auth->user('id'));

            if ($this->Units->Acquires->save($acquire)) {
                $this->Flash->success(__("You've successfully acquired ") . $this->request->data['name'] . '.');
                return $this->redirect(['action' => 'index', '?' => ['type' => 'acquired']]);
            } else {
                $this->Flash->error(__("Could not acquire ") . $this->request->data['name'] . __('. Please try again.'));
            }
        }

        $query = $this->Units->find('search', ['search' => $this->request->query])
            ->contain([
                'Races',
                'Jobs',
                'Genders',
                'Origins',
                'Specialisations'
            ]);

        if (empty($this->request->query['sort'])) {
            $query->order(['Units.name']);
        }

        // Don't try and filter units if the user isn't logged in
        if (empty($this->Auth->user('id')) && !empty($this->request->query('type'))) {
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->query('type') === 'acquired') {
            $query->matching('Acquires', function ($q) {
                return $q->where(['Acquires.user_id' => $this->Auth->user('id')]);
            });
        } elseif ($this->request->query('type') === 'available') {
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
     * Generate an autocomplete list for jQueryUI autocomplete
     *
     * Expects a query param of q with a string to search for, and responds with json
     *
     * @return string
     */
    public function unitList()
    {
        $this->request->allowMethod(['get']);
        $this->request->accepts('application/json');

        $units = $this->Units->find()
            ->select(['value' => 'id', 'label' => 'name']);

        if (!empty($this->request->query['q'])) {
            $units->where(['name LIKE' => '%' . $this->request->query['q'] . '%']);
        }

        $units->order('name');

        $this->set('units', $units);
        $this->set('_serialize', ['units']);
    }

    /**
     * Try and auto-generate a balanced party based on stats and roles
     */
    public function partyBalanced()
    {
        // Check the user has some units to build a party with
        $unitCount = $this->Units->Acquires->find()
            ->where(['Acquires.user_id' => $this->Auth->user('id')])
            ->count();

        if ($unitCount < 1) {
            $this->Flash->error(_('Sorry you do not have enough units in your collection. You need at least one unit.'));
            return $this->redirect(['controller' => 'Aquisitions', 'action' => 'units']);
        }

        $this->Units->party = [];
        $userId = $this->Auth->user('id');

        $this->set('tank', $this->Units->selectUnit($userId, 7));
        $this->set('tankStats', $this->Units->Specialisations->roleToStats(7));

        $this->set('physicalDps', $this->Units->selectUnit($userId, 5));
        $this->set('physicalStats', $this->Units->Specialisations->roleToStats(5));

        $this->set('magicalDps', $this->Units->selectUnit($userId, 4));
        $this->set('magicalStats', $this->Units->Specialisations->roleToStats(4));

        $this->set('healer', $this->Units->selectUnit($userId, 1));
        $this->set('healerStats', $this->Units->Specialisations->roleToStats(1));

        $this->set('support', $this->Units->selectUnit($userId, 2));
        $this->set('supportStats', $this->Units->Specialisations->roleToStats(2));
    }

    /**
     * Try and auto-generate a party based on pure stats
     */
    public function partyStats()
    {
        // Check the user has some units to build a party with
        $unitCount = $this->Units->Acquires->find()
            ->where(['Acquires.user_id' => $this->Auth->user('id')])
            ->count();

        if ($unitCount < 1) {
            $this->Flash->error(_('Sorry you do not have enough units in your collection. You need at least one unit.'));
            return $this->redirect(['controller' => 'Aquisitions', 'action' => 'units']);
        }

        $this->Units->party = [];
        $userId = $this->Auth->user('id');

        $stats = $this->Units->Specialisations->roleToStats(7);
        $this->set('tank', $this->Units->selectUnit($userId, null, $stats));
        $this->set('tankStats', $stats);

        $stats = $this->Units->Specialisations->roleToStats(5);
        $this->set('physicalDps', $this->Units->selectUnit($userId, null, $stats));
        $this->set('physicalStats', $stats);

        $stats = $this->Units->Specialisations->roleToStats(4);
        $this->set('magicalDps', $this->Units->selectUnit($userId, null, $stats));
        $this->set('magicalStats', $stats);

        $stats = $this->Units->Specialisations->roleToStats(1);
        $this->set('healer', $this->Units->selectUnit($userId, null, $stats));
        $this->set('healerStats', $stats);

        $stats = $this->Units->Specialisations->roleToStats(2);
        $this->set('support', $this->Units->selectUnit($userId, null, $stats));
        $this->set('supportStats', $stats);
    }
}