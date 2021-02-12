<?php 
require_once './session.php';

$cart = unserialize($_COOKIE['shopping_cart']);
$cart->add_product($_GET['name'], $_GET['price'], $_GET['quantity']);
$_COOKIE['shopping_cart'] = serialize($cart);

header('Location: ./');
