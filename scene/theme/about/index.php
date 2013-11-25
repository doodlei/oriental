<?php

if (isset($_SESSION['user']['id'])) {
    getPage('header');
    getPage('navbar');
    echo '<div class="jumbotron">';
    echo $this->msg;
    echo '<br/>';
    echo $_SESSION['user']['username'];
    echo '</div>';
    getPage('footer');
} else {
    $willow = new StandAlone();
    $willow->redirect_to_login();
}