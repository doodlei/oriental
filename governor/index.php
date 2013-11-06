<?php

class Index extends Governor {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->scene->msg = "Mon Chaile Mon Pabe<br/>";
        $this->scene->render('index/index');
    }

}