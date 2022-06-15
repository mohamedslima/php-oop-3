<?php 
require_once __DIR__ . "/product.php";

class animalFood extends Product {
    public $for_animals;

    function __construct($_brand_name, $_type, $_price, $_for_animals)
    {
        parent::__construct($_brand_name, $_type, $_price);
        $this->for_animals = $_for_animals;
    }

    public function printInfo() {
        return "$this->brand_name <br> Tipologia: $this->type <br> € $this->price <br> Per: $this->for_animals";
    }
}
