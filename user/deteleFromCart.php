<?php

include("../config/config.php");

$content = trim(file_get_contents("php://input"));
$product = json_decode($content,true);
$stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ? AND product_id = ?");
$stmt->bind_param("ii",$_SESSION["id"],$product["id"]);
echo $stmt->execute();

?>