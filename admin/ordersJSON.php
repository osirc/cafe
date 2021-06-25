<?php

class ordersJSON {

    public $id;
    public $firstName;
    public $lastName;
    public $productName;
    public $amount;
    public $date;
    public $statusID;

    function __construct($id,$firstName,$lastName,$productName,$amount,$date,$statusID) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->productName = $productName;
        $this->amount = $amount;
        $this->date = $date;
        $this->statusID = $statusID;

    }
}

?>