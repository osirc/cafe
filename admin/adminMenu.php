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
                <img class="card-img-top" src= <?php  echo "'". $articles[$i]->imagePath . "'";?> alt="Card image cap">
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
                                <select id=<?php echo "'select" . $articles[$i]->id . "'"; ?> class="custom-select">
                                    <?php
                                    $productStock = $articles[$i]->stock;
                                    for ($j = 1; $j <= $productStock ;$j++) {?>
                                    <option><?php echo $j; ?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-outline-success float-right" onclick=<?php echo "'editProduct(" . $articles[$i]->id . ")'";  ?>>Editar</button>
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
    function editProduct(productID) {
        $("#productUpdate").modal();
    }
</script>
<div class="modal fade" id="productUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Actualizar producto</h5>
                <button id="closeForgotPassword" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="idModalBody" class="modal-body">
            <form>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nombre</label>
                    <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Description</label>
                    <textarea class="form-control" id="message-text"></textarea>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Precio</label>
                    <textarea class="form-control" id="message-text"></textarea>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Stock</label>
                    <textarea class="form-control" id="message-text"></textarea>
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>