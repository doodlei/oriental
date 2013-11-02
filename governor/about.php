<?php

class About extends Governor {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->scene->msg = 'About us';
        $this->scene->render('about/index');
    }

}