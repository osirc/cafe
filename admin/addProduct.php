<?php

include("../config/config.php");

$content = trim(file_get_contents("php://input"));
$product = json_decode($content,true);
$stmt = $conn->prepare("INSERT INTO product (category_id, name, description, price, stock) VALUES 
                        (?,?,?,?,?)");
$stmt->bind_param("issdi",$product["categoryID"],$product["name"],$product["description"],
                    $product["price"],$product["stock"]);
echo $stmt->execute();

?>