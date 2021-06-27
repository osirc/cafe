<?php

include("../config/config.php");


$content = trim(file_get_contents("php://input"));
$order = json_decode($content,true);
var_dump($order);
$stmt = $conn->prepare("UPDATE orders SET orders_status_id = ? WHERE id = ?");
$stmt->bind_param("ii",$order["status"],$order["id"]);
echo $stmt->execute();


?>