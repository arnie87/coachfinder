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
            $('#userForm').formValidation({
                framework: 'bootstrap4',
                live: 'disabled',
                row: {
                    valid: 'has-success',
                    invalid: 'has-error'
                },
                fields: {
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'Dieses Feld darf nicht leer bleiben.'
                            },
                            emailAddress: {
                                message: 'Es muss eine gültige E-Mail-Adresse eingegeben werden.'
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'Dieses Feld darf nicht leer bleiben.'
                            },
                            stringLength: {
                                min: 6,
                                max: 15,
                                message: 'Das Passwort muss zwischen 6 und 15 Zeichen lang sein.'
                            }
                        }
                    },
                    confirmPassword: {
                        validators: {
                            notEmpty: {
                                message: 'Dieses Feld darf nicht leer bleiben.'
                            },
                            stringLength: {
                                min: 6,
                                max: 15,
                                message: 'Das Passwort muss zwischen 6 und 15 Zeichen lang sein.'
                            },
                            identical: {
                                field: 'password',
                                message: 'The password and its confirm are not the same'
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
                    <h1>Edit user settings</h1>                    
                </div>
                <?= $this->Flash->render() ?>
                <?= $this->Form->create($user, ['id' => 'userForm']); ?>
                <div class="form-group row">
                    <label for="email-input" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="email" value="<?= $user['email'] ?>" id="email-input" name="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password-input" class="col-sm-3 col-form-label">New password</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="password" value="" id="password-input" name="password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password-wh-input" class="col-sm-3 col-form-label">Confirm new password</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="password" value="" id="password-wh-input" name="confirmPassword">
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
                <?= $this->Form->end(); ?>  
                <div class="form-group row">
                    <div class="col-sm-3 text-right">                
                <?= $this->Form->postLink(
                    'Delete user',
                    ['action' => 'delete', $user['id']],
                    ['confirm' => 'Delete user?'])
                ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
