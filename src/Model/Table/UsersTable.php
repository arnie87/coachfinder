<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model\Table;

/**
 * Description of UsersTable
 *
 * @author arnoldhecke
 */
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        
        $this->hasMany('Coaches')
            ->setForeignKey('user_id')
            ->setDependent(true);
        
        $this->hasMany('Clubs')
            ->setForeignKey('user_id')
            ->setDependent(true);
    }
    
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('email', 'A username is required')
            ->notEmpty('password', 'A password is required')
            ->notEmpty('role', 'A role is required')
            ->add('role', 'inList', [
                'rule' => ['inList', ['club', 'coach']],
                'message' => 'Please enter a valid role'
            ]);
    }
}
