<div class="container-fluid">

    <?php
    include("./menu/allArticles.php");
    $productNum = count($articles);

    for ($i = 0 ; $i < $productNum ; $i++) {
        if ($i % 3 == 0) {
            ?>
            <div class="row mb-4">
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
        </div>
        <?php
        }
    } // for end
        ?>   
</div>
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