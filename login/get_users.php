<?php
require_once(__DIR__ . "/functions/functions.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All users</title>
</head>

<body>
    <table border="1">
        <tr>
            <th>Username</th>
            <th>Password</th>
        </tr>
        <?php
        $all_users = get_all_users();
        if ($all_users) : ?>
            <?php while ($row = mysqli_fetch_assoc($all_users)) : ?>
                <tr>
                    <td><?= $row['username'] ?></td>
                    <td><?= $row['password'] ?></td>
                </tr>
            <?php endwhile; ?>
        <?php endif; ?>

    </table>
</body>

</html>