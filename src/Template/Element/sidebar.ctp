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

if (isset($user_email) || (isset($role_id) && $role_id != -1)) {
    $loggedIn = true;
}
else {
    $loggedIn = false;
}

?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>

        <?php
            if ($loggedIn) {
        ?>


        <div class="row">
            <div style="text-align:center; margin: 0 auto; margin-bottom: 1em; width: 100%;">
                <img class="rounded" height="150" src="<?php if($role_pic != "") { echo $this->request->webroot."upload/".$user_role."/".$role_pic; } else { echo "data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="; }?>"/>
                <div style="padding: 0.1em;"><?= $role_name; ?></div>
            </div>
        </div>

            <?php
                if ($user_role === "club") {
            ?>

        <div class="list-group">
            <a href="<?= $this->request->webroot.'jobs' ?>" class="list-group-item list-group-item-action <?= ($this->request->getParam('controller') === "Jobs") ? " active" : "" ?>">My job offers</a>
            <a href="<?= $this->request->webroot.'clubs/edit/'.$role_id ?>" class="list-group-item list-group-item-action <?= ($this->request->getParam('controller') === "Clubs") ? " active" : "" ?>">Club & personal info</a>
            <a href="<?= $this->request->webroot.'users/edit/'.$user_id ?>" class="list-group-item list-group-item-action <?= ($this->request->getParam('controller') === "Users") ? " active" : "" ?>">User settings</a>
        </div>
            <?php
                } else {
            ?>
        <div class="list-group">
            <a href="<?= $this->request->webroot.'coaches/edit/'.$role_id ?>" class="list-group-item list-group-item-action <?= ($this->request->getParam('controller') === "Coaches") ? " active" : "" ?>">Personal info</a>
            <a href="<?= $this->request->webroot.'users/edit/'.$user_id ?>" class="list-group-item list-group-item-action <?= ($this->request->getParam('controller') === "Users") ? " active" : "" ?>">User settings</a>
        </div>

            <?php
                }
            }
            ?>

    </body>
</html>
