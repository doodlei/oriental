<?php
/**
 * @author @author Samrat Khan & Sadik Sarfaraz - Apr 10, 2013
 */
/**
 * @var array Basic information about this software. 
 * It contains array thet holds version, title, description, author, copyright and reserved by information.
 */
function getPage($name =  NULL) {
    require_once DS . SCENE . DS . 'theme'. DS . $name . '.php';
}

function basicInfo($show = '') {
    return get_bloginfo($show, 'display');
}

function get_bloginfo($show = '', $filter = 'raw') {
    switch ($show) {
        case 'url':
            $output = ROOT . DS . APPPATH ;
            break;
        case 'title':
            $output = TITLE;
            break;
        case 'description':
            $output = DESCRIPTION;
            break;
        case 'version':
            $output = VERSION;
            break;
        case 'core_programming':
            $output = CORE_PROGRAMMING;
            break;
        case 'sub_programming':
            $output = SUB_PROGRAMMING;
            break;
        case 'copyright':
            $output = COPYRIGHT;
            break;
        case 'reservedby':
            $output = RESERVEDBY;
            break;
        case 'design_drawer':
            $output = ROOT . DS . APPPATH . DS . SCENE . DS . DRAWER;
            break;
    }
    return $output;
}
?>
