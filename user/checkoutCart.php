<?php

include("../config/config.php");
include("cartProduct.php");

$stmt = $conn->prepare("SELECT funds FROM user WHERE id = ?");
$stmt->bind_param("i",$_SESSION["id"]);
$funds = "";
if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($row = $result -> fetch_assoc()) {
        $funds = $row["funds"];
    }
}

$stmt = $conn->prepare("SELECT SUM(price * amount) AS total FROM cart INNER JOIN product ON 
                        cart.product_id = product.id WHERE user_id = ?");
$stmt->bind_param("i",$_SESSION["id");
$totalPrice = "";
if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($row = $result -> fetch_assoc()) {
        $totalPrice = $row["total"];
    }
}
if ($funds >= $totalPrice) {
    try {

        $conn->begin_transaction();

        $stmt = $conn->prepare("UPDATE user SET funds = ? WHERE id = ?");
        $stmt->bind_param("di",$funds-$totalPrice,$_SESSION["id"]);
        $stmt->execute();
    
        $stmt = $conn->prepare("INSERT INTO orders (orders_status) VALUES (0) WHERE user_id = ?");
        $stmt->bind_param("i",$_SESSION["id"]);
        $stmt->execute();
        $orderID = mysql_insert_id();
        
        /*$stmt = $conn->prepare("SELECT COUNT(id) AS count FROM orders");
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result -> fetch_assoc()) {
            if ($row["count"] > 0) {
                $stmt = $conn->prepare("SELECT MAX(id) AS max FROM orders");
                $stmt->execute();
                $result = $stmt->get_result();
                if ($row = $result -> fetch_assoc()) {
                    $orderID = $row["max"];
                }
            } else {
                $orderID = 1;
            }
        }*/
    
        $products = array();
        $stmt = $conn->prepare("SELECT product_id, price, amount, stock FROM cart INNER JOIN product ON 
                                cart.product_id = product.id WHERE user_id = ?");
        $stmt->bind_param("i",$_SESSION["id");
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            while ($row = $result -> fetch_assoc()) {
                array_push($products,new CartProduct($row["product_id"],$row["price"],$row["amount"],$row["stock"]));
            }
        }
        
        foreach($products as $product) {
            $stmt = $conn->prepare("INSERT INTO ticket (user_id, product_id, orders_id, amount, price) 
                                    VALUES (?,?,?,?,?)");
            $stmt->bind_param("iiiid",$_SESSION["id"],$product->id,$orderID,$product->amount,$product->price);
            $stmt->execute();
            $stmt = $conn->prepare("UPDATE product SET stock = ? WHERE id = ?");
            $stmt->bind_param("ii",$product->stock - $product->amount,$product->id);
        }
        
        $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
        $stmt->bind_param("i",$_SESSION["id");
        $stmt->execute();
    
        $conn->commit();
        echo "Transacción realizada exitosamente";
    } catch (\Throwable $e) {
        $conn->rollback();
        throw $e;
    }
} else {
    echo "No tienes suficientes fondos para completar la compra";
}


?>