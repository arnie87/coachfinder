<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model\Table;

use Cake\ORM\Table;

/**
 * Description of VereineTable
 *
 * @author arnoldhecke
 */
class JobsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->belongsTo('Clubs');
        $this->belongsTo('Contracts');
        $this->belongsTo('Levels');
    }
    
    public function isOwnedBy($jobId, $clubId, $userId) {        
        $correctClubId = FALSE;
        
        if ($this->Clubs->exists(['id' => $clubId, 'user_id' => $userId])) {
            $correctClubId = TRUE;
        }
        if ($correctClubId) {
            return $this->exists(['id' => $jobId, 'club_id' => $clubId]);
        }
        
        return FALSE;
    }
}
