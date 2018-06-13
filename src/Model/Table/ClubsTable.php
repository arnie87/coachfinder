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

class ClubsTable extends Table {

    public function initialize(array $config) {
        $this->addBehavior('Timestamp');

        $this->hasMany('Jobs')
                ->setForeignKey('club_id')
                ->setDependent(true);

        $this->belongsTo('Users');
        $this->belongsTo('Counties');
        $this->belongsTo('Sports');
    }

    public function validationDefault(Validator $validator) {
        return $validator
                        ->notEmpty('name', '')
                        ->notEmpty('plz', '')
                        ->notEmpty('ort', '')
                        ->notEmpty('spielklasse', '')
                        ->notEmpty('verband', '')
                        ->notEmpty('verantwortlicher', '')
                        ->notEmpty('anrede', '')
                        ->notEmpty('vorname', '')
                        ->notEmpty('nachname', '');
    }

    public function isOwnedBy($clubId, $userId) {
        return $this->exists(['id' => $clubId, 'user_id' => $userId]);
    }

}
