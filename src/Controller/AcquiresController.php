<?php

/**
 * AcquiresController.php
 *
 * @author David Yell <dyell@ukwebmedia.com>
 * @copyright 2016 UK Web Media Ltd
 */

namespace App\Controller;

class AcquiresController extends AppController
{
    /**
     * Add units to a users collection
     *
     * @return \Cake\Network\Response|null
     */
    public function units()
    {
        if ($this->request->is('post')) {
            $acquire = $this->Acquires->newEntity($this->request->data);
            $acquire->set('user_id', $this->Auth->user('id'));

            if ($this->Acquires->save($acquire)) {
                $this->Flash->success(__("You've successfully acquired ") . $this->request->data['name'] . '.');
                return $this->redirect(['action' => 'units']);
            } else {
                $this->Flash->error(__("Could not acquire ") . $this->request->data['name'] . __('. Please try again.'));
            }
        }

        $query = $this->Acquires->find()
            ->contain([
                'Units' => [
                    'Specialisations'
                ]
            ])
            ->where(['user_id' => $this->Auth->user('id')]);

        if (empty($this->request->query['sort'])) {
            $query->order([
                'rarity' => 'desc',
                'level' => 'desc',
                'name' => 'asc'
            ]);
        }

        $this->set('units', $this->paginate($query, ['limit' => 150]));
    }

    /**
     * Edit a units acquired status
     *
     * @param int $id Primarykey value
     *
     * @return \Cake\Network\Response|null
     */
    public function edit($id)
    {
        $unit = $this->Acquires->find()
            ->contain(['Units'])
            ->where([
                'Acquires.id' => $id,
                'Acquires.user_id' => $this->Auth->user('id')
            ])
            ->firstOrFail();

        if ($this->request->is(['post', 'put'])) {
            $unit = $this->Acquires->patchEntity($unit, $this->request->data);
            if ($this->Acquires->save($unit)) {
                $this->Flash->success(__("Unit updated successfully."));
                return $this->redirect(['action' => 'units']);
            } else {
                $this->Flash->error(__("Unit could not be updated, please try again."));
            }
        }

        $this->set('unit', $unit);
    }

    /**
     * Remove a unit from the users collection
     *
     * @param int $id Primarykey value
     *
     * @return \Cake\Network\Response|null
     */
    public function delete($id)
    {
        $unit = $this->Acquires->find()
            ->contain(['Units'])
            ->where([
                'Acquires.id' => $id,
                'Acquires.user_id' => $this->Auth->user('id')
            ])
            ->firstOrFail();

        if ($this->Acquires->delete($unit)) {
            $this->Flash->success(__("Unit has been removed successfully."));
            return $this->redirect(['action' => 'units']);
        } else {
            $this->Flash->error(__("Could not remove the unit, please try again."));
        }
    }
}