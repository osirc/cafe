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
$stmt = $conn->prepare("UPDATE transactions SET transactions_status_id = ? WHERE user_id = ? AND id = ?");
$stmt->bind_param("iii",$user["status"],$user["id"],$user["transactionID"]);
echo $stmt->execute();

?>