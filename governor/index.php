<?php

class Index extends Governor {
    public $pdo = '';
    
    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->scene->msg1 = "Mon Chaile Mon Pabe<br/>";
        $this->scene->msg = "<h1>Deho Chaile Deho</h1>";
        $this->scene->render('index/index');
    }

    public function login() {
        global $pdo;
        //$sql = "SELECT * FROM users WHERE uname = 'sam'";
        if(!$pdo) {
            $pick = 'fuck';
        }
        
        $this->scene->pick;
        $this->scene->render('index/index');
    }

}