<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);

$timezone = "Asia/Dhaka";
date_default_timezone_set($timezone);

/* * * Database Information ** */
defined('VERSION') ? null : define('VERSION', '6.0.1');
defined('TITLE') ? null : define('TITLE', 'General WMS');
defined('DESCRIPTION') ? null : define('DESCRIPTION', 'Warehouse Management System');
defined('CORE_PROGRAMMING') ? null : define('CORE_PROGRAMMING', 'Samrat Khan');
defined('SUB_PROGRAMMING') ? null : define('SUB_PROGRAMMING', 'Sadik Sarfaraz Zorj');
defined('COPYRIGHT') ? null : define('COPYRIGHT', 'StepOne Group WMS');
defined('RESERVEDBY') ? null : define('RESERVEDBY', 'Step One Group Ltd.');

define('ROOT', 'http://192.168.0.25:8081');
/** Absolute path to the foo_root directory. */
defined('APPPATH') ? null : define('APPPATH', 'fwf');
defined('DB_SERVER') ? null : define('DB_SERVER', 'localhost');
defined('DB_USER') ? null : define('DB_USER', 'root');
defined('DB_PASS') ? null : define('DB_PASS', '');
defined('DB_NAME') ? null : define('DB_NAME', 'gwms');



try {
    $pdo = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . '', DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $bConnected = true;
} catch (PDOException $e) {
    echo $this->ExceptionLog($e->getMessage());
    die();
}

/** Very Very Important Files * */
require 'Registry.php';
require 'Templating.php';

function autoload_class_multiple_directory($class_name) {

    $array_paths = array(SKETCH, GOVERNOR);

    foreach ($array_paths as $path) {
        $fname = ucfirst($class_name);
        $file = $path . DS . $fname . '.php';
        if (is_file($file)) {
            require $file;
        }
    }
}

spl_autoload_register('autoload_class_multiple_directory');
?>
