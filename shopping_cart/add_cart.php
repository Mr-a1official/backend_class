<?php
require("function.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product    = $_REQUEST['product'];
    $quantity   = $_REQUEST['quantity'];
    add_cart($product, $quantity);
    return header("Location:view_cart.php");
}

// var_dump($_SESSION['cart']);
