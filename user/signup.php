<?php

include("../config/config.php");

$content = trim(file_get_contents("php://input"));
$user = json_decode($content,true);
$stmt = $conn->prepare("INSERT INTO user (user_type_id, first_name, last_name, email, password, cellphone) 
                VALUES (0,?,?,?,?,?)");
$stmt-> bind_param("sssss",$user["firstName"],$user["lastName"],$user["email"],
                    $user["password"],$user["cellphone"]);
echo $stmt->execute();

mysqli_close($conn);

?>