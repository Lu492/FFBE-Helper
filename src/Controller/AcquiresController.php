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
     * Edit a units acquired status
     *
     * @param int $id Primary key value
     *
     * @return \Cake\Network\Response|null
     */
    public function edit($id)
    {
        $unit = $this->Acquires->find()
            ->contain([
                'Units' => function ($q) {
                    return $q
                        ->select([
                            'id', 'name', 'image_dir', 'image', 'description',
                            'BaseRarity.stars', 'MaxRarity.stars'
                        ])
                        ->contain([
                            'BaseRarity',
                            'MaxRarity',
                            'Specialisations'
                        ]);
                }
            ])
            ->where([
                'Acquires.id' => $id,
                'Acquires.user_id' => $this->Auth->user('id')
            ])
            ->firstOrFail();

        if ($this->request->is(['post', 'put'])) {
            $unit = $this->Acquires->patchEntity($unit, $this->request->data);
            if ($this->Acquires->save($unit)) {
                $this->Flash->success(__("Unit updated successfully."));
                return $this->redirect(['controller' => 'Units', 'action' => 'index', 'type' => 'acquired']);
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
            return $this->redirect($this->referer());
        } else {
            $this->Flash->error(__("Could not remove the unit, please try again."));
        }
    }
}