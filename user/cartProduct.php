<?php

class CartProduct {

    public $id;
    public $name;
    public $price;
    public $amount;
    public $stock;

    function __construct($id,$name,$price,$amount,$stock) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
        $this->stock = $stock;
    }
}

?>