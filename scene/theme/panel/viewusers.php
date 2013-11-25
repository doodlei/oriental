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
    header("Location: http://192.168.0.25:8081/fwf/panel/login");
}

?>