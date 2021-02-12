<?php

require_once './session.php';

$cart = unserialize($_COOKIE['shopping_cart']);
$cart->remove_product($_GET['name'], $_GET['quantity']);
$_COOKIE['shopping_cart'] = serialize($cart);

header('Location: ./');