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


$loggedIn = false;
$dataCompleted = false;

if (isset($user_email)) {
    $loggedIn = true;
}
if (isset($role_id) && $role_id != -1) {
    $dataCompleted = true;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            .nav-item {
                padding-left: 1.5em;
            }
            .btn {
                height: 2.4em;
            }
            .leftbutton {
                margin-right: 0.3em;
            }

            @media (max-width: 575.98px) { 
                .nav-item {
                    padding-left: 0em;
                }
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?= $this->Html->link('Coach Job Market', ['controller' => 'home', 'action' => 'index'], ['class' => 'navbar-brand']) ?>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item <?= ($this->request->getParam('action') == "coaches") ? " active" : "" ?>">
                        <?= $this->Html->link('Coach profiles', ['controller' => 'search', 'action' => 'coaches'], ['class' => 'nav-link']) ?>

                    </li>
                    <li class="nav-item <?= ($this->request->getParam('action') == "clubs") ? " active" : "" ?>">
                        <?= $this->Html->link('Job positions', ['controller' => 'search', 'action' => 'clubs'], ['class' => 'nav-link']) ?>
                    </li>

                </ul>

                <?php
                    if ($loggedIn && $dataCompleted) {
                ?>
                <div class="dropdown-container" style="position: relative;">
                    <button type="button" class="btn btn-success dropdown-toggle my-2 my-sm-0 leftbutton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropdownMenuButton">
                                                <?= $role_name ?>
                    </button>
                                        <?php
                                            if ($user_role === "club") {
                                        ?>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="<?= $this->request->webroot.'jobs' ?>">My job offers</a>
                        <a class="dropdown-item" href="<?= $this->request->webroot.'clubs/edit/'.$role_id ?>">Club & personal info</a>
                        <a class="dropdown-item" href="<?= $this->request->webroot.'users/edit/'.$user_id ?>">User settings</a>
                    </div>
                                        <?php
                                            } else {
                                        ?>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="<?= $this->request->webroot.'coaches/edit/'.$role_id ?>">Personal info</a>
                        <a class="dropdown-item" href="<?= $this->request->webroot.'users/edit/'.$user_id ?>">User settings</a>
                    </div>
                                        <?php
                                            }
                                        ?>
                </div>
                    <?php        
                        echo $this->Html->link('Logout', ['controller' => 'users', 'action' => 'logout'], ['class' => 'btn btn-outline-success my-2 my-sm-0']);
                    }
                    else {
                        echo $this->Html->link('Sign-up', ['controller' => 'users', 'action' => 'add'], ['class' => 'btn btn-outline-success my-2 my-sm-0 leftbutton']);
                        echo $this->Html->link('Login', ['controller' => 'users', 'action' => 'login'], ['class' => 'btn btn-outline-success my-2 my-sm-0']);
                    }
                ?>


                <!--
                <form class="form-inline mt-2 mt-md-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                -->
            </div>
        </nav>
    </body>
</html>
