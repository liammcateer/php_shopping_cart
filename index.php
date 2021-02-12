<?php
require_once './session.php';
require_once './products.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Php Shopping Cart</h1>
    <h3>Cart</h3>
    <?php
        $cart = unserialize($_COOKIE['shopping_cart']);
        foreach($cart->products as $cart_item){
            $total_price = number_format($cart_item->get_total_price(), 2);
            $quantity = $cart_item->get_quantity();
            $name = $cart_item->get_name();
            echo "<div class='cart-item'><strong>$name</strong>; quantity: $quantity, price:\$$total_price <a href='./remove_from_cart.php?name=$name&quantity=1'>Remove one from cart</a>";
        }
    ?>

    <h3>Products</h3>
    <?php 
        foreach($products as $product){
            $price = number_format($product['price'], 2);
            $name = $product['name'];
            echo "<div class='product'><strong>$name</strong>: \$$price <a href='./add_to_cart.php?name=$name&price=$price&quantity=1'>Add one to cart</a>";
        }
    ?>
</body>
</html>