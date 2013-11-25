<?php

if (isset($_SESSION['user']['id'])) {
    getPage('header');
    getPage('navbar');
    
    $form = new FormDesigner();

    echo '<form class="form-horizontal col-sm-7" role="form">'
    . '<fieldset>'
            . '<legend>Create an user</legend>';
    
        echo $form->zontal_input_text('username', 'text', 'form-control', 'username', 'col-sm-2', 'col-sm-10', 'User Name', '');
    echo '</fieldset>'
        . '</form>';



    getPage('footer');
} else {
    $willow = new StandAlone();
    $redirect_to_login = $willow->redirect_to_login();
}