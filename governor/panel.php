<?php

class Panel extends Governor {

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

}

?>