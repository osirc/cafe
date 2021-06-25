<?php

include("categoryJSON.php");

$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "cafe";

$conn = new mysqli($servername,$username,$dbpassword,$dbname);

if ($conn -> connect_error) {
    die("Connection failed: " . $conn -> connect_error);
}

$sql = "SELECT name, description FROM category";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $categories = array();
    while ($row = $result -> fetch_assoc()) {
        array_push($categories,new categoryJSON($row["name"],$row["description"]));
    }
    echo json_encode($categories);
}

?>