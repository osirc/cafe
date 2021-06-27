<?php

include("cartProduct.php");
include("../config/config.php");

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
$stmt->bind_param("i",$_SESSION["id"]);
$totalPrice = 0;
if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($row = $result -> fetch_assoc()) {
        $totalPrice = $row["total"];
    }
}
if ($funds >= $totalPrice) {

    $products = array();
        $stmt = $conn->prepare("SELECT product_id, name, price, amount, stock FROM cart INNER JOIN product ON 
                                cart.product_id = product.id WHERE user_id = ?");
        $stmt->bind_param("i",$_SESSION["id"]);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            while ($row = $result -> fetch_assoc()) {
                array_push($products,new CartProduct($row["product_id"],$row["name"],$row["price"],$row["amount"],$row["stock"]));
            }
        }
        $stockWarning = "Lo sentimos, no es posible realizar la compra debido a que no hay " . 
                        "suficiente stock de el o los productos que desea comprar.<br>";
        $stockInsufficient = false;
        foreach($products as $product) {
            if ($product->stock < $product->amount) {
                $stockWarning = $stockWarning . "<br>Nombre del producto: " . $product->name .
                "<br>Cantidad a comprar: " . $product->amount . "<br>Cantidad disponible: " . $product->stock . "<br>"; 
            $stockInsufficient = true;
            }
        }
    if (!$stockInsufficient) {
        try {
            $conn->begin_transaction();
            $change = $funds - $totalPrice;
            $stmt = $conn->prepare("UPDATE user SET funds = ? WHERE id = ?");
            $stmt->bind_param("di",$change,$_SESSION["id"]);
            $stmt->execute();
        
            $stmt = $conn->prepare("INSERT INTO orders (orders_status_id) VALUES (1)");
            $stmt->execute();
            $orderID = mysqli_insert_id($conn);
        
            $products = array();
            $stmt = $conn->prepare("SELECT product_id, name, price, amount, stock FROM cart INNER JOIN product ON 
                                    cart.product_id = product.id WHERE user_id = ?");
            $stmt->bind_param("i",$_SESSION["id"]);
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                while ($row = $result -> fetch_assoc()) {
                    array_push($products,new CartProduct($row["product_id"],$row["name"],$row["price"],$row["amount"],$row["stock"]));
                }
            }
            
            foreach($products as $product) {
                $stmt = $conn->prepare("INSERT INTO ticket (user_id, product_id, orders_id, amount, price) 
                                        VALUES (?,?,?,?,?)");
                $stmt->bind_param("iiiid",$_SESSION["id"],$product->id,$orderID,$product->amount,$product->price);
                $stmt->execute();
                $stmt = $conn->prepare("UPDATE product SET stock = ? WHERE id = ?");
                $leftStock = $product->stock - $product->amount;
                $stmt->bind_param("ii",$leftStock,$product->id);
                $stmt->execute();
            }
            
            $stmt = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
            $stmt->bind_param("i",$_SESSION["id"]);
            $stmt->execute();
        
            $conn->commit();
            echo "1";
        } catch (\Throwable $e) {
            $conn->rollback();
            throw $e;
        }
    } else {
        echo $stockWarning;
    }
} else {
    echo "No tienes suficientes fondos para completar la compra";
}


?>