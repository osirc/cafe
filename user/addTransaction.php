<?php

include("../config/config.php");

$imageName = $_FILES["image"]["name"];
$imageType = $_FILES["image"]["type"];
$imageSize = $_FILES["image"]["size"];

if(is_numeric($_POST["amount"])) {
    if ($_POST["amount"] > 0) {
        if ($imageSize <= 1000000) {
            if ($imageType == "image/jpeg" || $imageType == "image/png" || $imageType == "image/jpg") {
                $stmt = $conn->prepare("INSERT INTO transactions (user_id,funds) VALUES (?,?)");
                $stmt->bind_param("id",$_SESSION["id"], $_POST["amount"]);
                $stmt->execute();
                $transactionID = mysqli_insert_id($conn);
                $newDirectory = "../images/transactions/";
                move_uploaded_file($_FILES["image"]["tmp_name"],$newDirectory.$imageName);
                $stmt = $conn->prepare("INSERT INTO transactions_image (transactions_id,path) VALUES (?,?)");
                $stmt->bind_param("is",$transactionID,$imageName);
                echo $stmt->execute();
            } else {
                echo "Sólo se pueden subir imágenes con formato jpg o png";
            }
        } else {
            echo "El tamaño es grande";
        }
    } else {
        echo "Error: Sólo puedes ingresar números positivos mayores a 0";
    }
} else {
    echo "Error: sólo puedes ingresar números en este campo";
}





?>