<?php

class Upload extends \Governor {

    function __construct() {
        parent::__construct();
    }

    public function csv() {
        $this->scene->render('upload/csv');
    }

}
