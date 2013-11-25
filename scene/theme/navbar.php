<?php
if (isset($_SESSION['user']['id'])) {
    ?>
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?php basicInfo('title'); ?></a>
        </div>
        <div class="navbar-collapse collapse dropdown">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo basicInfo('url'); ?>/index/index">Home</a></li>
                <li><a href="<?php echo basicInfo('url'); ?>/about/index">About</a></li>
                
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">User management <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo basicInfo('url'); ?>/panel/profile">Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo basicInfo('url'); ?>/panel/user_create_update">Add an user</a></li>
                        <li><a href="<?php echo basicInfo('url'); ?>/panel/viewusers">View Users</a></li>
                        <li><a href="<?php echo basicInfo('url'); ?>/panel/loginhistory">Login History</a></li>
                        <li class="divider"></li>
                        <li><?php echo "<a href='" . basicInfo('url') . "/panel/logout'>Logout</a>"; ?></li>
                    </ul>
                </li>
            </ul>
        </div>

    </div>
    <?php
}
?>