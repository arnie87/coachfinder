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
    <div class="container">
        <div class="pagename">
            <h1>My coach data</h1>
        </div>            
        <?= $this->Flash->render() ?>
        <form method="post" enctype="multipart/form-data" accept-charset="utf-8" id="coachForm" action="/coachfinder/coaches/add"> <!-- /trainerboerse/coaches/ -->
            <div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>

            <div class="form-group row">
                <label for="anrede-select" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-6">
                    <select class="form-control" id="anrede-select" name="title">
                        <option value=""></option>
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Miss">Miss</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="vorname-input" class="col-sm-2 col-form-label">Forename</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" value="" id="vorname-input" name="forename">
                </div>
            </div>
            <div class="form-group row">
                <label for="nachname-input" class="col-sm-2 col-form-label">Surname</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" value="" id="nachname-input" name="surname">
                </div>
            </div>
            <div class="form-group row">
                <label for="telefon-input" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" value="" id="telefon-input" name="phone">
                </div>
            </div>
            <div class="form-group row">
                <label for="plz-input" class="col-sm-2 col-form-label">Postcode</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" value="" id="plz-input" name="postcode">
                </div>
            </div>
            <div class="form-group row">
                <label for="ort-input" class="col-sm-2 col-form-label">City</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" value="" id="ort-input" name="city">
                </div>
            </div>
            <div class="form-group row">
                <label for="bundesland-select" class="col-sm-2 col-form-label">County</label>
                <div class="col-sm-6">
                    <select class="form-control" id="bundesland-select" name="county_id">
                        <option value=""></option>
                        <?php  
                        foreach ($counties as $county) {
                            echo "<option value=".$county->id.">".$county->county."</option>";
                        } 
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="vereinssuche-input" class="col-sm-2 col-form-label">I'm looking for a club</label>
                <div class="col-sm-6">
                    <label class="radio-inline"><input type="radio" id="vereinssuche-input" name="active" value="1" checked="checked"> Yes</label><br/>
                    <label class="radio-inline"><input type="radio" id="vereinssuche-input" name="active" value="0"> No</label>
                </div>
            </div>
            <div class="form-group row">
                <label for="sportart-select" class="col-sm-2 col-form-label">Type of sport</label>
                <div class="col-sm-6">
                    <select class="form-control" id="sportart-select" name="sport_id">
                        <option value=""></option>
                        <?php  
                        foreach ($sports as $sport) {
                            echo "<option value=".$sport->id.">".$sport->sport."</option>";
                        } 
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="ausbildung-input" class="col-sm-2 col-form-label">Education</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" value="" id="ausbildung-input" name="education">
                </div>
            </div>
            <div class="form-group row">
                <label for="beschreibung-input" class="col-sm-2 col-form-label">Personal description</label>
                <div class="col-sm-6">
                    <textarea class="form-control" id="beschreibung-input" name="description" rows="5"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="stationen-input" class="col-sm-2 col-form-label">Club history</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" value="" id="stationen-input" name="history">
                </div>
            </div>
            <div class="form-group row">
                <label for="foto-file" class="col-sm-2 col-form-label">Photo</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control-file" id="foto-file" aria-describedby="fileHelp" name="photo" value="">
                    <small id="fileHelp" class="form-text text-muted">Max. size: 2.5 MB</small>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-8">
                    <button type="submit" class="btn btn-primary float-md-right">Complete registration</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
