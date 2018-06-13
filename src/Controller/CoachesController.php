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

class CoachesController extends AppController {
    
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

        if ($this->request->getParam('action') === 'add' && $user['role'] === 'coach' && $role_id === -1) {
            return true;
        }

        if (in_array($this->request->getParam('action'), ['edit'])) {
            $coachId = (int) $this->request->getParam('pass.0');
            if ($this->Coaches->isOwnedBy($coachId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

    public function view($id) {
        $coach = $this->Coaches->get($id, [
            'contain' => ['Users', 'Counties', 'Sports']
        ]);
        $this->set(compact('coach'));
    }

    public function edit($id = null) {
        $session = $this->request->session();      
        $coach = $this->Coaches->get($id);
        $photo = $coach->photo;
        
        if ($this->request->is(['post', 'put'])) {

            $this->Coaches->patchEntity($coach, $this->request->getData());
            $coach->photo = $photo;
            
            if (!empty($this->request->data['photo']['name'])) { 
                $file = $this->request->data['photo'];
                $coach->photo = $this->Photo->uploadPhoto($file, $coach->photo, "coach", $session->read('User.id'));   
            }
            
            $savedCoach = $this->Coaches->save($coach);
            
            if ($savedCoach) {
                $this->writeSession($savedCoach->id, $savedCoach->forename . " " . $savedCoach->surname, $savedCoach->photo);
                $this->Flash->success(__('Your coach details has been updated.'));
                return $this->redirect(['action' => 'edit', $id]);
            }
            $this->Flash->error(__('Your coach details could not be updated.'));
        }
        $this->set('coach', $coach);
        $this->set('counties', $this->counties);
        $this->set('sports', $this->sports);
    }
    
    public function add() {
        $coach = $this->Coaches->newEntity();
        
        if ($this->request->is('post')) {

            $session = $this->request->session();
            $coach->user_id = $session->read('User.id');

            $coach = $this->Coaches->patchEntity($coach, $this->request->getData());
            
            if (!empty($this->request->data['photo']['name'])) { 
                $file = $this->request->data['photo'];
                $coach->photo = $this->Photo->uploadPhoto($file, $coach->photo, "coach", $session->read('User.id'));   
            }
            
            $savedCoach = $this->Coaches->save($coach);

            if ($savedCoach) {
                $this->writeSession($savedCoach->id, $savedCoach->forename . " " . $savedCoach->surname, $savedCoach->photo);
                //$this->Flash->success(__('The Coach has been saved.'));
                return $this->redirect(['action' => 'view', $savedCoach->id]);
            }
            $this->Flash->error(__('Your coach details could not be saved.'));
        }
        $this->set('coach', $coach);
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
