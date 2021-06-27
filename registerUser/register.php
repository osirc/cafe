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

    if ($num_rows == 0) {
        $userType=0;
        $stmt = $conn->prepare("INSERT INTO user (user_type_id, first_name, last_name, email, password, cellphone) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("isssss", $userType,$name, $lastname, $email, $password, $cellphone);
        echo $stmt->execute();
    } else {

    }
}
?>