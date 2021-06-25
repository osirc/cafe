<?php

include("transactionsJSON.php");

$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "cafe";

$conn = new mysqli($servername,$username,$dbpassword,$dbname);

if ($conn -> connect_error) {
    die("Connection failed: " . $conn -> connect_error);
}

$sql = "SELECT transactions.id AS transactions_id, user.id AS user_id, transactions_status_id AS status_id, 
        first_name, last_name, email, transactions.funds, send_date FROM transactions 
        INNER JOIN user ON transactions.user_id = user.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $transactions = array();
    while ($row = $result -> fetch_assoc()) {
        array_push($transactions,new TransactionsJSON($row["transactions_id"],$row["user_id"],$row["status_id"],$row["first_name"],
                    $row["last_name"],$row["email"],$row["funds"],$row["send_date"],"image"));
    }
    echo "json: " . json_encode($transactions);
} else {
    echo "No hay nada xd";
}
        /*"SELECT transactions.id AS transactions_id, user.id AS user_id, transactions_status_id AS status_id, 
        first_name, last_name, email, transactions.funds, send_date, transactions_image.path FROM transactions 
        INNER JOIN user ON transactions.user_id = user.id INNER JOIN transactions_image ON transactions_image.transactions_id = transactions.id" */

?>