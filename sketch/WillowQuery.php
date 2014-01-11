<?php

/**
 * 
 * @author Samrat Khan <skydotint@gmail.com>
 * @name WillowQuery.php
 * @version 0.1
 * @license Public License
 * @package Willow Query
 * 
 */
/**
 * Willow Query Related Functions with Upper Camel Case Name Space
 */

/**
 * 
 * @global type $pdo Database global variable
 * @param type $query
 * @return type
 */
class WillowQuery {

    public function Willow_QueryAll($query) {
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
    public function Willow_Query($query) {
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

    /**
     * 
     * @global type $pdo Database global variable
     * @param type $query
     * @return type
     */
    public function Willow_Fetch_Rows($query) {
        global $pdo;
        $query = $query;
        try {
            $stmt = $pdo->prepare($query);
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Failed to run query: " . $ex->getMessage());
        }
        return $row = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    }

}
