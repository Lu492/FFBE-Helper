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
     * Index method
     */
    public function index()
    {
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

// Community seem to think Hybrid is laughable, so we'll exclude this.
//        $this->set('hybridDps', $this->Units->selectUnit($userId, 3));
//        $this->set('hybridStats', $this->Units->Specialisations->roleToStats(3));
    }
}