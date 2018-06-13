<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Description of HomeController
 *
 * @author arnoldhecke
 */
class JobsController extends AppController {

    public function initialize() {
        parent::initialize();

        $this->loadComponent('Flash');
        
        $this->levels = TableRegistry::get('Levels')->find('all');
        $this->contracts = TableRegistry::get('Contracts')->find('all');
    }

    public function isAuthorized($user) {
        $session = $this->request->session();
        $role_id = $session->read('Role.id');

        if ($user['role'] === 'club' && $role_id != -1) {
            if (in_array($this->request->getParam('action'), ['index','add'])) {
                if ($this->Jobs->Clubs->isOwnedBy($role_id, $user['id'])) {
                    return true;
                }
            }
            if (in_array($this->request->getParam('action'), ['edit', 'delete'])) {
                $jobId = (int) $this->request->getParam('pass.0');
                if ($this->Jobs->isOwnedBy($jobId, $role_id, $user['id'])) {
                    return true;
                }
            }
        }

        return parent::isAuthorized($user);
    }
    
    public function view($id) {
        $job = $this->Jobs->get($id, [
            'contain' => ['Clubs', 'Clubs.Counties', 'Clubs.Sports', 'Contracts', 'Levels']
        ]);
        $this->set(compact('job'));
    }
    
    public function index() {
        $session = $this->request->session();
        $query = $this->Jobs->find()
                ->where(['club_id' => $session->read('Role.id')])
                ->order(['created' => 'ASC']);
        $this->set('jobs', $query);
    }

    public function add() {
        $session = $this->request->session();
        $job = $this->Jobs->newEntity();
        if ($this->request->is('post')) {
            $job = $this->Jobs->patchEntity($job, $this->request->data);
            $job->club_id = $session->read('Role.id');
            $job->created = date("Y-m-d H:i:s");
            $job->modified = date("Y-m-d H:i:s");
            if ($this->Jobs->save($job)) {
                //$this->Flash->success(__('Your article has been saved.'));
                return $this->redirect(['controller' => 'jobs', 'action' => 'index']);
            }
            $this->Flash->error(__('Your job could not be saved.'));
        }
        
        $this->set('job', $job);
        $this->set('contracts', $this->contracts);
        $this->set('levels', $this->levels);
    }

    public function edit($id = null) {
        $job = $this->Jobs->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->Jobs->patchEntity($job, $this->request->getData());
            if ($this->Jobs->save($job)) {
                //$this->Flash->success(__('The job details has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Your job could not be updated.'));
        }

        $this->set('job', $job);
        $this->set('contracts', $this->contracts);
        $this->set('levels', $this->levels);
    }

    public function delete($id) {
        $this->request->allowMethod(['post', 'delete']);

        $job = $this->Jobs->get($id);
        if ($this->Jobs->delete($job)) {
            //$this->Flash->success(__('The article with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }

}
