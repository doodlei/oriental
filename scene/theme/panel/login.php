<style>
    .loginbody {
        background: url('../scene/drawer/img/worldmap.jpg') 50% 35%;
        margin: 0;
        padding: 0;
        width: 100%;
    }
    .panel-default {
        opacity: 0.9;
        margin-top:30px;
    }
    .form-group.last { margin-bottom:0px; }
</style>
<?php
getPage('header');
getPage('navbar');
if (isset($_POST['Submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $user = new User();
    $found_user = $user->authenticate($username, $password);
} else {
    $form = new FormDesigner();
    echo '<div class="loginbody"><div class="container"><div class="row"><div class="col-md-4 col-md-offset-7"><div class="panel panel-default"><div class="panel-heading">Willow Login</div><div class="panel-body"><form class="form-horizontal" method="post">';
    echo $form->zontal_input_text('username', 'text', 'form-control', 'form-control', 'col-sm-3', 'col-sm-9 control-label', 'Username', 'Username');
    echo $form->zontal_input_text('password', 'password', 'form-control', 'form-control', 'col-sm-3', 'col-sm-9 control-label', 'Password', '');
    echo '
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <div class="checkbox">
                <label>
                    <input type="checkbox"/>
                    Remember me
                </label>
            </div>
        </div>
    </div>
    <div class="form-group last">
        <div class="col-sm-9 control-label">';
            echo $form->zontal_submit_btn('Submit', 'Sign In', 'col-sm-offset-2 col-sm-6', 'btn btn-success');
    echo '
        </div>
        <div class="col-sm-3 control-label">';
            echo '<button type="reset" class="btn btn-default" style="float: left;">Reset</button>';
        echo '</div>
    </div>
</form>
</div>
<div class="panel-footer">Not Registred? <a href="#">Ask for an account!</a></div>
</div></div>
';
}
getPage('footer');
