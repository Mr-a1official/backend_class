<?php require_once(__DIR__ . '/../config/session.php') ?>
<?php require_once(__DIR__ . '/includes/header.php') ?>

<div class="container">
   <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
         <?php if (isset($_SESSION['error'])) : ?>
            <div class="alert alert-danger mt-3">
               <?= $_SESSION['error'] ?>
            </div>
         <?php endif; ?>
         <form action="store_user.php" method="post">
            <div class="card mt-4 ">
               <div class="card-header">
                  Add user
               </div>
               <div class="card-body">
                  <div class="form-group">
                     <label for="username">Username</label>
                     <input class="form-control" type="text" name="username" id="username" placeholder="Enter username here">
                  </div>
                  <div class="form-group">
                     <label for="password">Password</label>
                     <input class="form-control" type="text" name="password" id="password" placeholder="Enter password here">
                  </div>
               </div>
               <div class="card-footer">
                  <button class="btn btn-primary" type="submit">Save</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>

<?php require_once(__DIR__ . '/includes/footer.php') ?>
<?php
unset($_SESSION['error'])
?>