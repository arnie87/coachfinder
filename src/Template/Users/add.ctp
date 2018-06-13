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
                            },
                            stringLength: {
                                min: 6,
                                max: 15,
                                message: 'The password has to be between 6 and 15 characters.'
                            }
                        }
                    },
                    role: {
                        validators: {
                            notEmpty: {
                                message: 'Required field cannot be left blank.'
                            }
                        }
                    }
                }
            });

            $("#show_hide_password a").on('click', function (event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("fa-eye-slash");
                    $('#show_hide_password i').removeClass("fa-eye");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("fa-eye-slash");
                    $('#show_hide_password i').addClass("fa-eye");
                }
            });
        });

    </script>
</script>
</head>
<body>
    <div class="container">
        <div class="pagename">
            <h1>Sign-up</h1>
        </div>
        <?= $this->Flash->render() ?>
        <?= $this->Form->create($user, ['id' => 'userForm']); ?>
        <div class="form-group row">
            <label for="email-input" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-6">
                <input class="form-control" type="email" value="" id="email-input" name="email">
            </div>
        </div>
        <div class="form-group row">
            <label for="password-input" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-6">
                <div class="input-group" id="show_hide_password">
                    <input class="form-control" type="password" value="" id="password-input" name="password">
                    <div class="input-group-addon">
                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="role-input" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-6">
                <p style="margin: 0px; padding-top: 5px;">
                    <label class="form-check-label" style="margin-right: 1em;"><input type="radio" class="form-check-input" id="role-input" name="role" value="coach"> I'm a coach</label>
                    <label class="form-check-label"><input type="radio" class="form-check-input" id="role-input" name="role" value="club"> I'm offering jobs</label>
                </p>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-8">
                <button type="submit" class="btn btn-primary float-md-right">Continue</button>
            </div>
        </div>
        <?= $this->Form->end(); ?>
    </div>
</body>
</html>