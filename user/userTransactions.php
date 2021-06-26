<?php

include("userTransactionsJSON.php");
include("../config/config.php");

$content = trim(file_get_contents("php://input"));
$user = json_decode($content,true);
$stmt = $conn->prepare("SELECT id, transactions_status_id AS status, funds, send_date, path FROM transactions 
                        INNER JOIN transactions_image ON transactions_id = transactions.id 
                        WHERE user_id = ?");
$stmt->bind_param("i",$_SESSION["id"]);
if ($stmt->execute()) {
    $result = $stmt->get_result();
    $transactions = array();
    while ($row = $result->fetch_assoc()) {
        array_push(new userTransactionsJSON($row["id"],$row["status"],
                    $row["funds"],$row["send_date"],$row["path"]));
    }
    echo json_encode($transactions);
}

        /*"SELECT transactions.id AS transactions_id, user.id AS user_id, transactions_status_id AS status_id, 
        first_name, last_name, email, transactions.funds, send_date, transactions_image.path FROM transactions 
        INNER JOIN user ON transactions.user_id = user.id INNER JOIN transactions_image ON transactions_image.transactions_id = transactions.id" */

?>