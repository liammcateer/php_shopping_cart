<?php
include './product.php';

class CartItem extends Product{
    private $quantity = 0;

    function get_quantity() {
        return $this->quantity;
    }

    function get_total_price() {
        return $this->price * $this->quantity;
    }

    function increase_quantity($amount) {
        $this->quantity += $amount;
    }

    function decrease_quantity($amount) {
        $this->quantity -= $amount;
    }
}