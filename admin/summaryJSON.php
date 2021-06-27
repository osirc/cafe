<?php

//include("../config/config.php");

class SummaryJSON {

    public $users;
    public $profits;
    public $products;
    public $pendingTransactions;

    function __construct() {
        global $conn;
        $sql = "SELECT COUNT(id) AS users FROM user";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result -> fetch_assoc()) {
                $this->users = $row["users"];
            }
        }
            
        $sql = "SELECT COUNT(id) AS products FROM product WHERE is_discarded = 0";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result -> fetch_assoc()) {
                $this->products = $row["products"];
            }
        }
        $sql = "SELECT COUNT(id) AS transactions FROM transactions WHERE transactions_status_id = 0";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result -> fetch_assoc()) {
                $this->pendingTransactions = $row["transactions"];
            }
        }
        $sql = "SELECT SUM(price * amount) AS profits FROM ticket INNER JOIN orders ON orders_id = orders.id WHERE 
                DATEDIFF(CURDATE(),date) <= 30 AND orders_status_id = 2";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result -> fetch_assoc()) {
                $this->profits = $row["profits"];
            }
        }      
    }

}
