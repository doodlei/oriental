<?php
/**
 * Panel Class Contains several method, like- login, profile, viewusers,
 * logout, user_create_update
 * 
 * @author Samrat Khan <skydotint@gmail.com>
 * @name panel.php
 * @version 0.1
 * @license Public None
 * @package Panel
 * 
 */

class Panel extends \Governor {

    function __construct() {
        parent::__construct();
    }

    public function login() {
        $this->scene->render('panel/login');
    }

    public function profile() {
        $this->scene->render('panel/profile');
    }
    public function viewusers() {
        $this->scene->render('panel/viewusers');
    }
    
    public function logout() {
        $this->scene->render('panel/logout');
    }
    public function user_create_update() {
        $this->scene->render('panel/user_cu');
    }

}