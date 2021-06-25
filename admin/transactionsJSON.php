<?php

class TransactionsJSON {

    public $id;
    public $userID;
    public $statusID;
    public $firstName;
    public $lastName;
    public $email;
    public $funds;
    public $sendDate;
    public $imagePath;
    

    function __construct($id,$userID,$statusID,$firstName,$lastName,$email,$funds,$sendDate,$imagePath) {
        $this->id = $id;
        $this->userID = $userID;
        $this->statusID = $statusID;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->funds = $funds;
        $this->sendDate = $sendDate;
        $this->imagePath = $imagePath;

    }

}

?>