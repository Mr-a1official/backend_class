<?php
require_once(__DIR__ . '/config/session.php');
require_once(__DIR__ . '/function.php');
$data = all_profile();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/font_awesome/css/font-awesome.min.css">
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
   <?php if (isset($_SESSION['error'])) : ?>
      <script>
         swal("Error", "<?= $_SESSION['error'] ?>", "error");
      </script>
   <?php endif; ?>
   <?php if (isset($_SESSION['success'])) : ?>
      <script>
         swal("Success", "<?= $_SESSION['success'] ?>", "success");
      </script>
   <?php endif; ?>
   <div class="container">
      <div class="row">
         <?php foreach ($data as $key => $value) : ?>
            <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3 mt-5">
               <img class="img-fluid w-25" src="uploads/<?= $value['file'] ?>" alt="">
            </div>
         <?php endforeach; ?>
      </div>
   </div>
</body>

</html>
<?php unset($_SESSION['error'], $_SESSION['success']) ?>