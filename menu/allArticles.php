<?php

include("articleJSON.php");
include("../config/config.php");

$sql = "SELECT product.id, product.name, product.description, category.name AS category, price, stock, is_discarded 
        FROM product INNER JOIN category ON product.category_id = category.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $articles = array();
    while ($row = $result -> fetch_assoc()) {
        array_push($articles,new ArticleJSON($row["id"],$row["name"],$row["description"],$row["category"],
                    $row["price"],$row["stock"],$row["is_discarded"],"image"));
    }
    echo json_encode($articles);
}
        /*"SELECT product.id, product.name, product.description, category.name, price, stock, is_discarded,
        path FROM product INNER JOIN category ON product.category_id = category.id INNER JOIN product_image 
        ON product.id = product_id"*/

?>