<?php

if (isset($_SESSION['user']['id'])) {
    getPage('header');
    getPage('navbar');
    echo '<div class="jumbotron">';
        
        $willow = new StandAlone();
        $query = "SELECT * FROM wms_users WHERE id = '".$_SESSION['user']['id']."'";
        $row = $willow->Willow_Query($query);
        
        echo $row['username'];
    echo '</div>';
    getPage('footer');
} else {
    header("Location: http://192.168.0.25:8081/fwf/panel/login");
}
?>