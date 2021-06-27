<?php

include("categoryJSON.php");
include("../config/config.php");

$sql = "SELECT name, description FROM category";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $categories = array();
    while ($row = $result -> fetch_assoc()) {
        array_push($categories,new categoryJSON($row["name"],$row["description"]));
    }
}

?>