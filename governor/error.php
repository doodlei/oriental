<?php
/**
 * 
 * @author Samrat Khan <skydotint@gmail.com>
 * @name error.php
 * @version 0.1
 * @license Public None
 * 
 */
class Error extends \Governor {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->scene->msg = 'Attempt Failed';
        $this->scene->render('error/index');
    }

}