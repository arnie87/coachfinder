<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View;

use Cake\View\View;

/**
 * Application View
 *
 * Your application’s default view class
 *
 * @link http://book.cakephp.org/3.0/en/views.html#the-app-view
 */
class AppView extends View
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadHelper('Trim');
        
        $session = $this->request->session();
        $user_id = $session->read('User.id');
        $user_email = $session->read('User.email');
        $user_role = $session->read('User.role');
        $role_id = $session->read('Role.id');
        $role_name = $session->read('Role.name');
        $role_pic = $session->read('Role.pic');
        
        $this->set('user_id', $user_id);
        $this->set('user_email', $user_email);
        $this->set('user_role', $user_role);
        $this->set('role_id', $role_id);
        $this->set('role_name', $role_name);
        $this->set('role_pic', $role_pic);
    }
}