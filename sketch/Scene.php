<?php

class Scene {

    function __construct() {
        
    }

    public function render($name, $noInclude = false) {
        require SCENE . DS . THEME . DS . $name . '.php';
    }

}

?>
