<?php

/**
 * UsersController.php
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace App\Controller;

/**
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Log a user in
     *
     * @return \Cake\Http\Response|null
     */
    public function login()
    {
        if ($this->Auth->user() !== null) {
            return $this->redirect('/');
        }

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);

                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('Username or password is incorrect'), ['key' => 'auth']);
            }
        }
    }

    /**
     * Log a user out
     *
     * @return \Cake\Http\Response|null
     */
    public function logout()
    {
        $this->request->session()->delete('Auth');

        return $this->redirect($this->Auth->logout());
    }
}
