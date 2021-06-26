<?php

// Enable us to use Headers
ob_start();

// Set sessions

if (!isset($_SESSION)) {
    session_start();
}

$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "cafe";

$conn = new mysqli($servername,$username,$dbpassword,$dbname);

if ($conn -> connect_error) {
    die("Connection failed: " . $conn -> connect_error);
}

?>
