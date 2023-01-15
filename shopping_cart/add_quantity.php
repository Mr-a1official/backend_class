<?php
require("function.php");
require("products_db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product    = $_REQUEST['product'];
    $quantity   = $_REQUEST['quantity'];
    $_SESSION['cart']  = add_quantity_in_cart($product, $quantity, $cart, $products);
    return header("Location:view_cart.php");
}
