<?php

$servername = "localhost";
        $username = "root";
        $dbpassword = "";
        $dbname = "cafe";

        $conn = new mysqli($servername,$username,$dbpassword,$dbname);

        if ($conn -> connect_error) {
            die("Connection failed: " . $conn -> connect_error);
        }

        $sql = "SELECT funds FROM user WHERE user_id =". $_SESSION["id"];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result -> fetch_assoc()) {
                echo $row["funds"];
            }    
        }
        
?>