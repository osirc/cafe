<?php

class CartProduct {

    public $id;
    public $price;
    public $amount;
    public $stock;

    function __construct($id,$price,$amount) {
        $this->id = $id;
        $this->price = $price;
        $this->amount = $amount;
        $this->stock = $stock;
    }
}

?>