<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';

if ($coach->city != "") {
    $display_address = $coach->city.", ".$coach->county->county;
} else {
    $display_address = $coach->county->county;
}

if ($coach->history != "") {
    $display_coach = "<b>Club history: </b>".$coach->history;
} else {
    $display_coach = "";
}

if (isset($user_email)) {
    if ($coach->phone != "") {
    $display_phone = "<b>Phone: </b>".$coach->phone;
    } else {
        $display_phone = "";
    }
    if ($coach->user->email != "") {
        $display_email = "<b>Email: </b>".$coach->user->email;
    } else {
        $display_email = "";
    }
} else {
    $display_phone = "<b>Full name and contact details only when logged in.</b>";
    $display_email = "";
}



?>
<!DOCTYPE html>
<head>
    <style>
        .btn-secondary {
            margin: 0.3em;
        }
    </style>
</head>
<body>
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <img class="rounded float-left" height="220" src="<?php if($coach->photo != "") { echo $this->request->webroot."upload/coach/".$coach->photo; } else { echo "data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="; }?>"/>
                </div>
                <div class="col-sm9 text-left" style="margin-left: 2em;">
                    <h1><?= (isset($user_email)) ? $coach->forename. " " .$coach->surname : $coach->forename. " " .$this->Trim->trimSurname($coach->surname) ?></h1>
                    <p>
                        <b><?= $coach->sport->sport; ?> coach</b>
                    </p>
                    <p>
                        <?= $display_address; ?><br>
                        <?= $coach->education; ?>
                    </p>
                    <p>
                        <?= $display_phone; ?><br>
                        <?= $display_email; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container marketing">
        <p class="text-center">
            <?php
                if (isset($role_id) && $role_id == $coach->id) {
                    echo $this->Html->link('Search for job positions »', ['controller' => 'search', 'action' => 'clubs'], ['class' => 'btn btn-secondary']);
                    echo $this->Html->link('Edit my profile »', ['action' => 'edit', $coach->id], ['class' => 'btn btn-secondary']);
                }
            ?>
        </p>
        <p>
            <?= $coach['description'] ?>
        </p>
        <p>

            <?= $display_coach; ?>
        </p>
    </div>
</body>
</html>
