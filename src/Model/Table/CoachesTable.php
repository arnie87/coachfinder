<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model\Table;

/**
 * Description of CoachesTable
 *
 * @author arnoldhecke
 */
use Cake\ORM\Table;
use Cake\Validation\Validator;

class CoachesTable extends Table {

    public function initialize(array $config) {
        $this->addBehavior('Timestamp');
        $this->belongsTo('Users');
        $this->belongsTo('Counties');
        $this->belongsTo('Sports');
    }

    public function validationDefault(Validator $validator) {
        return $validator
            ->notEmpty('vorname', 'A username is required')
            ->notEmpty('nachname', 'A password is required')
            ->notEmpty('bundesland', 'A role is required')
            ->notEmpty('vereinssuche', 'A role is required')
            ->notEmpty('verbaende', 'A role is required')
            ->notEmpty('ausbildung', 'A role is required');
    }
    
    public function isOwnedBy($coachbId, $userId) {
        return $this->exists(['id' => $coachbId, 'user_id' => $userId]);
    }
}
