<?php

/**
 * 
 * @author Samrat Khan <skydotint@gmail.com>
 * @name User.php
 * @version 0.1
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @package User
 * 
 */
class User {

    private $session = '';

    function __construct() {
        session_start();
    }

    /**
     * 
     * @global type $pdo
     * @param type $username
     * @param type $password
     */
    public function authenticate($username = "", $password = "") {
        global $pdo;
        
        $submitted_username = '';
        
        if (!empty($_POST)) {
            $query = "SELECT * FROM wms_users WHERE username = :username";
            $query_params = array(
                ':username'     => filter_input(INPUT_POST, 'username'),
            );

            try {
                $stmt = $pdo->prepare($query);
                $stmt->execute($query_params);
            } catch (PDOException $ex) {
                die("Failed to run query: " . $ex->getMessage());
            }
            $login_ok = false;
            $row = $stmt->fetch();
            if ($row) {
                $check_password = hash('sha256', \filter_input(INPUT_POST, 'password') . $row['salt']);
                for ($round = 0; $round < 65536; $round++) {
                    $check_password = hash('sha256', $check_password . $row['salt']);
                }

                if ($check_password === $row['password']) {
                    $login_ok = true;
                }
            }
            if ($login_ok) {
                unset($row['salt']);
                unset($row['password']);
                $_SESSION['user'] = $row;
                header("Location: profile");
            } else {
                print("Login Failed.");
                htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');
                $willow = new StandAlone();
                $willow->redirect_to_login();
            }
        }
    }
    
    public function create_an_user($tablename) {
        global $pdo;
        
        $query = "SELECT 1 FROM $tablename WHERE username = :username";
        $query_params = array(
            ':username' => filter_input(INPUT_POST, 'username'),
        );
        
        try {
            $stmt = $pdo->prepare($query);
            $result = $stmt->execute($query_params);
        } catch (PDOException $ex) {
            die("Failed to run query: " . $ex->getMessage());
        }
        
        $row = $stmt->fetch();
        
        if ($row) {
            die("This username is already in use");
        }
        
        $query1 = "INSERT INTO $tablename ( fullname, username, password, salt, email, description, utype, cus_id, inserteddate, isActive ) VALUES ( :fullname, :username, :password, :salt, :email, :description, :utype, :cus_id, :inserteddate, :isActive )";
        
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
        $password = hash('sha256', filter_input(INPUT_POST, 'password') . $salt);
        
        for ($round = 0; $round < 65536; $round++) {
            $password = hash('sha256', $password . $salt);
        }
        
        $query_params1 = array(
            ':fullname'     => filter_input(INPUT_POST, 'fullname'),
            ':username'     => filter_input(INPUT_POST, 'username'),
            ':password'     => $password,
            ':salt'         => $salt,
            ':email'        => filter_input(INPUT_POST, 'email'),
            ':description'  => filter_input(INPUT_POST, 'description'),
            ':utype'        => filter_input(INPUT_POST, 'usertype'),
            ':cus_id'       => filter_input(INPUT_POST, 'cus_id'),
            ':inserteddate' => date('Y-m-d H:i:s'),
            ':isActive'     => filter_input(INPUT_POST, 'isActive'),
        );

        //var_dump($query_params1);
        try {
            $stmt1 = $pdo->prepare($query1);
            $result1 = $stmt1->execute($query_params1);
        } catch (PDOException $ex) {
            die("Failed to run query: " . $ex->getMessage());
        }
        
    }

}