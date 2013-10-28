<?php
class About extends Governor {
    function __construct() {
        parent::__construct(); 
    }
    
    function index() {
        include 'sketch/Session.php';
        $this->scene->msg = 'About us';
        
        if(!$session->is_logged_in()) {
            $this->scene->render('about/index');
        } else {
            $this->scene->render('error/index');
        }
    }

}