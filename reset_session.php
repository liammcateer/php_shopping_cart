<?php
setcookie("shopping_cart", "", time() - 3600, "/");
echo "Cart Reset.";