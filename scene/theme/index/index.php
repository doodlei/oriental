<?php
getPage('header');
getPage('navbar');
?>
<div class="jumbotron">
    <?php
        echo $this->pick;
    ?>
</div>
<?php
echo getPage('header');
?>