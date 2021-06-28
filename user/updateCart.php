<?php

include("../config/config.php");

$content = trim(file_get_contents("php://input"));
$product = json_decode($content,true);
$stmt = $conn->prepare("UPDATE cart SET amount = ? WHERE user_id = ? AND product_id = ?");
$stmt->bind_param("iii",$product["amount"],$_SESSION["id"],$product["id"]);
echo $stmt->execute();

?>