<?php
if (isset($_SESSION['user']['id'])) {
    getPage('header');
    getPage('navbar');
    echo '<div class="jumbotron">';
    echo $this->msg;
    echo '</div>';
    getPage('footer');
} else {
    header("Location: http://192.168.0.25:8081/fwf/panel/login");
}
?>