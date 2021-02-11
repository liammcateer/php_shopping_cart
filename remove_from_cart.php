<?php

include './session.php';

$cart = unserialize($_SESSION['shopping_cart']);
$cart->remove_product($_GET['name'], $_GET['quantity']);
$_SESSION['shopping_cart'] = serialize($cart);

header('Location: ./index.php');