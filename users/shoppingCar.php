<div class="container-fluid">
    <div class="card shopping-cart">
        <div class="card-header bg-dark text-light">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            Shipping cart
            <a href="" class="btn btn-outline-info btn-sm pull-right">Continiu shopping</a>
            <div class="clearfix"></div>
        </div>
        <div class="card-body">
            <!-- PRODUCT -->
            <?php
            include("./user/userCart.php");
            $products = json_decode($userCart,JSON_UNESCAPED_UNICODE);
            foreach($products as $product) {
            
            ?>
            <div class="row" id="row<?php echo ?>"">
                <div class="col-12 col-sm-12 col-md-2 text-center">
                    <img class="img-responsive" src=<?php echo "'" . $product["imagePath"] . "'";  ?> alt="prewiew" style="max-width: 25% !important;">
                </div>
                <div class="col-12 text-sm-center text-md-left col-md-6">
                    <figcaption class="media-body">
                        <h6 class="title text-truncate"><?php echo $product["productName"]; ?> </h6>
                        <dl class="param param-inline small">
                            <dt>Size: </dt>
                            <dd>XXL</dd>
                        </dl>
                        <dl class="param param-inline small">
                            <dt>Color: </dt>
                            <dd>Orange color</dd>
                        </dl>
                    </figcaption>
                </div>

                <div class="col-2 col-sm-2 col-md-1 text-sm-center row">
                    <select id= <?php echo "'select" . $product["productID"] . "'" ?> class="form-control">
                                    <?php
                                    $productAmount = $product["amount"];
                                    for ($j = 1;$j <= $productAmount ;$j++) {?>
                                    <option <?php if ($j == $productAmount) echo "selected='selected'"; ?>><?php echo $j ?></option>
                                    <?php }?>
                    </select>
                </div>

                <div class="col-12 col-sm-12 text-sm-center col-md-3 text-md-right row">
                    <div class="col-4  col-md-6">
                        <div class="price-wrap">
                            <var class="price">$<?php echo $product["price"] * $product["amount"];  ?></var>
                            <small class="text-muted">$<?php echo $product["price"]?> cada uno</small>
                        </div>
                    </div>
                    <div class="col-3 col-sm-3 col-md-5 text-sm-center">
                        <button type="button" class="btn btn-outline-danger btn-xs" onclick=<?php echo "'deleteFromCart(" . $product["productID"] . ")'";  ?>>
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
            <hr>
            <?php
            }   //end for
            ?>
            <!-- END PRODUCT -->
            <div class="pull-right">
                <a href="" class="btn btn-outline-secondary pull-right">
                    Update shopping cart
                </a>
            </div>
        </div>


        <div class="card-footer">
            <div class="coupon col-md-5 col-sm-5 no-padding-left pull-left">
                <div class="row">
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="cupone code">
                    </div>
                    <div class="col-6">
                        <input type="submit" class="btn btn-default" value="Use cupone">
                    </div>
                </div>
            </div>
            <div class="pull-right" style="margin: 10px">
            <!--    <a href="" class="btn btn-success pull-right" onclick= <?php echo "'checkoutCart()'";  ?>>Checkout</a> -->
                    <button type="button" class="btn btn-success pull-right" onclick= <?php echo "'checkoutCart()'";  ?>>Checkout</button>
                <div class="pull-right" style="margin: 5px">
                    Total price: <b>50.00€</b>
                </div>
            </div>
        </div>

    </div> <!-- /#shopping-cart -->
</div>
<script>
    function deleteFromCart(productID) {
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
                alert(data);
            }
        )
        .catch(err=>{
                console.error(err);
            }
        );
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
                alert(data);
            }
        )
        .catch(err=>{
                console.error(err);
            }
        );
    }
</script>