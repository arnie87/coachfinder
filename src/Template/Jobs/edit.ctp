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
        $(document).ready(function () {
            $('#jobForm').formValidation({
                framework: 'bootstrap4',
                live: 'disabled',
                row: {
                    valid: 'has-success',
                    invalid: 'has-error'
                },
                fields: {
                    available: {
                        validators: {
                            notEmpty: {
                                message: 'Required field cannot be left blank.'
                            }
                        }
                    },
                    contract_id: {
                        validators: {
                            notEmpty: {
                                message: 'Required field cannot be left blank.'
                            }
                        }
                    },
                    level_id: {
                        validators: {
                            notEmpty: {
                                message: 'Required field cannot be left blank.'
                            }
                        }
                    },
                    jobname: {
                        validators: {
                            notEmpty: {
                                message: 'Required field cannot be left blank.'
                            },
                            stringLength: {
                                min: 3,
                                max: 30,
                                message: 'Field has to be between 3 and 30 characters.'
                            }
                        }
                    },
                    description: {
                        validators: {
                            notEmpty: {
                                message: 'Required field cannot be left blank.'
                            },
                            stringLength: {
                                min: 0,
                                max: 1000,
                                message: 'Field has too many characters.'
                            }
                        }
                    }
                }
            });
        });
    </script>
</head>
<body>

    <div class="container settings-canvas">
        <div class="row">
            <div class="col-sm-4">
                <?= $this->element('sidebar') ?>
            </div>
            <div class="col-sm-8 settings-body">
                <div class="pagename">
                    <h1>Edit job offer</h1>
                </div>
                <?= $this->Form->create($job, ['id' => 'jobForm']); ?>
                <div class="form-group row">
                    <label for="stellefreiab-input" class="col-sm-3 col-form-label">Available from</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="date" value="<?= date('Y-m-d',strtotime($job['available'])) ?>" id="stellefreiab-input" name="available">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stellenart-select" class="col-sm-3 col-form-label">Job type</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="sportart-select" name="contract_id">
                            <option value=""></option>
                        <?php  
                        foreach ($contracts as $contract) {
                            $selected = "";
                            if ($job['contract_id'] == $contract->id) {
                                $selected = " selected";
                            }
                            echo "<option value='".$contract->id."'".$selected.">".$contract->contract."</option>";
                        } 
                        ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stellenart-select" class="col-sm-3 col-form-label">Level</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="sportart-select" name="level_id">
                            <option value=""></option>
                        <?php  
                        foreach ($levels as $level) {
                            $selected = "";
                            if ($job['level_id'] == $level->id) {
                                $selected = " selected";
                            }
                            echo "<option value='".$level->id."'".$selected.">".$level->level."</option>";
                        } 
                        ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="titel-input" class="col-sm-3 col-form-label">Title</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" value="<?= $job['jobname'] ?>" id="titel-input" name="jobname">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stelle-textarea" class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="stelle-textarea" rows="10" name="description"><?= $job['description'] ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary float-md-right">Save job</button>
                        <?= $this->Html->link('Cancel', 
                            ['controller' => 'jobs', 'action' => 'index'], 
                            ['class' => 'btn btn-secondary btn-secondary-settings float-md-right']
                        );?>
                    </div>
                </div>
                <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>
</body>
</html>
