<?php 
include './session.php';

$cart = unserialize($_SESSION['shopping_cart']);
$cart->add_product($_GET['name'], $_GET['price'], $_GET['quantity']);
$_SESSION['shopping_cart'] = serialize($cart);

header('Location: ./index.php');
