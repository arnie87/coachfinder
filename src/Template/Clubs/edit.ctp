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
            $('#clubForm').formValidation({
                framework: 'bootstrap4',
                live: 'disabled',
                row: {
                    valid: 'has-success',
                    invalid: 'has-error'
                },
                fields: {
                    sport_id: {
                        validators: {
                            notEmpty: {
                                message: 'Required field cannot be left blank.'
                            }
                        }
                    },
                    clubname: {
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
                    county: {
                        validators: {
                            notEmpty: {
                                message: 'Required field cannot be left blank.'
                            }
                        }
                    },
                    logo: {
                        validators: {
                            file: {
                                type: 'image/jpeg,image/png',
                                message: 'Please choose a JPEG/JPG or PNG file. Maximum size: 2,5 MB.',
                                maxSize: 2621440,
                                maxFiles: 1
                            }
                        }
                    },
                    homepage: {
                        validators: {
                            uri: {
                                message: 'Please enter a valid website.',
                                allowEmptyProtocol: true
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
                    <h1>Edit club data</h1>
                </div>
                <?= $this->Flash->render() ?>
                <form method="post" enctype="multipart/form-data" accept-charset="utf-8" id="clubForm" action="/coachfinder/clubs/edit/<?= $club['id'] ?>" novalidate="novalidate" class="fv-form fv-form-bootstrap4">
                    <div style="display:none;"><input type="hidden" name="_method" value="PUT"></div>
                    
                    <div class="form-group row">
                        <label for="sportart-select" class="col-sm-3 col-form-label">Type of sport</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="sportart-select" name="sport_id">
                                <option value=""></option>
                        <?php  
                        foreach ($sports as $sport) {
                            $selected = "";
                            if ($club['sport_id'] == $sport->id) {
                                $selected = " selected";
                            }
                            echo "<option value='".$sport->id."'".$selected.">".$sport->sport."</option>";
                        } 
                        ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Club name</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="<?= $club['clubname'] ?>" id="name" name="clubname">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="plz" class="col-sm-3 col-form-label">Postcode</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="<?= $club['postcode'] ?>" id="plz" name="postcode">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ort-input" class="col-sm-3 col-form-label">City</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="<?= $club['city'] ?>" id="ort-input" name="city">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="bundesland-select" class="col-sm-3 col-form-label">County</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="bundesland-select" name="county_id">
                                <option value=""></option>
                        <?php  
                        foreach ($counties as $county) {
                            $selected = "";
                            if ($club['county_id'] == $county->id) {
                                $selected = " selected";
                            }
                            echo "<option value='".$county->id."'".$selected.">".$county->county."</option>";
                        } 
                        ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="homepage-input" class="col-sm-3 col-form-label">Homepage</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="url" value="<?= $club['homepage'] ?>" id="homepage-input" name="homepage">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="logo-file" class="col-sm-3 col-form-label">Club logo</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control-file" id="logo-file" aria-describedby="fileHelp" name="logo" value="<?= $club['logo'] ?>">
                            <small id="fileHelp" class="form-text text-muted">Max. size: 2.5 MB</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="beschreibung-input" class="col-sm-3 col-form-label">Club description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="beschreibung-input" name="description" rows="5"><?= $club['description'] ?></textarea>
                        </div>
                    </div>
                    <div class="pagename" style="padding-top: 1em">
                        <h1>Edit personal info</h1>
                    </div>
                    <div class="form-group row">
                        <label for="anrede-select" class="col-sm-3 col-form-label">Title</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="anrede-select" name="title">
                                <option value=""<?= ($club['title'] == "") ? " selected" : "" ?>></option>
                                <option value="Mr"<?= ($club['title'] == "Mr") ? " selected" : "" ?>>Mr</option>
                                <option value="Mrs"<?= ($club['title'] == "Mrs") ? " selected" : "" ?>>Mrs</option>
                                <option value="Miss"<?= ($club['title'] == "Miss") ? " selected" : "" ?>>Miss</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="vorname-input" class="col-sm-3 col-form-label">Forename</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="<?= $club['forename'] ?>" id="vorname-input" name="forename">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nachname-input" class="col-sm-3 col-form-label">Surname</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="<?= $club['surname'] ?>" id="nachname-input" name="surname">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary float-md-right">Save</button>
                    <?= $this->Html->link('Cancel', 
                        ['controller' => 'home', 'action' => 'index'], 
                        ['class' => 'btn btn-secondary btn-secondary-settings float-md-right']
                    );?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
