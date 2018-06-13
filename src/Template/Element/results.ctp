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

if (isset($_POST['role'])) {
    $selectedRole = $_POST['role'];
}
else {
    $selectedRole = "";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
     
        </style>
    </head>
    <body>
        
        <?php if ($selectedRole == "coaches") { ?>          
            
            <?php foreach ($coaches as $coach): ?>
            <div class="col-lg-4">
                <img class="rounded" src="<?= ($coach->foto != "") ? $this->request->webroot."/upload/coaches/".$coach->foto : "data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" ?>" 
                    alt="Generic placeholder image" height="140">
                <p style="margin:0;">Trainer</p>
                <h2><?= $coach->vorname . " " . $this->Trim->trimSurname($coach->nachname); ?></h2>
                <p><?= $this->Trim->trimText($coach->beschreibung); ?></p>
                <p><?= $this->Form->postLink('Mehr Infos »', ['controller' => 'coaches', 'action' => 'view', $coach->id], ['class' => 'btn btn-secondary']);?></p>
            </div>
            <?php endforeach; ?>
        
        <?php } else { ?>
            
            <?php foreach ($jobs as $job): ?>
            <div class="col-lg-4">
                <img class="rounded" src="<?= ($job->club->logo != "") ? $this->request->webroot."/upload/clubs/".$job->club->logo : "data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" ?>" 
                    alt="Generic placeholder image" height="140">
                <p style="margin:0;"><?= $job->club->name; ?></p>
                <h2><?= $job->titel; ?></h2>
                <p><?= $this->Trim->trimText($job->beschreibung); ?></p>
                <p><?= $this->Form->postLink('Mehr Infos »', ['controller' => 'jobs', 'action' => 'view', $job->id], ['class' => 'btn btn-secondary']);?></p>
            </div>
            <?php endforeach; ?>
        
        <?php } ?>

    </body>
</html>
