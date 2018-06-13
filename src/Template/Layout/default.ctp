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

 * 
 * 
 * <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
 *  */

$cakeDescription = 'Coach Job Market - ';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">    

        <link rel="shortcut icon" type="image/x-icon" href="images/fav-icon.png" />

        <title>
            <?= $cakeDescription ?>
            <?= $this->fetch('title') ?>
        </title>

        <?= $this->Html->charset() ?>   
        <?= $this->Html->meta('icon') ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>

        <?= $this->Html->css('bootstrap.min.css') ?>
        <?= $this->Html->css('carousel.css') ?>
        <?= $this->Html->css('formValidation.min.css') ?>
        <?= $this->Html->css('font-awesome.min.css') ?>
        <?= $this->Html->css('mystyle.css') ?>

        <?= $this->Html->script('jquery-3.1.1.slim.min.js') ?>
        <?= $this->Html->script('tether.min.js') ?>
        <?= $this->Html->script('bootstrap.min.js') ?>
        <?= $this->Html->script('holder.min.js') ?>
        <?= $this->Html->script('ie10-viewport-bug-workaround.js') ?>
        <?= $this->Html->script('formValidation.min.js') ?>
        <?= $this->Html->script('bootstrap4.min.js') ?>
    </head>
    <body>
        <?= $this->element('header') ?>
        <?= $this->fetch('content') ?>        
        <?= $this->element('footer') ?>
        <svg xmlns="http://www.w3.org/2000/svg" width="500" height="500" viewBox="0 0 500 500" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="25" style="font-weight:bold;font-size:25pt;font-family:Arial, Helvetica, Open Sans, sans-serif">500x500</text></svg>
    </body>

</html>
