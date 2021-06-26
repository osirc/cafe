<?php

$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "cafe";

$conn = new mysqli($servername,$username,$dbpassword,$dbname);

if ($conn -> connect_error) {
    die("Connection failed: " . $conn -> connect_error);
}

$content = trim(file_get_contents("php://input"));
$user = json_decode($content,true);
$stmt = $conn->prepare("INSERT INTO transactions (user_id,funds) VALUES (?,?)");
$stmt->bind_param("id",$user["id"],$user["funds"]);
$stmt->execute();

?>