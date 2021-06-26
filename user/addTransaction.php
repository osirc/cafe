<?php

include("../config/config.php");

$content = trim(file_get_contents("php://input"));
$user = json_decode($content,true);
$stmt = $conn->prepare("INSERT INTO transactions (user_id,funds) VALUES (?,?)");
$stmt->bind_param("id",$user["id"],$user["funds"]);
$stmt->execute();

?>