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
</head>
<body>

    <div class="container settings-canvas">
        <div class="row">
            <div class="col-sm-4">
                <?= $this->element('sidebar') ?>
            </div>
            <div class="col-sm-8 settings-body">
                <div class="pagename">
                    <h1>My job offers</h1>
                </div>
                <div style="text-align:center;">
                    <?= $this->Html->link('Add new job position', 
                        ['action' => 'add'], 
                        ['class' => 'btn btn-primary center-block', 'style' => '']
                    );?>
                </div>
                <?= $this->element('jobs') ?>
            </div>
        </div>
    </div>

</body>
</html>
