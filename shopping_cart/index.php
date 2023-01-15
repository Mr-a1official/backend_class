<?php
require("products_db.php");
require("function.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="font_awesome/css/font-awesome.min.css">
</head>

<body>
    <div class="container mt-5">
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success mt-3"><?= $_SESSION['success'] ?></div>
        <?php endif ?>
        <h1>Products</h1>
        <table class="table table-bordered table-striped ">
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>

            </tr>
            <?php foreach ($products as $product_key => $product_values) : ?>
                <form action="add_cart.php?product=<?= $product_key ?>" method="post">
                    <tr>
                        <td><?= $product_values['name'] ?></td>
                        <td><?= number_format($product_values['price'], 2) ?></td>
                        <td>
                            <select name="quantity" id="quantity">
                                <?php for ($i = 0; $i <= $product_values['max_quantity']; $i++) : ?>
                                    <?php if ($i != 0) : ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </select>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> </button>
                        </td>
                    </tr>
                </form>
            <?php endforeach; ?>
        </table>
        <a class="btn btn-primary" href="view_cart.php">View cart</a>
    </div>
</body>

</html>
<?php unset($_SESSION['success']) ?>