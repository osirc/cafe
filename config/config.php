<?php

// Enable us to use Headers
ob_start();

// Set sessions

if (!isset($_SESSION)) {
    session_start();
}

$hostname = "localhost:3306";
$username = "admin";
$password = "mundial.1";
$dbname = "cafe";

$connection = mysqli_connect($hostname, $username, $password, $dbname) or die("Database connection not established.")


?>
