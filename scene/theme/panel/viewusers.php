<?php

if (isset($_SESSION['user']['id'])) {
    getPage('header');
    getPage('navbar');

        $willow = new StandAlone();

        $sql = 'SELECT id, username FROM wms_users';
        $datas = $willow->Willow_QueryAll($sql);

        $headers = array('ID', 'User Name');

        $tbl = new Table();
        $tbl->setTableClass('table table-striped table-bordered');
        $tbl->setColumnsWidth(array("120px", "150px"));

        echo $tbl->showTable($headers, $datas);

    getPage('footer');
} else {
    $willow = new StandAlone();
    $redirect_to_login = $willow->redirect_to_login();
}