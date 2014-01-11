<?php

if (isset($_SESSION['user']['id'])) {
    getPage('header');
    getPage('navbar');

    if (isset($_POST['addUser'])) {
        
        $user = new User();
        
        $user->create_an_user('wms_users');
        
    } else {
        $form = new FormDesigner();
        $getname = new Getname();

        echo '<form method="post" class="form-horizontal col-sm-7" role="form"><fieldset>'
                . '<legend>Add an user</legend>';
                echo $form->zontal_input_text('fullname', 'text', 'form-control', 'fullname', 'col-sm-3', 'col-sm-9', 'Full Name', '');
                echo $form->zontal_input_text('username', 'text', 'form-control', 'username', 'col-sm-3', 'col-sm-9', 'User Name', '');
                echo $form->zontal_input_text('password', 'password', 'form-control', 'Password', 'col-sm-3', 'col-sm-9', 'Password', '');
                echo $form->zontal_input_text('email', 'text', 'form-control', 'EmailAddress', 'col-sm-3', 'col-sm-9', 'Email Address', '');
                echo '<div class="form-group">
                        <label class="col-sm-3 control-label">User Description</label>
                        <div class="col-sm-9">';
                            echo $form->zontal_textarea('description', '', 'description', '', '90', '');
                            echo '<button onClick="toggleArea1();">Change Editor</button>';
                echo '</div>
                    </div>';
                
                
                echo '<div class="form-group">
                        <label class="col-sm-3 control-label">User Type</label>
                        <div class="col-sm-9">';
                            echo '<select name="usertype" class="form-control">';
                                echo $getname->getname_for_option('usertype', 'type_id', 'typename');
                            echo '</select>
                        </div>
                        </div>';
               echo '<div class="form-group">
                        <label class="col-sm-3 control-label">Customer</label>
                        <div class="col-sm-9">';
                            echo '<select name="cus_id" class="form-control">';
                                echo $getname->getname_for_option('customerinfo', 'cus_id', 'cusname');
                            echo '</select>
                        </div>
                        </div>';
                echo $form->html_input_hidden('isActive', 1);
                echo $form->zontal_submit_btn('addUser', 'Add User', 'col-sm-3', 'btn btn-primary');
        echo '</fieldset></form>';
    }
    getPage('footer');
} else {
    $willow = new StandAlone();
    $redirect_to_login = $willow->redirect_to_login();
}