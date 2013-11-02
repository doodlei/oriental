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
                box-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
                padding: 10px 20px 20px 20px;
                margin: 0 auto;
                width: 540px;
                -moz-border-radius: 5px 5px 0 0;
            ">';
    echo '<h2 style="text-align: center; text-transform: uppercase; color: blue;">Sign In</h2>';
    echo '<p style="text-align: center;">General Warehouse Management System</p>';
    $form = new FormDesigner();
    echo '<form class="form-horizontal" method="post">';
    echo $form->zontal_input_text('username', '', 'text', 'form-control', '', 'col-sm-2 control-label', 'col-sm-10', 'Username');
    echo $form->zontal_input_text('password', '', 'password', 'form-control', '', 'col-sm-2 control-label', 'col-sm-10', 'Password');
    echo $form->zontal_submit_btn('Submit', 'Sign In', 'col-sm-offset-2 col-sm-10', 'btn btn-primary');
    echo '</form>';
    echo '<p style="text-align: center;"><a href="#">Ask for an account!</a></p>';
    echo '</div>';
}
getPage('footer');
?>
