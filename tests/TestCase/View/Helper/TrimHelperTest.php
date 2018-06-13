<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Test\TestCase\View\Helper;

use App\View\Helper\TrimHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * Description of TrimHelperTest
 *
 * @author arnoldhecke
 */
class TrimHelperTest extends TestCase {

    public function setUp() {
        parent::setUp();
        $View = new View();
        $this->Trim = new TrimHelper($View);
    }

    public function testTrimText() {
        $text = "asdf";
        $result = $this->Trim->trimText($text);
        $this->assertContains('asdf', $result);
    }

}
