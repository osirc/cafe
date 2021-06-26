<?php

include("../config/config.php");

$content = trim(file_get_contents("php://input"));
$product = json_decode($content,true);
$stmt = $conn->prepare("UPDATE product SET category_id = ?, name = ?,
                        description = ?, price = ?, stock = ? WHERE product_id = ?");
$stmt->bind_param("issdii",$product["categoryID"],$product["name"],$product["description"],
                    $product["price"],$product["stock"],$product["id"]);
echo $stmt->execute();

?>