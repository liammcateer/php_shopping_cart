<?php
require_once './shopping_cart.php';

if(!isset($_COOKIE['shopping_cart'])){
    $cart = new ShoppingCart();
    setcookie('shopping_cart', serialize($cart), time() + (86400 * 7), "/"); //Set Cookie for 7 days
    header('Refresh: 0');
}