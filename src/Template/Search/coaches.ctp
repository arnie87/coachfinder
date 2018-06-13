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
    <style>
        .container {
            background-size: cover;
        }
        .btn-primary {
            width:100%;
            margin: 0.1em;
        }
    </style>       
</head>
<body>

    <div class="jumbotron">
        <div class="container">
            <p class="lead">
                Find your new coach!
            </p>
            <div class="searchpanel">
                <form method="post">
                    <div class="row">
                        <select class="form-control" id="sportart-select" name="selected-sport">
                    <?php
                    if (isset($_POST['selected-sport-home'])) {
                        $selectedSportId = $_POST['selected-sport-home'];
                    }
                    else if (isset($_POST['selected-sport'])) {
                        $selectedSportId = $_POST['selected-sport'];
                    }
                    else {
                        $selectedSportId = 1;
                    }
                    
                    foreach ($sports as $sport) {
                        $selected = "";
                        if ($selectedSportId == $sport->id) {
                            $selected = " selected";
                        }
                        echo "<option value='".$sport->id."'".$selected.">".$sport->sport."</option>";
                    } 
                    ?>
                        </select>
                    </div>
                    <div class="row">
                        <select class="form-control" id="bundesland-select" name="selected-county">
                            <option value="0">All Counties</option>
                        <?php  
                        if (isset($_POST['selected-county'])) {
                            $selectedCountyId = $_POST['selected-county'];
                        }
                        else {
                            $selectedCountyId = 0;
                        }
                        
                        foreach ($counties as $county) {
                            $selected = "";
                            if ($selectedCountyId == $county->id) {
                                $selected = " selected";
                            }
                            echo "<option value='".$county->id."'".$selected.">".$county->county."</option>";
                        } 
                        ?>
                        </select>
                    </div>
                    <div class="row">
                        <button type="submit" name="role" value="coaches" class="btn btn-primary btn-md">Find coach</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container marketing">

        <!-- Coaches -->
        <div class="row">
            <?= $this->element('coaches') ?>
        </div>

    </div>
</body>
</html>
