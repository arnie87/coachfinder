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
    <div class="container">
        <div class="pagename">
            <h1>Club data</h1>
        </div>
        <?= $this->Flash->render() ?>
        <form method="post" enctype="multipart/form-data" accept-charset="utf-8" id="clubForm" action="/coachfinder/clubs/add">
            <div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>
            
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
                <label for="name" class="col-sm-2 col-form-label">Club name</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" value="" id="name" name="clubname">
                </div>
            </div>
            <div class="form-group row">
                <label for="plz" class="col-sm-2 col-form-label">Postcode</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" value="" id="plz" name="postcode">
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
                <label for="homepage-input" class="col-sm-2 col-form-label">Homepage</label>
                <div class="col-sm-6">
                    <input class="form-control" type="url" value="" id="homepage-input" name="homepage">
                </div>
            </div>
            <div class="form-group row">
                <label for="logo-file" class="col-sm-2 col-form-label">Club logo</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control-file" id="logo-file" aria-describedby="fileHelp" name="logo">
                    <small id="fileHelp" class="form-text text-muted">Max. size: 2.5 MB</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="beschreibung-input" class="col-sm-2 col-form-label">Club description</label>
                <div class="col-sm-6">
                    <textarea class="form-control" id="beschreibung-input" name="description" rows="5"></textarea>
                </div>
            </div>
            <div class="pagename" style="padding-top: 1em">
                <h1>My personal data</h1>
            </div>
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
                <div class="col-8">
                    <button type="submit" class="btn btn-primary float-md-right">Complete registration</button>
                </div>
            </div>
        </form>

    </div>
</body>
</html>
