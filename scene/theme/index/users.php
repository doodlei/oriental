<?php

getPage('header');
getPage('navbar');

    $headers = array("User ID", "Full Name", "User Pass", "User Name", "User Email");

    $data = array();
    foreach ($this->rows as $row) {
        $data[] = array($row[0], $row[3], $row[2], $row[1], $row[4]);
    }

    $tbl = new Table(TRUE, "", "table table-striped table-bordered");
    $tbl->setColumnsWidth(array("120px", "200px", "350px", "340px", "300px"));

    $tbl->showTable($headers, $data);

echo getPage('header');
?>