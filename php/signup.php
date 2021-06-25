<?php

$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "cafe";

$conn = new mysqli($servername,$username,$dbpassword,$dbname);

if ($conn -> connect_error) {
    die("Connection failed: " . $conn -> connect_error);
}

$user = json_decode($_POST["response"]);

$sql = "INSERT INTO user VALUES (user_type_id, first_name, last_name, email, password, cellphone)
        VALUES (0," . $user["firstName"] . "," . $user["lastName"] . "," . $user["email"] . "," .
        $user["password"] . "," . $user["cellphone"] . ")";

if ($conn->query($sql) === true) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);

?>