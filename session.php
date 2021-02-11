<?php
session_start();

include './shopping_cart.php';

if(!isset($_SESSION['shopping_cart'])){
    $cart = new ShoppingCart();
    $_SESSION['shopping_cart'] = serialize($cart);
}