<?php

include("cartJSON.php");

    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "cafe";

    $conn = new mysqli($servername,$username,$dbpassword,$dbname);

    if ($conn -> connect_error) {
        die("Connection failed: " . $conn -> connect_error);
    }

    $stmt = $conn->prepare("SELECT product.id, name, price, amount, path FROM cart INNER JOIN product ON 
                            cart.product_id = product.id INNER JOIN user ON cart.user_id = user.id INNER JOIN 
                            product_image ON product.id = product_image.product_id WHERE user_id = ?");
    $stmt->bind_param("i",$_SESSION["id"]);
    if ($stmt->excute()) {
        $cart = array();
        $result = $stmt->get_result();
        while ($row = $result -> fetch_assoc()) {
            array_push($cart,new CartJSON($row["id"],$row["name"],$row["price"],$row["amount"],
            $row["path"]));
        }
        echo json_encode($cart);
    }
?>