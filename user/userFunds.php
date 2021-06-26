<?php

include("../config/config.php");

$stmt = $conn->prepare("SELECT funds FROM user WHERE id = ?");
$stmt->bind_param("i",$_SESSION["id"]);
if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($row = $result -> fetch_assoc()) {
        echo $row["funds"];
    }
}
        
?>