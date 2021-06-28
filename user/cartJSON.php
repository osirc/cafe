<?php

class CartJSON {

    public $productID;
    public $productName;
    public $price;
    public $amount;
    public $stock;
    public $imagePath;

    function __construct($productID,$productName,$price,$amount,$stock,$imagePath) {
        $this->productID = $productID;
        $this->productName = $productName;
        $this->price = $price;
        $this->amount = $amount;
        $this->stock = $stock;
        $this->imagePath = $imagePath;

    }

}

?>