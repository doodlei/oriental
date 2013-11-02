<?php

class Index extends Governor {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->scene->msg1 = "Mon Chaile Mon Pabe<br/>";
        $this->scene->msg = "<h1>Deho Chaile Deho</h1>";
        $this->scene->render('index/index');
    }

}