<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Units Controller
 *
 * @property \App\Model\Table\UnitsTable $Units
 */
class UnitsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Origins', 'Races', 'Jobs', 'Genders']
        ];
        $units = $this->paginate($this->Units);

        $this->set(compact('units'));
    }

    /**
     * View method
     *
     * @param string|null $id Unit id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $unit = $this->Units->get($id, [
            'contain' => ['Origins', 'Races', 'Jobs', 'Genders', 'Specialisations']
        ]);

        $this->set('unit', $unit);
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
        $this->set(compact('unit', 'origins', 'races', 'jobs', 'genders', 'specialisations'));
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
            'contain' => ['Specialisations']
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
        $specialisations = $this->Units->Specialisations->find('list')->order('name');;
        $this->set(compact('unit', 'origins', 'races', 'jobs', 'genders', 'specialisations'));
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
