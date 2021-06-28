<div class="container-fluid">
    <div id="accordion">
    <?php
    //include("./config/config.php");
    include("./menu/categoryJson.php");
    include("./menu/articleJSON.php");


    $sqlCategories = "SELECT name, description FROM category ORDER BY id ASC";
    $resultCategories = $conn->query($sqlCategories);

    if ($resultCategories->num_rows > 0) {
        $categories = array();
        while ($row = $resultCategories -> fetch_assoc()) {
            array_push($categories,new categoryJSON($row["name"],$row["description"]));
        }

        $categoriesNum= count($categories);

        for ($x = 0 ; $x < $categoriesNum ; $x++) {
            $sqlArticles = "SELECT product.id, product.name, product.description, category.name AS category, price, stock, is_discarded,
                            path FROM product INNER JOIN category ON product.category_id = category.id INNER JOIN product_image 
                            ON product.id = product_id  WHERE category.name='".$categories[$x]->name."'" ;
            $resultArticles = $conn->query($sqlArticles);

            $productNum  =   $resultArticles->num_rows;

            $articles = array();
            if ($resultArticles->num_rows > 0) {
                while ($row = $resultArticles -> fetch_assoc()) {
                    array_push($articles,new ArticleJSON($row["id"],$row["name"],$row["description"],$row["category"],
                        $row["price"],$row["stock"],$row["is_discarded"],$row["path"]));
                }
            }

    ?>


        <div class="card"> <!--Accordion card-->
            <div class="card-header" id="heading<?php echo $x;?>">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseDiv<?php echo $x;?>" aria-expanded="true" aria-controls="collapseDiv<?php echo $x;?>">
                        <?php echo $categories[$x]->name;?>
                    </button>
                </h5>
            </div>
            <div id="collapseDiv<?php echo $x;?>" class="collapse show" aria-labelledby="heading<?php echo $x;?>" data-parent="#accordion">

<?php
                //for ($x = 0 ; $x < $productNum ; $x++) {
                $productNum = count($articles);

                for ($i = 0 ; $i < $productNum ; $i++) {
                    if ($i % 3 == 0) {
?>

                    <div class="card-deck">
<?php
                    }
?>
                    <div class="card">
                        <div class="text-center">
                            <img class="img-fluid img-thumbnail" style=" height: auto;" src= <?php  echo "'". $articles[$i]->imagePath . "'";?> alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $articles[$i]->name;  ?></h5>
                            <p class="card-text"><?php echo $articles[$i]->description; ?></p>
                        </div>
                        <div class="card-footer">
                            <div class="container">
                                <div class="row float-right">
                                    <div class="col">
                                        <b>$<?php echo $articles[$i]->price;?></b>
                                    </div>
                                    <div class="col">
                                        <select id=<?php echo "'select" . $articles[$i]->id . "'"; ?> class="custom-select-sm">
                                            <?php
                                            $productStock = $articles[$i]->stock;
                                            for ($j = 1; $j <= $productStock ;$j++) {?>
                                                <option><?php echo $j; ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-outline-success btn-sm float-right" onclick=<?php echo "'addToCart(" . $articles[$i]->id . ")'";  ?>>Agregar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

<?php
                    if($i % 3 == 2) {
?>
                        </div>

<?php
                    }
                }
?>



            </div>
        </div>
<?php
        //}
    }
}
?>
    </div><!--End accordion div-->
</div><!--End container-fluid-->



<script>
    function addToCart(productID) {
        var amount = document.getElementById("select" + (productID)).value;
        let request = {
            id: productID,
            amount: parseInt(amount,10),
        }

        fetch("./user/addToCart.php", {
            method: 'POST',
            headers: new Headers({"Content-Type": `application/json;charset=utf-8`,}),
            body: JSON.stringify(request)
        })
            .then(response => {
                if (response.ok) {
                    return response.text();
                } else{
                    document.getElementById("idModalBody").innerHTML = "<p>Ocurrió un error, por favor inténtelo de nuevo</p>";
                    $("#cartUpdate").modal();
                    return null;
                }
            })
            .then(data => {
                    var message;
                    if (data == 1) {
                        message = "El articulo fue enviado exitosamente al carrito de compras"
                    }
                    document.getElementById("idModalBody").innerHTML = "<p>" + message + "</p>";
                    $("#cartUpdate").modal();
                    //alert(data);
                }
            )
            .catch(err=>{
                    console.error(err);
                }
            );
    }
</script>
<div class="modal fade" id="cartUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Carrito de compras</h5>
                <button id="closeForgotPassword" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="idModalBody" class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
