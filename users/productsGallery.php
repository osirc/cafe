<div class="container-fluid">

    <?php
    include("./menu/allArticles.php");
    $products = json_decode($allArticles,true);
    $productNum = count($products);

    for ($i = 0 ; $i < $productNum ; $i++) {
        if ($i % 3 == 0) {
            ?>
            <div class="row mb-4">
                <div class="card-deck">
            <?php
        }
        ?> 
            <div class="card">
                <img class="card-img-top" src= <?php echo "'". $products[$i]["imagePath"] . "'"; ?> alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $products[$i]["name"];  ?></h5>
                    <p class="card-text"><?php echo $products[$i]["description"]; ?></p>
                </div>
                <div class="card-footer">
                    <div class="container">
                        <div class="row float-right">
                            <div class="col">
                                <select id=<?php echo "'select" . $products[$i]["id"] . "'" ?> class="custom-select">
                                    <?php
                                    $productStock = $products[$i]["stock"];
                                    for ($j = 1;$j <= $productStock ;$j++) {?>
                                    <option><?php echo $j ?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-outline-success float-right" onclick=<?php echo "'addToCart(" . $products[$i]["id"] . ")'";  ?>>Agregar</button>
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