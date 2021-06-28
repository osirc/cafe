<?php

include("../config/config.php");


$content = trim(file_get_contents("php://input"));
$user = json_decode($content,true);
$stmt = $conn->prepare("UPDATE transactions SET transactions_status_id = ? WHERE user_id = ? AND id = ?");
$stmt->bind_param("iii",$user["status"],$user["userID"],$user["id"]);
echo $stmt->execute();

if ($user["status"] == 1) {
    $funds = 0;
    $stmt = $conn->prepare("SELECT funds FROM user WHERE id = ?");
    $stmt->bind_param("i",$user["userID"]);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($row = $result -> fetch_assoc()) {
            $funds = $row["funds"] + $user["funds"];
            $stmt = $conn->prepare("UPDATE user SET funds = ? WHERE id = ?");
            $stmt->bind_param("di",$funds,$user["userID"]);
            echo $stmt->execute();
        }
    }
}

?>