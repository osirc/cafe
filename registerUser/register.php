<?php

include("../config/config.php");

$name =         $_POST['name'];
$lastname =     $_POST['lastname'];
$email =        $_POST['email'];
$password =     $_POST['password'];
$cellphone =    $_POST['cellphone'];


echo $name;
echo $lastname;
echo $email;
echo $password;
echo $cellphone;

$stmt = $conn->prepare("SELECT COUNT(*) FROM user WHERE UPPER(EMAIL) = UPPER(TRIM(?))");
$stmt->bind_param("s",$email);

if ($stmt->execute()) {
    $stmt->bind_result($num_rows);

    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "cafe";
    
    $conn = new mysqli($servername,$username,$dbpassword,$dbname);
    
    if ($conn -> connect_error) {
        die("Connection failed: " . $conn -> connect_error);
    }
    if ($num_rows == 0) {
        $stmt = $conn->prepare("INSERT INTO user (user_type_id, first_name, last_name, email, password, cellphone) VALUES (0,?,?,?,?,?)");
        $stmt->bind_param("sssss",$name, $lastname, $email, $password, $cellphone);
        echo $stmt->execute();
    } else {

    }
}
?>