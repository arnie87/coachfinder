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
            $('#coachForm').formValidation({
                framework: 'bootstrap4',
                live: 'disabled',
                row: {
                    valid: 'has-success',
                    invalid: 'has-error'
                },
                fields: {
                    title: {
                        validators: {
                            notEmpty: {
                                message: 'Required field cannot be left blank.'
                            }
                        }
                    },
                    forename: {
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
                    surname: {
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
                    phone: {
                        validators: {
                            stringLength: {
                                min: 3,
                                max: 15,
                                message: 'Field has to be between 3 and 15 characters.'
                            }
                        }
                    },
                    postcode: {
                        validators: {
                            zipCode: {
                                country: 'GB',
                                message: 'Please enter a valid zip code.'
                            }
                        }
                    },
                    city: {
                        validators: {
                            stringLength: {
                                min: 3,
                                max: 30,
                                message: 'Field has to be between 3 and 30 characters.'
                            }
                        }
                    },
                    county_id: {
                        validators: {
                            notEmpty: {
                                message: 'Required field cannot be left blank.'
                            }
                        }
                    },
                    sport_id: {
                        validators: {
                            notEmpty: {
                                message: 'Required field cannot be left blank.'
                            }
                        }
                    },
                    description: {
                        validators: {
                            stringLength: {
                                min: 0,
                                max: 1000,
                                message: 'Field has too many characters.'
                            }
                        }
                    },
                    education: {
                        validators: {
                            stringLength: {
                                min: 3,
                                max: 30,
                                message: 'Field has to be between 3 and 30 characters.'
                            }
                        }
                    },
                    history: {
                        validators: {
                            stringLength: {
                                min: 0,
                                max: 250,
                                message: 'Field has too many characters.'
                            }
                        }
                    },
                    photo: {
                        validators: {
                            file: {
                                type: 'image/jpeg,image/png',
                                message: 'Please choose a JPEG/JPG or PNG file. Maximum size: 2,5 MB.',
                                maxSize: 2621440,
                                maxFiles: 1
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
                    <h1>Edit personal info</h1>
                </div>
                <?= $this->Flash->render() ?>
                <form method="post" enctype="multipart/form-data" accept-charset="utf-8" id="coachForm" action="/coachfinder/coaches/edit/<?= $coach['id'] ?>" novalidate="novalidate" class="fv-form fv-form-bootstrap4">
                    <div style="display:none;"><input type="hidden" name="_method" value="PUT"></div>
                    <div class="form-group row">
                        <label for="anrede-select" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="anrede-select" name="title">
                                <option value=""<?= ($coach['title'] == "") ? " selected" : "" ?>></option>
                                <option value="Mr"<?= ($coach['title'] == "Mr") ? " selected" : "" ?>>Mr</option>
                                <option value="Mrs"<?= ($coach['title'] == "Mrs") ? " selected" : "" ?>>Mrs</option>
                                <option value="Miss"<?= ($coach['title'] == "Miss") ? " selected" : "" ?>>Miss</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="vorname-input" class="col-sm-3 col-form-label">Forename</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="<?= $coach['forename'] ?>" id="vorname-input" name="forename">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nachname-input" class="col-sm-3 col-form-label">Surname</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="<?= $coach['surname'] ?>" id="nachname-input" name="surname">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telefon-input" class="col-sm-3 col-form-label">Phone</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="<?= $coach['phone'] ?>" id="telefon-input" name="phone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="plz-input" class="col-sm-3 col-form-label">Postcode</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="<?= $coach['postcode'] ?>" id="plz-input" name="postcode">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ort-input" class="col-sm-3 col-form-label">City</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="<?= $coach['city'] ?>" id="ort-input" name="city">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="bundesland-select" class="col-sm-3 col-form-label">County</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="bundesland-select" name="county_id">
                        <?php  
                        foreach ($counties as $county) {
                            $selected = "";
                            if ($coach['county_id'] == $county->id) {
                                $selected = " selected";
                            }
                            echo "<option value='".$county->id."'".$selected.">".$county->county."</option>";
                        } 
                        ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="vereinssuche-input" class="col-sm-3 col-form-label">I'm looking for a club</label>
                        <div class="col-sm-9">
                            <label class="radio-inline"><input type="radio" id="vereinssuche-input" name="active" value="1" <?= ($coach['active'] == 1) ? " checked" : "" ?>> Yes</label><br/>
                            <label class="radio-inline"><input type="radio" id="vereinssuche-input" name="active" value="0" <?= ($coach['active'] == 0) ? " checked" : "" ?>> No</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sportart-select" class="col-sm-3 col-form-label">Type of sport</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="sportart-select" name="sport_id">
                        <?php  
                        foreach ($sports as $sport) {
                            $selected = "";
                            if ($coach['sport_id'] == $sport->id) {
                                $selected = " selected";
                            }
                            echo "<option value='".$sport->id."'".$selected.">".$sport->sport."</option>";
                        } 
                        ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ausbildung-input" class="col-sm-3 col-form-label">Education</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="<?= $coach['education'] ?>" id="ausbildung-input" name="education">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="beschreibung-input" class="col-sm-3 col-form-label">Personal description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="beschreibung-input" name="description" rows="5"><?= $coach['description'] ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stationen-input" class="col-sm-3 col-form-label">Club history</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="<?= $coach['history'] ?>" id="stationen-input" name="history">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="foto-file" class="col-sm-3 col-form-label">Photo</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control-file" id="foto-file" aria-describedby="fileHelp" name="photo" value="<?= $coach['photo'] ?>">
                            <small id="fileHelp" class="form-text text-muted">Max. size: 2.5 MB</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary float-md-right">Save</button>
                            <?php 
                                echo $this->Html->link('Cancel', 
                                    ['controller' => 'home', 'action' => 'index'], 
                                    ['class' => 'btn btn-secondary btn-secondary-settings float-md-right']
                                );
                                echo $this->Html->link('View my profile »', 
                                    ['action' => 'view', $coach->id],
                                    ['class' => 'btn btn-secondary btn-secondary-settings float-md-right']
                                )
                            ;?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
