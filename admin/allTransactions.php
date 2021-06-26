<?php

include("transactionsJSON.php");
include("../config/config.php");

$sql = "SELECT transactions.id AS transactions_id, user.id AS user_id, transactions_status_id AS status_id, 
        first_name, last_name, email, transactions.funds, send_date, transactions_image.path FROM transactions 
        INNER JOIN user ON transactions.user_id = user.id INNER JOIN transactions_image ON transactions_image.transactions_id = transactions.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $transactions = array();
    while ($row = $result -> fetch_assoc()) {
        array_push($transactions,new TransactionsJSON($row["transactions_id"],$row["user_id"],$row["status_id"],$row["first_name"],
                    $row["last_name"],$row["email"],$row["funds"],$row["send_date"],$row["path"]));
    }
    echo "json: " . json_encode($transactions);
} else {
    echo "No hay nada xd";
}

/* "SELECT transactions.id AS transactions_id, user.id AS user_id, transactions_status_id AS status_id, 
        first_name, last_name, email, transactions.funds, send_date FROM transactions 
        INNER JOIN user ON transactions.user_id = user.id"*/
        /*" */

?>