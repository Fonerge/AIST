<?php
require 'rb.php';
R::setup('mysql:host=localhost;dbname=aist_db', 'root', '');
if(!R::testConnection()) die('No DB connection!');
session_start();
ob_start();
?>