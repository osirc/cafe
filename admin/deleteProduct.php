<?php

include("../config/config.php");

$content = trim(file_get_contents("php://input"));
$product = json_decode($content,true);
$stmt = $conn->prepare("UPDATE product SET is_discarded = 1 WHERE id = ?");
$stmt->bind_param("i",$product["id"]);
echo $stmt->execute();

?>