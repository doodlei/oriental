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
    function output_message($message = "") {
        if (!empty($message)) {
            return "<p class=\"message\">{$message}</p>";
        } else {
            return "";
        }
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
    function Willow_QueryAll($query) {
        global $pdo;
        $sql = $query;
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Failed to run query: " . $ex->getMessage());
        }

        return $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * 
     * @global type $pdo Database global variable
     * @param type $query
     * @return type
     */
    function Willow_Query($query) {
        global $pdo;
        $query = $query;
        try {
            $stmt = $pdo->prepare($query);
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Failed to run query: " . $ex->getMessage());
        }
        return $row = $stmt->fetch();
    }

}

$standalone = new StandAlone();
$sa = & $standalone;
