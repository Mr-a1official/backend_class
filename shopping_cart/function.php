<?php

session_start();
function add_cart($product_index, $quantity)
{
    $cart = $_SESSION['cart'] ?? [];
    if (product_id_exists($product_index, $cart)) {
        // filtering_and_updating($cart, $product_index, $quantity);
    } else {
        array_push($cart, [$product_index, $quantity]);
        $_SESSION['cart'] = $cart;
    }
}
function filtering_and_updating($cart_items, $product_index, $quantity)
{
    $filtered_items = [];
    foreach ($cart_items as $key => $value) {
        if ($key != $product_index) {
            array_push($filtered_items, $value);
        } else {
            $s_product_id = $cart_items[$product_index][0];
            $s_product_quantity = $cart_items[$product_index][1];
            $new_quantity = $s_product_quantity + $quantity;
        }
    }
    unset($cart_items);
    array_push($filtered_items, [$s_product_id, $new_quantity]);
    $_SESSION['cart'] = $filtered_items;
}

function filter_selected_products($cart_items, $products)
{
    $selected_products = [];
    if (count($cart_items)) {
        foreach ($products as $key => $product_informations) {
            foreach ($cart_items as $selected_items)
                if ($selected_items[0] == $key)
                    array_push($selected_products, [
                        'name' => $product_informations['name'],
                        'price' => $product_informations['price'],
                        'quantity' => $selected_items[1],
                        'total' => $selected_items[1] * $product_informations['price'],
                    ]);
        }
        return $selected_products;
    } else {
        return $selected_products;
    }
}
function product_id_exists($product_index, $cart_items)
{
    if (array_key_exists($product_index, $cart_items)) {
        return true;
    } else {
        return false;
    }
}
function delete()
{
}
