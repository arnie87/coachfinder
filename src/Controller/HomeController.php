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
class HomeController extends AppController {

    public function initialize() {
        parent::initialize();

        $this->loadComponent('Flash');
    }

    public function index() {
        $sports = TableRegistry::get('Sports')->find('all');
        $coaches = TableRegistry::get('Coaches')->find('all')
                ->where(['active' => 1])
                ->order(['created' => 'DESC'])->limit(3);
        $jobs = TableRegistry::get('Jobs')->find()->contain(['Clubs'])
                ->order(['jobs.created' => 'DESC'])->limit(3);
        
        $this->set('sports', $sports);
        $this->set('coaches', $coaches);
        $this->set('jobs', $jobs);
    }

}
