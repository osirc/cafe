<?php

class cartJSON {

    public $articleID;
    public $articleName;
    public $price;
    public $amount;
    public $stock;
    public $isDiscarded;
    public $imagePath;

    function __construct($articleID,$articleName,$price,$amount,$stock,$isDiscarded,$imagePath) {
        $this->articleID = $articleID;
        $this->articleName = $articleName;
        $this->price = $price;
        $this->amount = $amount;
        $this->stock = $stock;
        $this->isDiscarded = $isDiscarded;
        $this->imagePath = $imagePath;

    }
}

?>