<?php

class UserTransactionsJSON {

    public $id;
    public $statusID;
    public $funds;
    public $sendDate;
    public $imagePath;
    

    function __construct($id,$statusID,$funds,$sendDate,$imagePath) {
        $this->id = $id;
        $this->userID = $userID;
        $this->statusID = $statusID;
        $this->funds = $funds;
        $this->sendDate = $sendDate;
        $this->imagePath = $imagePath;

    }

}

?>