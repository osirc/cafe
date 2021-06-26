<?php

include("ordersJSON.php");

$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "cafe";

$conn = new mysqli($servername,$username,$dbpassword,$dbname);

if ($conn -> connect_error) {
    die("Connection failed: " . $conn -> connect_error);
}

$sql = "SELECT orders_id, orders_status_id, first_name, last_name, name, amount, date FROM ticket 
        INNER JOIN user ON ticket.user_id = user.id INNER JOIN orders ON ticket.orders_id = orders.id 
        INNER JOIN product ON ticket.product_id = product.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $articles = array();
    while ($row = $result -> fetch_assoc()) {
        array_push($articles,new OrdersJSON($row["orders_id"],$row["orders_status_id"],$row["first_name"]
        ,$row["last_name"],$row["name"],$row["amount"],$row["date"]));
    }
    echo json_encode($articles);
} else {
    echo "No hay nada aún";
}

?>