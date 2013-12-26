<?php

if (isset($_SESSION['user']['id'])) {
    getPage('header');
    getPage('navbar');

    echo '<div class="jumbotron">';

        $willow = new StandAlone();
        $query = "SELECT * FROM wms_users WHERE id = '" . $_SESSION['user']['id'] . "'";
        $row = $willow->Willow_Query($query);

        echo $row['username'];

    echo '</div>';

    getPage('footer');
} else {
    $willow = new StandAlone();
    $redirect_to_login = $willow->redirect_to_login();
}