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

    public function users() {
        global $pdo;
        $query = 'SELECT * FROM users';
        try {
            $stmt = $pdo->prepare($query);
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Failed to run query: " . $ex->getMessage());
        }
        $this->scene->rows = $stmt->fetchAll();
        $this->scene->render('index/users');
        
    }

}