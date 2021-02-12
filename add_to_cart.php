<?php 
require_once './cookie.php';

$cart = unserialize($_COOKIE['shopping_cart']);
$cart->add_product($_GET['name'], $_GET['price'], $_GET['quantity']);
setcookie('shopping_cart', serialize($cart), time() + (86400 * 7), "/"); //Set Cookie for 7 days

header('Location: ./');
