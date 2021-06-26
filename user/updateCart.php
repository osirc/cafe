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
$product = json_decode($content,true);
$stmt = $conn->prepare("UPDATE cart SET amount = ? WHERE user_id = ? AND article_id = ?");
$stmt->bind_param("iii",$product["amount"],$_SESSION["id"],$product["id"]);
$stmt->execute();

?>