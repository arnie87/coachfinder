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
            $('#loginForm').formValidation({
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
                                message: 'Required field cannot be left blank.'
                            },
                            emailAddress: {
                                message: 'Email address is not valid.'
                            }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'Required field cannot be left blank.'
                            }
                        }
                    }
                }
            });
        });
    </script>
    <style>
        /*@media (min-width: 1200px) {
            .container{
                max-width: 600px;
            }
        }*/
    </style>
    
</head>
<body class="">
    <div class="container">
        <div class="pagename">
            <h1>Please log in</h1>
        </div>        
        <?= $this->Flash->render() ?>
        <?= $this->Form->create($login, ['id' => 'loginForm']); ?>
        
        <div class="form-group row">
            <label for="email-input" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-6">
                <input class="form-control" type="email" value="" id="email-input" name="email">
            </div>
        </div>
        <div class="form-group row">
            <label for="password-input" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-6">
                <input class="form-control" type="password" value="" id="password-input" name="password">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-8">
                <button type="submit" class="btn btn-primary float-md-right">Login</button>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</body>
</html>
