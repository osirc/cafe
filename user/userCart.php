<?php

include("cartJSON.php");
//include("../config/config.php");

$stmt = $conn->prepare("SELECT product.id, name, price, amount, path FROM cart INNER JOIN product ON 
cart.product_id = product.id INNER JOIN user ON cart.user_id = user.id INNER JOIN 
product_image ON product.id = product_image.product_id WHERE user_id = ?");
$stmt->bind_param("i",$_SESSION["id"]);
if ($stmt->execute()) {
    $cart = array();
    $result = $stmt->get_result();
    while ($row = $result -> fetch_assoc()) {
        array_push($cart,new CartJSON($row["id"],$row["name"],$row["price"],$row["amount"],
                    $row["path"]));
    }
    $userCart =  json_encode($cart,JSON_UNESCAPED_UNICODE);
}

/*"SELECT product.id, name, price, amount FROM cart INNER JOIN product ON 
cart.product_id = product.id INNER JOIN user ON cart.user_id = user.id WHERE user_id = ?" */
?>