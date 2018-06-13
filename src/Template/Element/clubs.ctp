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
     
        </style>
    </head>
    <body>
        <?php $size = 0; ?>
        <?php foreach ($jobs as $job): ?>
            <div class="col-lg-4">
                <img class="rounded" src="<?= ($job->club->logo != "") ? $this->request->webroot."upload/club/".$job->club->logo : "data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" ?>" 
                    alt="Generic placeholder image" height="140">
                <p style="margin:0;"><?= $job->club->clubname; ?></p>
                <h2><?= $job->jobname; ?></h2>
                <p><?= $this->Trim->trimText($job->description); ?></p>
                <p><?= $this->Form->postLink('More info »', ['controller' => 'jobs', 'action' => 'view', $job->id], ['class' => 'btn btn-secondary']);?></p>
            </div>
        <?php $size ++; ?>
        <?php endforeach; ?>
        <?php
            if ($size == 0) {
                echo "<div class='col-sm-12 text-center lead'>Currently no job position available.</div>";
            }
        ?>
    </body>
</html>
