<?php

class User {

    function __construct() {
        session_start();
    }

    public function authenticate($username = "", $password = "") {
        global $pdo;
        $submitted_username = '';
        if (!empty($_POST)) {
            $query = "SELECT * FROM wms_users WHERE username = :username";
            $query_params = array(':username' => $_POST['username']);

            try {
                $stmt = $pdo->prepare($query);
                $result = $stmt->execute($query_params);
            } catch (PDOException $ex) {
                die("Failed to run query: " . $ex->getMessage());
            }
            $login_ok = false;
            $row = $stmt->fetch();
            if ($row) {
                $check_password = hash('sha256', $_POST['password'] . $row['salt']);
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
                $this->scene->user = $_SESSION['user'] = $row;
                header("Location: profile");
            } else {
                print("Login Failed.");
                $submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');
            }
        }
    }

}
?>