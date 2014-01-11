<?php

/**
 * 
 * @author Samrat Khan <skydotint@gmail.com>
 * @name Standalone.php
 * @version 0.1
 * @license Public License
 * @package StandAlone
 * 
 */
class StandAlone {

    /**
     * 
     * @param type $marked_string
     * @return type
     */
    function strip_zeros_from_date($marked_string = "") {
        // first remove the marked zeros
        $no_zeros = str_replace('*0', '', $marked_string);
        // then remove any remaining marks
        $cleaned_string = str_replace('*', '', $no_zeros);
        return $cleaned_string;
    }

    /**
     * 
     * @param type $location
     */
    function redirect_to($location = NULL) {
        if ($location != NULL) {
            header("Location: {$location}");
            exit;
        }
    }

    /**
     * 
     */
    public function redirect_to_login() {
        header("Location: " . ROOT . DS . APPPATH . DS . 'panel' . DS . 'login');
    }

    /**
     * 
     * @param type $message
     * @return string
     */
    function msg($message = "") {
        if (!empty($message)) {
            return "<div class='alert alert-success'>$message</div>";
        } else {
            return "";
        }
    }

    /**
     * 
     * @param type $message
     * @return string
     */
    function error_msg($message = "") {
        if (!empty($message)) {
            return "<div class='alert alert-danger'>$message</div>";
        } else {
            return "";
        }
    }

    function rmfile($filepath, $filename) {
        unlink($filepath . $filename);
    }

    /**
     * 
     * @param string $break
     * @return string
     */
    function smart_newline($break = "<br/>") {
        $break = "<br />";
        return $break;
    }

    /**
     * Willow Query Related Functions with Upper Camel Case Name Space
     */
    /**
     * 
     * @global type $pdo Database global variable
     * @param type $query
     * @return type
     */
}

$standalone = new StandAlone();
$sa = & $standalone;
