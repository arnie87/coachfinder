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
<head>
    <script>
    </script>
</head>
<body>
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <img class="rounded float-left" height="220" src="<?php if($job->club->logo != "") { echo $this->request->webroot."upload/club/".$job->club->logo; } else { echo "data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="; }?>"/>
                </div>
                <div class="col-sm9 text-left" style="margin-left: 2em;">
                    <h1><?= $job->club->clubname; ?></h1>
                    <p>
                    <?= $job->club->sport->sport; ?>-Club<br>
                    <?= $job->club->city; ?> (<?= $job->club->county->county; ?>)<br>
                    <?= $job->club->homepage; ?>
                    </p>
                    <p>
                        <?= $job->club->description; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container marketing">
        <p class="text-center">
            <?php
                if (isset($role_id) && $role_id == $job->club->id) {
                    echo $this->Html->link('Edit my job position »', ['action' => 'edit', $job->id], ['class' => 'btn btn-secondary']);
                }
            ?>
        </p>
        <h1><?= $job['jobname'] ?></h1>
        <p>
            Available from <?= date('j F Y',strtotime($job['available'])) ?>
        </p>
        <p>
            <?= $job['description'] ?>
        </p>
        <p>
            <?= $job->contract->contract ?>, Level: <?= $job->level->level ?>
        </p>
    </div>
</body>
</html>
