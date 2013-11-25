<?php

/**
 * 
 * @author Samrat Khan <skydotint@gmail.com>
 * @name about.php
 * @version 0.1
 * @license Public None
 * 
 */
class About extends \Governor {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->scene->msg = 'About us';
        $this->scene->render('about/index');
    }

}