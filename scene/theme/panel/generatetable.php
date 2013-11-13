<?php
if (isset($_SESSION['user']['id'])) {
    getPage('header');
    getPage('navbar');
    echo '<div class="jumbotron">';

        $data[0] = array("1", "Megan", "megan.fox@gmail.com", "<a href=\"#\">index</a>");
        $data[1] = array("2", "John", "john.doe@gmail.com", "<a href=\"#\">index</a>");
        $data[2] = array("3", "Paul", "paul.butter@gmail.com", "<a href=\"#\">index</a>");
        $data[3] = array("4", "Michael", "michael.pop@gmail.com", "<a href=\"#\">index</a>");
        $data[4] = array("5", "George", "dog.g@gmail.com", "<a href=\"#\">index</a>");
        $data[5] = array("6", "Jill", "jj.doc@gmail.com", "<a href=\"#\">index</a>");
        $data[6] = array("7", "Billy", "kill.bill@gmail.com", "<a href=\"#\">index</a>");
        $data[7] = array("8", "Steve", "steve.job@gmail.com", "<a href=\"#\">index</a>");

        $headers = array('ID', 'Name', 'Email', 'erqwer');
    
    $tbl = new Table();
    $tbl->setColumnsWidth(array("120px", "150px", "150px", "80px"));
    
    echo $tbl->showTable($headers, $data);
    echo '</div>';
    getPage('footer');
} else {
    header("Location: http://192.168.0.25:8081/fwf/panel/login");
}
?>