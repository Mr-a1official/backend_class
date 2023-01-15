<?php
require("products_db.php");
require("function.php");
$cart_products = filter_selected_products($_SESSION['cart'], $products);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carts</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="font_awesome/css/font-awesome.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Carts </h1>
        <table class="table table-bordered table-striped">

            <?php if (!empty($cart_products)) : ?>
                <tr>
                    <th>Name</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
                <?php foreach ($cart_products as $cart_key => $cart_values) : ?>
                    <tr>
                        <td><?= $cart_values['name'] ?></td>
                        <td><?= number_format($cart_values['price'], 2) ?></td>
                        <td><?= $cart_values['quantity'] ?></td>
                        <td><?= number_format($cart_values['total']) ?></td>
                        <td>
                            <a class="btn btn-danger" href="#"> <i class="fa fa-trash" aria-hidden="true"></i> </a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td>
                        <h2>There is no item in cart</h2>
                    </td>
                </tr>
            <?php endif ?>
        </table>
    </div>
</body>

</html>
<?php #session_destroy()
?>