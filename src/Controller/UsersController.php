<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

/**
 * Description of UsersController
 *
 * @author arnoldhecke
 */
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

class UsersController extends AppController {

    private $session;

    public function initialize() {
        parent::initialize();
        
        $this->loadComponent('Flash');
        $this->loadComponent('Photo');
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'logout']);
    }

    public function isAuthorized($user) {
        if (in_array($this->request->getParam('action'), ['edit', 'delete'])) {
            $userId = (int) $this->request->getParam('pass.0');
            if ($user['id'] == $userId) {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }

    public function view($id) {
        $user = $this->Users->get($id);
        $this->set(compact('user'));
    }

    public function add() {
        $this->destroySession();
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user->status = 1;

            $userExists = $this->isUserExisting($this->request->getData('email'));

            if (!$userExists) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                $saveResult = $this->Users->save($user);

                if ($saveResult) {
                    $this->Auth->setUser($user->toArray());
                    $this->writeSession($this->Auth->user('id'), $this->Auth->user('email'), $this->Auth->user('role'), -1, "undefined", "");

                    if ($user->role === "coach")
                        return $this->redirect(['controller' => 'coaches', 'action' => 'add']);
                    else
                        return $this->redirect(['controller' => 'clubs', 'action' => 'add']);
                }
            }
            $this->Flash->error(__('The email address is already registered.'));
        }
        $this->set('user', $user);
    }

    public function edit($id = null) {
        $user = $this->Users->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Your user data has been updated.'));
                return $this->redirect(['action' => 'edit', $id]);
            }
            $this->Flash->error(__('Your user data could not be updated.'));
        }

        $this->set('user', $user);
    }

    public function login() {
        $this->destroySession();
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);

                $role = $this->getRole($this->Auth->user('role'), $this->Auth->user('id'));
                //$role_id = isset($role['id']) ? $role['id'] : -1;
                //$role_name = isset($role['name']) ? $role['name'] : "undefined";

                $this->writeSession($this->Auth->user('id'), $this->Auth->user('email'), $this->Auth->user('role'), $role['id'], $role['name'], $role['pic']);

                if ($role['id'] == -1 && $this->Auth->user('role') == "club") {
                    return $this->redirect($this->Auth->redirectUrl(['controller' => 'Clubs', 'action' => 'add']));
                }
                if ($role['id'] == -1 && $this->Auth->user('role') == "coach") {
                    return $this->redirect($this->Auth->redirectUrl(['controller' => 'Coaches', 'action' => 'add']));
                }

                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Login data is not correct.'));
        }
        $this->set('login', '');
    }

    public function delete($id) {
        $this->request->allowMethod(['post', 'delete']);
        
        $user = $this->Users->get($id);
        $roleId = $this->request->session()->read('Role.id');
        
        if ($user->role == "club") {
            $jobsTable = TableRegistry::get('Jobs');
            $jobs = $jobsTable->find()->where(['club_id' => $roleId]);
            
            foreach ($jobs as $job) {
                if ($jobsTable->isOwnedBy($job->id, $roleId, $user['id'])) {
                    $jobsTable->delete($job);
                }
            }
            
            $logo = TableRegistry::get('Clubs')->find()->where(['user_id' => $user['id']])->first()->logo;
            $this->Photo->deletePhoto($logo, $user['role']);
        }
        
        if ($user->role == "coach") {
            $photo = TableRegistry::get('Coaches')->find()->where(['user_id' => $user['id']])->first()->photo;
            $this->Photo->deletePhoto($photo, $user['role']);
        }

        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.', h($id)));
            $this->logout();
        }
    }

    public function logout() {
        $this->destroySession();
        return $this->redirect($this->Auth->logout());
    }

    private function isUserExisting($user_email) {
        $users = TableRegistry::get('Users');
        $exists = $users->exists(['email' => $user_email, 'status' => 1]);
        return $exists;
    }

    private function getRole($user_role, $user_id) {

        $roleArray = [
            "id" => -1,
            "name" => "undefined",
            "pic" => ""
        ];

        if ($user_role === "coach") {
            $coaches = TableRegistry::get('Coaches');
            $coach = $coaches->find()->where(['user_id' => $user_id])->first();

            if (isset($coach)) {
                $roleArray['id'] = $coach->id;
                $roleArray['name'] = $coach->forename . " " . $coach->surname;
                $roleArray['pic'] = $coach->photo;
            }
            return $roleArray;
            
        } else {
            $clubs = TableRegistry::get('Clubs');
            $club = $clubs->find()->where(['user_id' => $user_id])->first();

            if (isset($club)) {
                $roleArray['id'] = $club->id;
                $roleArray['name'] = $club->clubname;
                $roleArray['pic'] = $club->logo;
            }
            return $roleArray;
        }
    }
    
    private function destroySession() {
        $this->session = $this->request->session();
        $this->session->destroy();
    }

    private function writeSession($user_id, $user_email, $user_role, $role_id, $role_name, $role_pic) {
        $this->session = $this->request->session();
        $this->session->write('User.id', $user_id);
        $this->session->write('User.email', $user_email);
        $this->session->write('User.role', $user_role);
        $this->session->write('Role.id', $role_id);
        $this->session->write('Role.name', $role_name);
        $this->session->write('Role.pic', $role_pic);
    }

}
