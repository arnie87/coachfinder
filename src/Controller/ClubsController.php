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
use Cake\ORM\TableRegistry;

class ClubsController extends AppController {
      
    public function initialize() {
        parent::initialize();

        $this->loadComponent('Flash');
        $this->loadComponent('Photo');
        
        $this->counties = TableRegistry::get('Counties')->find('all');
        $this->sports = TableRegistry::get('Sports')->find('all');
    }

    public function isAuthorized($user) {
        $session = $this->request->session();
        $role_id = $session->read('Role.id');
        
        if ($this->request->getParam('action') === 'add' && $user['role'] === 'club' && $role_id === -1) {
            return true;
        }

        if (in_array($this->request->getParam('action'), ['edit'])) {
            $clubId = (int) $this->request->getParam('pass.0');
            if ($this->Clubs->isOwnedBy($clubId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }    

    public function view($id) {
        $club = $this->Clubs->get($id);
        $this->set(compact('club'));
    }
    
    public function edit($id = null) {
        $session = $this->request->session();
        $club = $this->Clubs->get($id);
        $logo = $club->logo;
        
        if ($this->request->is(['post', 'put'])) {
            
            $this->Clubs->patchEntity($club, $this->request->getData());
            $club->logo = $logo;
            
            if (!empty($this->request->data['logo']['name'])) { 
                $file = $this->request->data['logo'];
                $club->logo = $this->Photo->uploadPhoto($file, $club->logo, "club", $session->read('User.id'));   
            }
            
            $savedClub = $this->Clubs->save($club);
            
            if ($savedClub) {
                $this->writeSession($savedClub->id, $savedClub->clubname, $savedClub->logo);
                $this->Flash->success(__('Your club details has been updated.'));
                return $this->redirect(['action' => 'edit', $id]);
            }
            $this->Flash->error(__('Your club details could not be updated.'));
        }

        $this->set('club', $club);
        $this->set('counties', $this->counties);
        $this->set('sports', $this->sports);
    }
    
    public function add() {
        $club = $this->Clubs->newEntity();
                        
        if ($this->request->is('post')) {

            $session = $this->request->session();
            $club->user_id = $session->read('User.id');
            
            $club = $this->Clubs->patchEntity($club, $this->request->getData());   
            
            if (!empty($this->request->data['logo']['name'])) { 
                $file = $this->request->data['logo'];
                $club->logo = $this->Photo->uploadPhoto($file, $club->logo, "club", $session->read('User.id'));   
            }
            
            $savedClub = $this->Clubs->save($club);
            
            if ($savedClub) {
                $this->writeSession($savedClub->id, $savedClub->clubname, $savedClub->logo);
                //$this->Flash->success(__('The Club has been saved.'));
                return $this->redirect(['controller' => 'jobs','action' => 'add']);
            }
            $this->Flash->error(__('Your club details could not be saved.'));
        }
        
        $this->set('club', $club);
        $this->set('counties', $this->counties);
        $this->set('sports', $this->sports);
    }
    
    private function writeSession($role_id, $role_name, $role_pic) {
        $session = $this->request->session();
        $session->write('Role.id', $role_id);
        $session->write('Role.name', $role_name);
        $session->write('Role.pic', $role_pic);
    }
}
