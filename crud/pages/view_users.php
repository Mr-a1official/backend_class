<?php require_once(__DIR__ . '/../config/session.php') ?>
<?php require_once(__DIR__ . '/../config/functions.php') ?>
<?php
$users = get_users();
?>
<?php require_once(__DIR__ . '/includes/header.php') ?>

<div class="container">
   <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3">
         <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success mt-3">
               <?= $_SESSION['success'] ?>
            </div>
         <?php endif; ?>
         <div class="card mt-4 ">
            <div class="card-header">
               View users
            </div>
            <div class="card-body">
               <table class="table table-bordered">
                  <tr>
                     <th>Username</th>
                     <th>Edit</th>
                     <th>Delete</th>
                  </tr>
                  <?php while ($row = mysqli_fetch_assoc($users)) : ?>
                     <tr>
                        <td><?= $row['username'] ?></td>
                        <td> <a class="btn btn-primary" href="">Edit</a> </td>
                        <td> <a class="btn btn-danger" href="">Delete</a> </td>
                     </tr>
                  <?php endwhile; ?>
               </table>
            </div>
            <div class="card-footer">

            </div>
         </div>
         </form>
      </div>
   </div>
</div>

<?php require_once(__DIR__ . '/includes/footer.php') ?>
<?php unset($_SESSION['success']) ?>