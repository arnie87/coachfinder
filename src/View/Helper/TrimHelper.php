<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TrimHelper
 *
 * @author arnoldhecke
 */

namespace App\View\Helper;

use Cake\View\Helper;

class TrimHelper extends Helper 
{
    public function trimText($t) {
        $text = trim($t, " ");
        $max_length = 100;
        
        if (strlen($text) > $max_length) {
            $offset = ($max_length - 3) - strlen($text);
            $text = substr($text, 0, strrpos($text, ' ', $offset)) . '...';
        }
        
        return $text;
    }
    
    public function trimSurname($s) {
        $text = substr($s, 0, 1);
        return $text .= ".";
    }
}
