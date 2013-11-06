<?php

class Panel extends Governor {

    function __construct() {
        parent::__construct();
    }

    public function login() {
        $this->scene->render('panel/login');
    }

    public function profile() {
        global $pdo;
        $query = "SELECT * FROM wms_users WHERE id = '".$_SESSION['user']['id']."'";
        try {
            $stmt = $pdo->prepare($query);
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Failed to run query: " . $ex->getMessage());
        }
        $this->scene->row = $stmt->fetch();
        $this->scene->render('panel/profile');
    }
    
    public function logout() {
        $this->scene->render('panel/logout');
    }

}

?>