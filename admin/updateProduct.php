<?php

$servername = "localhost";
$productname = "root";
$dbpassword = "";
$dbname = "cafe";

$conn = new mysqli($servername,$productname,$dbpassword,$dbname);

if ($conn -> connect_error) {
    die("Connection failed: " . $conn -> connect_error);
}

$content = trim(file_get_contents("php://input"));
$product = json_decode($content,true);
$stmt = $conn->prepare("UPDATE product SET category_id = ?, name = ?,
                        description = ?, price = ?, stock = ? WHERE product_id = ?");
$stmt->bind_param("issdii",$product["categoryID"],$product["name"],$product["description"],
                    $product["price"],$product["stock"],$product["id"]);
echo $stmt->execute();

?>