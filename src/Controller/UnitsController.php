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

}