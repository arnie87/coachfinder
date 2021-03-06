<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model\Table;

use Cake\ORM\Table;

/**
 * Description of LeaguesTable
 *
 * @author arnoldhecke
 */
class SportsTable extends Table
{
    public function initialize(array $config)
    {
        $this->hasMany('Coaches')
            ->setForeignKey('county_id')
            ->setDependent(true);
         
         $this->hasMany('Clubs')
            ->setForeignKey('county_id')
            ->setDependent(true);
    }
}
