<?php
$willow = new \StandAlone();
if (isset($_SESSION['user']['id'])) {
    $willow->redirect_to(ROOT . DS . APPPATH . DS . 'panel' . DS . 'profile');
} else {
    $willow->redirect_to_login();
}