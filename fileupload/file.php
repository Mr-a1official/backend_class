<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/handle_uploads.php" method="POST" enctype="multipart/form-data">
        <div style="color:red"><?= $_SESSION['error'] ?? '' ?></div> <br>
        <label for="">upload</label>
        <br>
        <input type="file" name="image" id="image">
        <br> <br>
        <button type="submit">upload</button>
        <br>
        <?php
        $location = "file.txt";
        $data = [];
        $fopen =  fopen($location, "r");
        if ($fopen) {
            while (($line = fgets($fopen)) != false) {
                array_push($data, $line);
            }
        }

        foreach ($data as $key => $value) : ?>
            <img style="width:30%;" src="uploads/<?= $value ?>" alt="">
        <?php endforeach; ?>
    </form>
</body>

</html>
<?php unset($_SESSION['error']) ?>