<?php
include './cart_item.php';

class ShoppingCart {
    public $products;
    public $total_price;
    public $count;

    public function __construct(){
        $this->products = [];
        $this->total_price = 0;
    }

    public function add_product($name, $price, $quantity = 1) {
        $cart_product;
        if(isset($this->products[$name])){
            $cart_product = $this->products[$name];
        }else{
            $cart_product = new CartItem($name, $price);
        }

        $cart_product->increase_quantity($quantity);

        $this->products[$name] = $cart_product;
    }

    public function remove_product($name, $quantity = 1){
        if(isset($this->products[$name])){
            $cart_product = $this->products[$name];
            $cart_product->decrease_quantity($quantity);
            if($cart_product->get_quantity() <= 0){
                unset($this->products[$name]);
            }else{
                $this->products[$name] = $cart_product;
            }
        }

    }
}
?>