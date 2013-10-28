<?php

error_reporting(E_ALL & ~E_NOTICE);

$timezone = "Asia/Dhaka";
date_default_timezone_set($timezone);

/*** Database Information ***/
defined('VERSION') ? null : define('VERSION', '6.0.1');
defined('TITLE') ? null : define('TITLE', 'General WMS');
defined('DESCRIPTION') ? null : define('DESCRIPTION', 'Warehouse Management System');
defined('CORE_PROGRAMMING') ? null : define('CORE_PROGRAMMING', 'Samrat Khan');
defined('SUB_PROGRAMMING') ? null : define('SUB_PROGRAMMING', 'Sadik Sarfaraz Zorj');
defined('COPYRIGHT') ? null : define('COPYRIGHT', 'StepOne Group WMS');
defined('RESERVEDBY') ? null : define('RESERVEDBY', 'Step One Group Ltd.');

define('ROOT', 'http://192.168.0.25:8081/');
defined('DB_SERVER') ? null : define('DB_SERVER', 'localhost');
defined('DB_USER')   ? null : define('DB_USER', 'root');
defined('DB_PASS')   ? null : define('DB_PASS', '');
defined('DB_NAME')   ? null : define('DB_NAME', 'gwms');

$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
try {
    $pdo = new PDO('mysql:host=localhost;dbname=gwms', 'root', '');
} catch (PDOException $ex) {
    die("Failed to connect to the database: " . $ex->getMessage());
}

/** Very Very Important Files **/
require 'Registry.php';
require 'Templating.php';
require 'Bootstrap.php';
require 'Governor.php';
require 'Scene.php';
?>
