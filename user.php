<?php
class User
{

    public $name;
    public $email;
    public $card_expired = false;
    public $my_shop = [];
    public $registered = false;

    function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function printUser()
    {
        return " nome: $this->name <br> mail: $this->email";
    }

    public function addShop($_product)
    {
        if ($_product->in_stock) {
            $this->my_shop[] = $_product;
        } else {
            throw new Exception("Spiacenti, " . $_product->nome . " non disponibile.");
        }
    }

    public function registered()
    {
        $this->registered = true;
        return "Bentornato" . " " . $this->name;
    }

    public function getSum()
    {
        $total_price = 0;
        foreach ($this->my_shop as $item) {
            $total_price += $item->price;
        }
        if ($this->registered) {
            return number_format((float)$total_price * 0.8, 2, '.', '') . " " . "Ricevuto lo sconto del 20%";
        } else {
            return number_format((float)$total_price, 2, '.', '');
        }
    }
    public function validCard()
    {
        return !$this->card_expired;
    }
}
