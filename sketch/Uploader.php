<?php

/**
 * A Uploader Class with CSV uploads, image and other file uploads
 * 
 * @author Samrat Khan <skydotint@gmail.com>
 * @name Uploader.php
 * @version 0.1
 * @license Public License
 * @package Uploader
 * 
 */
class Uploader {

    /**
     * 
     * @global type $pdo = global db connection string
     * @param type $tablename = eg. csvcontent
     * @param type $updir = eg. "uploads/"
     * @param type $columnarray = array(CsvConvartID, Name, Discription, Mark);
     * 
     */
    function csv_upload($tablename, &$columnarray) {
        global $pdo;

        if ($_FILES['csv']['error'] == 0) {

            $name = $_FILES['csv']['name'];
            $exploding = explode('.', $_FILES['csv']['name']);
            $ending = end($exploding);
            $ext = strtolower($ending);
            //$type = $_FILES['csv']['type'];
            //$tmpName = $_FILES['csv']['tmp_name'];

            move_uploaded_file($_FILES["csv"]["tmp_name"], UPLOADDIR . DS . $_FILES["csv"]["name"]);

            $filename = ABSPATH . APPPATH . DS . UPLOADDIR . DS . $name;

            $cols = implode(',', $columnarray);

            if ($ext === 'csv') {
                $sql = 'LOAD DATA LOCAL INFILE "' . $filename . '"
                        INTO TABLE ' . $tablename . '
                        FIELDS TERMINATED BY ","
                        LINES TERMINATED BY "\n" 
                        (' . $cols . ')';

                //var_dump($sql);
                try {
                    $stmt = $pdo->query($sql);
                    //$stmt->execute();
                    //var_dump($stmt);
                } catch (PDOException $ex) {
                    die("Failed to run query: " . $ex->getMessage());
                }
            }
        }
    }

}
