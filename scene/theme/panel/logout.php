<?php
getPage('header');
getPage('navbar');
session_start();
session_unset();
unset($_SESSION); 
header("Location: login");
getPage('footer');
?>