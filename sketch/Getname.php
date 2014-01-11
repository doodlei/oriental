<?php

/**
 * Getname is a class which showing option value from any table
 * table for several access level authentication
 * 
 * @author Samrat Khan <skydotint@gmail.com>
 * @name Getname.php
 * @version 0.1
 * @license None
 * @package Getname
 * 
 */
class Getname {

    public function getname_for_option($tblname, $id, $name) {
        global $pdo;

        $query = "SELECT $id, $name FROM $tblname";

        try {
            $stmt = $pdo->prepare($query);
            $stmt->execute();
        } catch (PDOException $ex) {
            die("Failed to run query: " . $ex->getMessage());
        }
        $rows = $stmt->fetchAll();

        foreach ($rows as $row) {
            $HTML.="<option value='{$row[$id]}'>";
            $HTML.=$row[$name];
            $HTML.="</option>";
            $HTML++;
        }
        return $HTML;
    }

}
