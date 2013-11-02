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
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo basicInfo('url'); ?>/index/index">Home</a></li>
                <li><a href="<?php echo basicInfo('url'); ?>/about/index">About</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><?php echo "<a href='" . basicInfo('url') . "/panel/logout'>Logout</a>"; ?></li>
            </ul>
        </div>

    </div>
    <?php
}
?>