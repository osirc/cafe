<?php

class transactionJSON {

    public $id;
    public $firstName;
    public $lastName;
    public $email;
    public $funds;
    public $status;
    public $sendDate;
    public $imagePath;

    function __construct($id,$firstName,$lastName,$email,$funds,$status,$sendDate,$imagePath) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->funds = $funds;
        $this->status = $status;
        $this->sendDate = $sendDate;
        $this->imagePath = $imagePath;

    }
    
}

?>