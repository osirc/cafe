<div class="container-fluid">
    <div class="card shopping-cart">
        <div class="card-header bg-dark text-light">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            Carrito de compras
            <a href="../cafe/welcome.php?id=1&active=1" class="btn btn-outline-info btn-sm pull-right">Seguir comprando</a>
            <div class="clearfix"></div>
        </div>
        <div class="card-body">
            <!-- PRODUCT -->
            <?php
            include("./user/userCart.php");
            foreach($cart as $product) {
            
            ?>
            <div class="row" id='row_<?php echo  $product->productID; ?>_div'>
                <div class="col-12 col-sm-12 col-md-2 text-center">
                    <img class="img-responsive" src=<?php echo "'" . $product->imagePath . "'";  ?> alt="prewiew" style="max-width: 50% !important;">
                </div>
                <div class="col-12 text-sm-center text-md-left col-md-6">
                    <figcaption class="media-body">
                        <h6 class="title text-truncate"><?php echo $product->productName; ?> </h6>
                        <!--<dl class="param param-inline small">
                            <dt>Size: </dt>
                            <dd>XXL</dd>
                        </dl>
                        <dl class="param param-inline small">
                            <dt>Color: </dt>
                            <dd>Orange color</dd>
                        </dl>-->
                    </figcaption>
                </div>

                <div class="col-2 col-sm-2 col-md-1 text-sm-center row">
                    <select id= <?php echo "'select" . $product->productID . "'" ?> class="custom-select-sm" onchange=<?php echo "'updateCart(" . $product->productID . ",this.selectedIndex+1)'" ?>>
                                    <?php
                                    $productAmount = $product->amount;
                                    for ($j = 1; $j <= $product->stock; $j++) {?>
                                    <option <?php if ($j == $productAmount) echo "selected"; ?> value="<?php echo $j ?>"><?php echo $j ?></option>
                                    <?php }?>
                    </select>
                </div>

                <div class="col-12 col-sm-12 text-sm-center col-md-3 text-md-right row">
                    <div class="col-4  col-md-6">
                        <div class="price-wrap">
                            <var class="price" id="row_<?php echo $product->productID ?>_subtotal">$<?php echo $product->price * $product->amount;  ?></var>
                            <small class="text-muted" id="row_<?php echo $product->productID ?>_price">$<?php echo $product->price?> cada uno</small>
                        </div>
                    </div>
                    <div class="col-3 col-sm-3 col-md-5 text-sm-center">
                        <button type="button" class="btn btn-outline-danger btn-xs" onclick=<?php echo "'deleteFromCart(" .  $product->productID . "," . $product->price . "* Number(document.getElementById(`select"  . $product->productID .  "`).value))'";  ?>>
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
            <hr id='row_<?php echo $product->productID; ?>_hr'>
            <?php
            }   //end for
            ?>
            <!-- END PRODUCT -->
        </div>


        <div class="card-footer">
            <div class="coupon col-md-5 col-sm-5 no-padding-left pull-left">
                <div class="row">
                </div>
            </div>
            <div class="pull-right" style="margin: 10px">
            <!--    <a href="" class="btn btn-success pull-right" onclick= <?php echo "'checkoutCart()'";  ?>>Checkout</a> -->
                    <button id="Checkout" type="button" class="btn btn-success pull-right" onclick= <?php echo "'showCheckout()'";?> <?php echo (count($cart)) == 0 ? "disabled": "" ; ?>>Checkout</button>
                <div class="pull-right" style="margin: 5px">
                    Total price: <b id="total_price"><?php
                    $stmt = $conn->prepare("SELECT SUM(price * amount) AS total FROM cart INNER JOIN product ON 
                    cart.product_id = product.id WHERE user_id = ?");
                    $stmt->bind_param("i",$_SESSION["id"]);
                    $totalPrice = 0;
                    if ($stmt->execute()) {
                    $result = $stmt->get_result();
                        if ($row = $result -> fetch_assoc()) {
                            $totalPrice = $row["total"];
                        }
                    }
                    echo "$" .$totalPrice;
                    ?></b>
                </div>
                <div class="pull-right" style="margin: 5px">
                    Mis fondos: <b id="my_funds"><?php
                    $stmt = $conn->prepare("SELECT funds FROM user WHERE id = ?");
                    $stmt->bind_param("i",$_SESSION["id"]);
                    $funds = 0;
                    if ($stmt->execute()) {
                        $result = $stmt->get_result();
                        if ($row = $result -> fetch_assoc()) {
                            $funds = $row["funds"];
                        }
                    }
                    echo "$" .$funds;
                    ?></b>
                </div>
            </div>
        </div>

    </div> <!-- /#shopping-cart -->
</div>
<script>
    function deleteFromCart(productID,subtotal_price) {
        document.getElementById(`row_${productID}_div`).remove();
        document.getElementById(`row_${productID}_hr`).remove();
        let display_price=document.getElementById(`total_price`);
        display_price.innerHTML=`$${Number(display_price.innerHTML.slice(1))-subtotal_price}`;

        if(document.getElementsByTagName("select").length==0)
            document.getElementById(`Checkout`).disabled=true;

        let request = {
        id: productID
        }
        fetch("./user/deleteFromCart.php", {
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
            document.getElementById("exampleModalLongTitle").innerHTML = "Porducto eliminado";
            document.getElementById("idModalBody").innerHTML = "<p>Artículo eliminado exitosamente</p>";
            $("#cartUpdate").modal();
            }
        )
        .catch(err=>{
                console.error(err);
            }
        );
    }

    function showCheckout() {
        $("#cartChekout").modal();
    }

    function checkoutCart() {
        fetch("./user/checkoutCart.php", {
            method: 'POST',
            headers: new Headers({"Content-Type": `application/json;charset=utf-8`,})
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
            if (data == "1") {
                document.getElementById("exampleModalLongTitle").innerHTML = "¡Felicidades!";
                document.getElementById("idModalBody").innerHTML = "<p>Tu compra fue realizada con éxito!</p>";
            } else {
                document.getElementById("exampleModalLongTitle").innerHTML = "Error";
                document.getElementById("idModalBody").innerHTML = "<p>" + data + "</p>";
            }
            $("#cartUpdate").modal();
            }
        )
        .catch(err=>{
                console.error(err);
            }
        );
    }

    function updateCart(productID,amount) {
        let price=document.getElementById(`row_${productID}_price`).innerHTML;
        price=Number(price.slice(1,price.length-8));

        let subtotal_element=document.getElementById(`row_${productID}_subtotal`);
            subtotal_element.innerHTML=`$${Number(amount)*price}`;

        updateTotalPrice();

        let request = {
            id: productID,
            amount: amount
        };
        fetch("./user/updateCart.php", {
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
            }
        )
        .catch(err=>{
                console.error(err);
            }
        );

    }

    function updateTotalPrice(){
        let select_elements=document.getElementsByTagName("select");
        let new_total=0;
        let aux_price;
        for(let i=0;i!=select_elements.length;i++){
            aux_price=document.getElementById(`row_${select_elements[i].id.slice(6)}_price`).innerHTML;
            aux_price=Number(aux_price.slice(1,aux_price.length-8));
            new_total+=Number(select_elements[i].value)*aux_price;
             
        }
        document.getElementById(`total_price`).innerHTML=`$${new_total}`;
    }
</script>
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
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="cartChekout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">¿Confirmar compra?</h5>
                <button id="closeForgotPassword" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="checkoutModalBody" class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="checkoutCart()" data-dismiss="modal">Confirmar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>