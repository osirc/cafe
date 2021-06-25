<?php

class SummaryJSON {

    public $users;
    public $profits;
    public $products;
    public $pendingTransactions;

    function __construct() {
        
        $servername = "localhost";
        $username = "root";
        $dbpassword = "";
        $dbname = "cafe";

        $conn = new mysqli($servername,$username,$dbpassword,$dbname);

        if ($conn -> connect_error) {
            die("Connection failed: " . $conn -> connect_error);
        }

        $sql = "SELECT COUNT(id) AS users FROM user";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result -> fetch_assoc()) {
                $this->users = $row["users"];
                echo "Users: " . $this->users . "\n";
            }
        }
            
        $sql = "SELECT COUNT(id) AS products FROM product WHERE is_discarded = 0";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result -> fetch_assoc()) {
                $this->products = $row["products"];
                echo "Articles: " .$this->products . "\n";
            }
        }
        $sql = "SELECT COUNT(id) AS transactions FROM transaction WHERE transaction_status_id = 0";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result -> fetch_assoc()) {
                $this->pendingTransactions = $row["transactions"];
                echo "Pending transactions: " .$this->pendingTransactions . "\n";
            }
        }
        $sql = "SELECT COUNT(ticket.id) AS profits FROM ticket INNER JOIN orders ON orders_id = orders.id WHERE 
                DATEDIFF(CURDATE(),date) <= 30 AND orders_status_id = 1";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result -> fetch_assoc()) {
                $this->profits = $row["profits"];
                echo "Profits: " .$this->profits . "\n";
            }
        }      
    }

}
