<?php
class Product {
    protected $name;
    protected $price;

    function __construct($name, $price){
        $this->name = $name;
        $this->price = $price;
    }

    function get_name() {
        return $this->name;
    }

    function get_price() {
        return $this->price;
    }
}
?>