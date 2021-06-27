<?php

include("../config/config.php");

$content = trim(file_get_contents("php://input"));
$product = json_decode($content,true);
$stmt = $conn->prepare("SELECT amount FROM cart WHERE user_id = ? AND product_id = ?");
$stmt->bind_param("ii",$_SESSION["id"],$product["id"]);
if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        $stmt = $conn->prepare("INSERT INTO cart VALUES (?,?,?)");
        $stmt->bind_param("iii",$_SESSION["id"],$product["id"],$product["amount"]);
        echo $stmt->execute();
    } else {
        if($row = $result -> fetch_assoc()) {
            $product["amount"] += $row["amount"]; 
            $stmt = $conn->prepare("UPDATE cart SET amount = ? WHERE user_id = ? AND product_id = ?");
            $stmt->bind_param("iii",$product["amount"],$_SESSION["id"],$product["id"]);
            echo $stmt->execute();
        }
    }
}

?>