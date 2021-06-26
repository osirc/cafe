<?php

$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "cafe";

$conn = new mysqli($servername,$username,$dbpassword,$dbname);

if ($conn -> connect_error) {
    die("Connection failed: " . $conn -> connect_error);
}

$stmt = $conn->prepare("SELECT funds FROM user WHERE id = ?");
$stmt->bind_param("i",$_SESSION["id"]);
if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($row = $result -> fetch_assoc()) {
        echo $row["funds"];
    }
}
        
?>