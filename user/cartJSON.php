<?php

class CartJSON {

    public $productID;
    public $productName;
    public $price;
    public $amount;
    public $imagePath;

    function __construct($productID,$productName,$price,$amount,$imagePath) {
        $this->productID = $productID;
        $this->productName = $productName;
        $this->price = $price;
        $this->amount = $amount;
        $this->imagePath = $imagePath;

    }

}

?>