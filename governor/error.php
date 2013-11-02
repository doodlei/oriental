<?php

class Error extends Governor {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->scene->msg = 'Attempt Failed';
        $this->scene->render('error/index');
    }

}

?>