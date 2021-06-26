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
$stmt = $conn->prepare("INSERT INTO product (category_id, name, description, price, stock) VALUES 
                        (?,?,?,?,?)");
$stmt->bind_param("issdi",$product["categoryID"],$product["name"],$product["description"],
                    $product["price"],$product["stock"]);
$stmt->execute();

?>