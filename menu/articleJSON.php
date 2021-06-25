<?php

class ArticleJSON {

    public $id;
    public $name;
    public $description;
    public $category;
    public $price;
    public $stock;
    public $isDiscarded;
    public $imagePath;

    function __construct($id,$name,$description,$category,$price,$stock,$isDiscarded,$imagePath) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->category = $category;
        $this->price = $price;
        $this->stock = $stock;
        $this->isDiscarded = $isDiscarded;
        $this->imagePath = $imagePath;

    }

}

?>