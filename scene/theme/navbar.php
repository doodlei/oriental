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
            <!-- Left Menus -->
            <ul class="nav navbar-nav">
                <li><a href="<?php echo basicInfo('url'); ?>/index/index">Home</a></li>
                <li><a href="<?php echo basicInfo('url'); ?>/upload/csv">Upload CSV</a></li>
                
                <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin Panel <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu"> <a tabindex="-1" href="#">Warehouses</a>
                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="#">Add Warehouse</a></li>
                                    <li><a tabindex="-1" href="<?php echo basicInfo('url'); ?>/about/index">View Warehouse</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu"> <a tabindex="-1" href="#">Customers</a>
                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="#">Add Customer</a></li>
                                    <li><a tabindex="-1" href="#">View Customers</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu"> <a tabindex="-1" href="#">Engineers</a>
                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="#">Add Engineer</a></li>
                                    <li><a tabindex="-1" href="#">View Engineers</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu"> <a tabindex="-1" href="#">Supervisors</a>
                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="#">Add Supervisor</a></li>
                                    <li><a tabindex="-1" href="#">View Supervisors</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu"> <a tabindex="-1" href="#">Projects</a>
                                <ul class="dropdown-menu">
                                    <li><a tabindex="-1" href="#">Add Project</a></li>
                                    <li><a tabindex="-1" href="#">View Projects</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
            </ul>
            <!-- Right Panel -->
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Panel <b class="caret"></b></a>
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