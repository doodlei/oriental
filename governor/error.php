<?php

class Error extends Governor {

    function __construct() {
        parent::__construct(); 
    }
    
    function index() {
        $this->scene->msg = '404 Message';
        $this->scene->render('error/index');
    }

}