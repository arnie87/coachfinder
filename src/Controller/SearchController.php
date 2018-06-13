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

class SearchController extends AppController {

    public function initialize() {
        parent::initialize();
        
        $this->counties = TableRegistry::get('Counties')->find('all');
        $this->sports = TableRegistry::get('Sports')->find('all');
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['clubs', 'coaches']);
    }   

    public function clubs() {        
        $sport_id = 1;
        $county_id = 0;
        
        if ($this->request->is('post')) {            
            if ($this->request->getData('selected-sport-home')) {
                $sport_id = $this->request->getData('selected-sport-home');
            }
            else if ($this->request->getData('selected-sport')) {
                $sport_id = $this->request->getData('selected-sport');
            }
            
            if ($this->request->getData('selected-county')) {
                $county_id = $this->request->getData('selected-county');
            }
        }
        
        $jobs = TableRegistry::get('Jobs')->find()->contain(['Clubs'])->matching(
            'Clubs', function ($q) use ($sport_id, $county_id) {
                
                if ($county_id != 0) {
                    $return = $q->where(['Clubs.sport_id' => $sport_id])
                        ->andWhere(['Clubs.county_id' => $county_id]);
                } else {
                    $return = $q->where(['Clubs.sport_id' => $sport_id]);
                }
                
                return $return;
            }
        );
        
        $this->set('jobs', $jobs);
        $this->set('counties', $this->counties);
        $this->set('sports', $this->sports);
    }

    public function coaches() {
        $sport_id = 1;
        $county_id = 0;
        
        if ($this->request->is('post')) {            
            if ($this->request->getData('selected-sport-home')) {
                $sport_id = $this->request->getData('selected-sport-home');
            }
            else if ($this->request->getData('selected-sport')) {
                $sport_id = $this->request->getData('selected-sport');
            }
            
            if ($this->request->getData('selected-county')) {
                $county_id = $this->request->getData('selected-county');
            }
        }
        
        $coaches = TableRegistry::get('Coaches')->find()->where(['active' => 1]);
        if ($county_id != 0) {
            $coaches = $coaches->where(['sport_id' => $sport_id])
                ->andWhere(['county_id' => $county_id]);
        } else {
            $coaches = $coaches->where(['sport_id' => $sport_id]);
        }
        
        $this->set('coaches', $coaches);
        $this->set('counties', $this->counties);
        $this->set('sports', $this->sports);
    }
}
