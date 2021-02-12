<?php

require_once './session.php';

$cart = unserialize($_COOKIE['shopping_cart']);
$cart->remove_product($_GET['name'], $_GET['quantity']);
setcookie('shopping_cart', serialize($cart), time() + (86400 * 7), "/"); //Set Cookie for 7 days

header('Location: ./');