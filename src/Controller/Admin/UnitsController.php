<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Units Controller
 *
 * @property \App\Model\Table\UnitsTable $Units
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

        $this->loadComponent('Search.Prg', ['actions' => ['index']]);
    }

    /**
     * Set all the page titles
     *
     * @param Event $event Event instance
     *
     * @return void
     */
    public function beforeRender(Event $event)
    {
        parent::beforeRender($event);

        $this->set('title', 'FF Brave Exvius Unit Helper Admin');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $query = $this->Units->find('search', ['search' => $this->request->query])
            ->contain([
                'Origins',
                'Races',
                'Jobs',
                'Genders',
                'BaseRarity',
                'MaxRarity'
            ]);

        $units = $this->paginate($query);

        $this->set(compact('units'));
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $unit = $this->Units->newEntity();
        if ($this->request->is('post')) {
            $unit = $this->Units->patchEntity($unit, $this->request->data);

            if (!empty($this->request->data['Races']['name'])) {
                $unit->unsetProperty('Races');
                $unit->set('race', $this->Units->Races->newEntity(['name' => $this->request->data['Races']['name']]));
            }
            if (!empty($this->request->data['Jobs']['name'])) {
                $unit->unsetProperty('Jobs');
                $unit->set('job', $this->Units->Jobs->newEntity(['name' => $this->request->data['Jobs']['name']]));
            }
            if (!empty($this->request->data['Genders']['name'])) {
                $unit->unsetProperty('Genders');
                $unit->set('gender', $this->Units->Genders->newEntity(['name' => $this->request->data['Genders']['name']]));
            }

            if ($this->Units->save($unit)) {
                $this->Flash->success(__('The unit has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The unit could not be saved. Please, try again.'));
            }
        }
        $origins = $this->Units->Origins->find('list')->order('name');
        $races = $this->Units->Races->find('list')->order('name');
        $jobs = $this->Units->Jobs->find('list')->order('name');
        $genders = $this->Units->Genders->find('list')->order('name');
        $specialisations = $this->Units->Specialisations->find('list')->order('name');
        $this->loadModel('Rarities');
        $rarities = $this->Rarities->find()->order('stars')->toArray();
        $this->set(compact('unit', 'origins', 'races', 'jobs', 'genders', 'specialisations', 'rarities'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Unit id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $unit = $this->Units->get($id, [
            'contain' => [
                'Specialisations',
                'BaseRarity',
                'MaxRarity'
            ]
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $unit = $this->Units->patchEntity($unit, $this->request->data);
            if ($this->Units->save($unit)) {
                $this->Flash->success(__('The unit has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The unit could not be saved. Please, try again.'));
            }
        }
        $origins = $this->Units->Origins->find('list')->order('name');
        $races = $this->Units->Races->find('list')->order('name');
        $jobs = $this->Units->Jobs->find('list')->order('name');
        $genders = $this->Units->Genders->find('list')->order('name');
        $specialisations = $this->Units->Specialisations->find('list')->order('name');

        $this->loadModel('Rarities');
        $rarities = $this->Rarities->find()->order('stars')->toArray();

        $this->set(compact('unit', 'origins', 'races', 'jobs', 'genders', 'specialisations', 'rarities'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Unit id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $unit = $this->Units->get($id);
        if ($this->Units->delete($unit)) {
            $this->Flash->success(__('The unit has been deleted.'));
        } else {
            $this->Flash->error(__('The unit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
