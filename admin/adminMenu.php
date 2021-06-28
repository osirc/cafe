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
            <div class="card" id= <?php echo "'". $articles[$i]->id . "'" ?>>
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
                                <?php
                                if($articles[$i]->stock == 0) {
                                ?>
                                <p style="color:red">Agotado</p>
                                <?php
                                } else {
                                ?>
                                <select id=<?php echo "'select" . $articles[$i]->id . "'"; ?> class="custom-select-sm">
                                    <?php
                                    $productStock = $articles[$i]->stock;
                                    for ($j = 1; $j <= $productStock ;$j++) {?>
                                    <option><?php echo $j; ?></option>
                                    <?php }?>
                                </select>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-outline-success float-right" 
                                onclick=<?php echo '"editProduct('. $articles[$i]->id . "," . "`" . $articles[$i]->name . "`" . "," . "`" . $articles[$i]->description . "`" . "," . "`" . $articles[$i]->category . "`" . "," . $articles[$i]->price . "," . $articles[$i]->stock . ')"';?>>Editar</button>
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
    var productID = 0;
    function editProduct(id,name,description,defaultCategory,price,stock) {
        productID = id;
        document.getElementById("product-name").value = name;
        categories = document.getElementById("product-category");
        for(var i, j = 0; i = categories.options[j]; j++) {
            if(i.value == defaultCategory) {
                categories.selectedIndex = j;
                break;
            }
        }
        document.getElementById("product-description").value = description;
        document.getElementById("product-price").value = price;
        document.getElementById("product-stock").value = stock;
        $("#productUpdate").modal();
    }
    function updateProduct(form) {
        let request = {
        id: productID,
        name: form.name.value,
        description: form.description.value,
        category: form.category.value,
        price: form.price.value,
        stock: form.stock.value
        };
        fetch("./admin/updateProduct.php", {
            method: 'POST',
            headers: new Headers({"Content-Type": `application/json;charset=utf-8`,}),
            body: JSON.stringify(request)
        })
        .then(response => {
        if (response.ok) {
            return response.text();
        } else{
            alert(`Ocurrió un error, por favor inténtelo de nuevo`);
            return null;
            }
        })
        .then(data => {
            document.getElementById("exampleModalLongTitle").innerHTML = "Producto actualizado";
            document.getElementById("idModalBody").innerHTML = "<p>Artículo actualizado exitosamente</p>";
            $("#cartUpdate").modal();
            }
        )
        .catch(err=>{
                console.error(err);
            }
        );

    }

</script>
<div class="modal fade" id="productUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateTitle">Actualizar producto</h5>
                <button id="closeForgotPassword" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="updateModalBody" class="modal-body">
            <form>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nombre</label>
                    <input type="text" class="form-control" id="product-name" name="name">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Categoría</label>
                    <select class="form-control" id="product-category" name="category">
                    <?php
                    $sql = "SELECT id, name, description FROM category";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while ($row = $result -> fetch_assoc()) {
                    ?>
                    <option value=<?php echo $row["id"];?>><?php echo $row["name"];?></option>
                    <?php
                        }
                    }
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Descripción</label>
                    <textarea class="form-control" id="product-description" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Precio</label>
                    <input type="text" class="form-control" id="product-price" name="price">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Stock</label>
                    <input type="text" class="form-control" id="product-stock" name="stock">
                </div>
                <button type="button" class="btn btn-primary" onclick="updateProduct(this.form)" data-dismiss="modal">Actualizar producto</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="cartUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button id="closeForgotPassword" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="idModalBody" class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>