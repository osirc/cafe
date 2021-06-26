<div class="container-fluid">

    <?php
    
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
                                <select class="custom-select">
                                    <?php
                                    $productStock = $products[$i]["stock"];
                                    for ($j = 1;$j <= $productStock ;$j++) {?>
                                    <option><?php echo $j ?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-outline-success float-right">Agregar</button>
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
    }
        ?>   

            <div class="card">
                <img class="card-img-top" src="images/starbucks.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                </div>
                <div class="card-footer">
                    <div class="container">
                        <div class="row float-right">
                            <div class="col">
                                <select class="custom-select">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-outline-success float-right">Agregar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <img class="card-img-top" src="images/starbucks.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                </div>
                <div class="card-footer">
                    <div class="container">
                        <div class="row float-right">
                            <div class="col">
                                <select class="custom-select">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-outline-success float-right">Agregar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row mb-4">
        <div class="card-deck">
            <div class="card">
                <img class="card-img-top" src="images/starbucks.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="card-footer">
                    <div class="container">
                        <div class="row float-right">
                            <div class="col">
                                <select class="custom-select">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-outline-success float-right">Agregar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <img class="card-img-top" src="images/starbucks.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                </div>
                <div class="card-footer">
                    <div class="container">
                        <div class="row float-right">
                            <div class="col">
                                <select class="custom-select">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-outline-success float-right">Agregar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <img class="card-img-top" src="images/starbucks.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                </div>
                <div class="card-footer">
                    <div class="container">
                        <div class="row float-right">
                            <div class="col">
                                <select class="custom-select">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-outline-success float-right">Agregar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>