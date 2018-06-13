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
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            .job {
                margin-top: 3em;
            }
        </style>
    </head>
    <body>
        <?php foreach ($jobs as $key=>$job): ?>
            <?php 
                 if(($key % 2) == 0) {
                    echo "<div class='row job'>";
                 }
            ?>
            <div class="col-sm-6 text-center">
                <h2><?= $job->jobname; ?></h2>
                <p><?= $this->Trim->trimText($job->description); ?></p>
                <p>
                <?= $this->Html->link('View »', ['controller' => 'jobs', 'action' => 'view', $job->id], ['class' => 'btn btn-secondary']);?>
                <?= $this->Html->link('Edit »', ['controller' => 'jobs', 'action' => 'edit', $job->id], ['class' => 'btn btn-secondary']);?>
                <?= $this->Form->postButton('Delete »', ['controller' => 'jobs', 'action' => 'delete', $job->id], ['class' => 'btn btn-secondary']);?>
                </p>
            </div>
            <?php 
                 if((($key % 2) == 1)) {
                    echo "</div>";
                 }
            ?>
        <?php endforeach; ?>
    </body>
</html>
