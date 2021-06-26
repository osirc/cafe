<?php

include("../config/config.php");

$content = trim(file_get_contents("php://input"));
$product = json_decode($content,true);
$stmt = $conn->prepare("INSERT INTO cart VALUES (?,?,?)");
$stmt->bind_param("iii",$_SESSION["id"],$product["id"],$product["amount"]);
echo $stmt->execute();

?>