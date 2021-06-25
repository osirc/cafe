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

$sql = "SELECT ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $articles = array();
    while ($row = $result -> fetch_assoc()) {
        array_push($articles,new OrdersJSON($row["id"],$row["name"],$row["description"],$row["category"],
                    $row["price"],$row["stock"],$row["is_discarded"],"image"));
    }
    echo json_encode($articles);
}

?>