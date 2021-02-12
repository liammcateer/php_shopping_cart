<?php
require_once './cookie.php';
require_once './products.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./styles.css">
    <title>Php Shopping Cart</title>
</head>
<body>
    <h1>Php Shopping Cart</h1>
    <div class="products-section">
        <h3>Products</h3>
        <div class="products">
        <?php 
            foreach($products as $product){
                $price = number_format($product['price'], 2);
                $name = $product['name'];
                echo "<div class='product'>
                        <form action='add_to_cart.php?' method='get'>
                            <strong>$name</strong>
                            <span>\$$price ea.</span>
                            <input type='hidden' name='name' value='$name'>
                            <input type='hidden' name='price' value='$price'>
                            <input type='number' value=1 name='quantity'>
                            <input type='submit' value='Add to cart'>
                        </form>
                    </div>";
            }
        ?>
        </div>
    </div>
    <h3>Cart</h3>
    <div class="cart">
    <?php
        if(isset($_COOKIE['shopping_cart'])){
            $cart = unserialize($_COOKIE['shopping_cart']);
            $grand_total = 0;
            if(count($cart->products) == 0){
                echo "Cart is empty";
            }else {
                foreach($cart->products as $cart_item){
                    $total_price = $cart_item->get_total_price();
                    $total_price_format = number_format($total_price, 2);
                    $grand_total += $total_price;
                    $quantity = $cart_item->get_quantity();
                    $price = $cart_item->get_price();
                    $name = $cart_item->get_name();
                    echo "<div class='cart-item'>
                            <div class='cart-item-detail'>
                                <strong>$name</strong>
                                <br>
                                <span>\$$price ea.</span>
                            </div>
                            <div class='cart-item-control'>
                                Total: \$$total_price_format
                                <button title='Remove one from cart' onclick=\"window.location.href='./remove_from_cart.php?name=$name&quantity=1';\">-</button>
                                $quantity
                                <button title='Add one to cart' onclick=\"window.location.href='./add_to_cart.php?name=$name&price=$price&quantity=1';\">+</button>
                                <a class='cart-clear-item' title='Clear item from cart' href='./remove_from_cart.php?name=$name&quantity=$quantity'>Remove</a>
                            </div>
                        </div>
                    ";
                }
            }
            $grand_total_format = number_format($grand_total, 2);
            echo "<div class='grand-total'><br><br>Grand Total: <strong>\$$grand_total_format</strong>
                    <br><br>
                    <a href='./reset_cart.php'>Reset cart</a>
                </div>";
        }
    ?>
    </div>
</body>
</html>