<?php
session_start();
class Quantity
{
    function filtering($product_index, $quantity)
    {
        echo "<pre>";
        $filtered_items = [];
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($key != $product_index) {
                array_push($filtered_items, $value);
            } else {
                $s_product_id = $_SESSION['cart'][$product_index][0];
                $s_product_quantity = $_SESSION['cart'][$product_index][1];
                $new_quantity = $s_product_quantity + $quantity;
            }
        }
        echo $s_product_id .  "<br/>";
        echo $s_product_quantity .  "<br/>";
        echo $new_quantity .  "<br/>";
        // unset($filtered_items);
        unset($_SESSION['cart']);
        array_push($filtered_items, [$s_product_id, $new_quantity]);
        // print_r($filtered_items);
        $_SESSION['cart'] = $filtered_items;
        print_r($_SESSION['cart']);
        unset($_SESSION['cart']);
    }
    // function add_cart($product_index, $quantity)
    // {
    //     $cart = $_SESSION['cart'] ?? [];
    //     if (product_id_exists($product_index, $cart)) {
    //         filtering_and_updating($cart, $product_index, $quantity);
    //     } else {
    //         array_push($cart, [$product_index, $quantity]);
    //         $_SESSION['cart'] = $cart;
    //     }
    // }
    // function filtering_and_updating($cart_items, $product_index, $quantity)
    // {
    //     $filtered_items = [];
    //     foreach ($cart_items as $key => $value) {
    //         if ($key != $product_index) {
    //             array_push($filtered_items, $value);
    //         } else {
    //             $s_product_id = $cart_items[$product_index][0];
    //             $s_product_quantity = $cart_items[$product_index][1];
    //             $new_quantity = $s_product_quantity + $quantity;
    //         }
    //     }
    //     unset($cart_items);
    //     array_push($filtered_items, [$s_product_id, $new_quantity]);
    //     $_SESSION['cart'] = $filtered_items;
    // }

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
    // function add_quantity_in_cart($product_index, $quantity, $cart_items, $products)
    // {
    //     $cart_items = filter_selected_products_on_cart($cart_items, $products);
    //     // exit(var_dump($cart_items));
    //     $modified_product = [];
    //     if (count($cart_items)) {
    //             foreach ($cart_items as $key => $selected_items)
    //                 if ($product_index == $key){
    //                     array_push($modified_product, [
    //                         'name' => $selected_items['name'],
    //                         'price' => $selected_items['price'],
    //                         'quantity' => $selected_items["quantity"] + $quantity,
    //                         'total' => $selected_items['quantity'] * $selected_items['price'],
    //                     ]);
    //                 }else{
    //                     array_push($modified_product, [
    //                         'name' => $selected_items['name'],
    //                         'price' => $selected_items['price'],
    //                         'quantity' => $selected_items["quantity"],
    //                         'total' => $selected_items["quantity"] * $selected_items['price'],
    //                     ]);
    //                 }
    //         return $modified_product;
    //     } else {
    //         return $modified_product;
    //     }
    // }
    
}
$filtering = new Quantity();
$filtering->filtering(1, 7);
