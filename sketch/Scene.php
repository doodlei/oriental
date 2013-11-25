<?php

class Scene {

    function __construct() {
        
    }
    /**
     * 
     * @param type $name
     * @param type $noInclude
     */
    public function render($name, $noInclude = false) {
        require SCENE . DS . THEME . DS . $name . '.php';
    }

}