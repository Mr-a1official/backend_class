<?php require_once(__DIR__ . '/config/session.php') ?>
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
         <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3 mt-5">
            <form action="action.php" method="post" enctype="multipart/form-data">
               <div class="card">
                  <div class="card-header">
                     File Upload
                  </div>
                  <div class="card-body">
                     <div class="form-group">
                        <label for="file_upload">File Upload</label>
                        <input class="form-control" type="file" name="file_upload" id="file_upload">
                     </div>
                  </div>
                  <div class="card-footer">
                     <button class="btn btn-primary" type="submit"> Upload <i class="fa fa-upload" aria-hidden="true"></i></button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</body>

</html>
<?php unset($_SESSION['error'], $_SESSION['success']) ?>