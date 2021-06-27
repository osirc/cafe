<?php

class OrdersJSON {

    public $id;
    public $statusID;
    public $firstName;
    public $lastName;
    public $productName;
    public $amount;
    public $date;

    function __construct($id,$statusID,$firstName,$lastName,$productName,$amount,$date) {
        $this->id = $id;
        $this->statusID = $statusID;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->productName = $productName;
        $this->amount = $amount;
        $this->date = $date;
    }
}

?>