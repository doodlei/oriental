<?php

if (isset($_SESSION['user']['id'])) {
    $willow = new StandAlone();
    session_start();
    session_unset();
    session_destroy();
    unset($_SESSION);
    $willow->redirect_to_login();
} else {
    $willow = new StandAlone();
    $redirect_to_login = $willow->redirect_to_login();
}