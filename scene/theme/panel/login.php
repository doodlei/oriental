<?php

getPage('header');
getPage('navbar');
if (isset($_POST['Submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $user = new User();
    $found_user = $user->authenticate($username, $password);
} else {
    echo '<div class="logincontainer"
            style=" background-color: #F7F7F7;
                padding: 10px 20px 20px 20px;
                margin: 0 auto;
                width: 540px;
                font: normal 13px Consolas;
                -moz-border-radius: 5px 5px 0 0;
            ">';
    echo '<p style="text-align: center; font: bold 14px Consolas;">Willow Login</p>';
    $form = new FormDesigner();
    echo '<form class="form-horizontal" method="post">';
    echo $form->zontal_input_text('username', 'text', 'text', 'form-control', '', 'col-sm-2 control-label', 'col-sm-10', 'Username');
    echo $form->zontal_input_text('password', 'password', 'password', 'form-control', '', 'col-sm-2 control-label', 'col-sm-10', 'Password');
    echo $form->zontal_submit_btn('Submit', 'Sign In', 'col-sm-offset-2 col-sm-10', 'btn btn-primary');
    echo '<div class="form-group"><span class="col-sm-offset-2 col-sm-10"><a class="btn btn-info" href="#">Ask for an account!</a></span></div>';
    echo '</form>';
    echo '</div>';
}
getPage('footer');
