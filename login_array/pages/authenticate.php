<?php
require_once("../config/session.php");
require_once("../config/user_table.php");

$username = $_POST['username'];
$password = $_POST['password'];

try {
   if (isset($user_data)) {
      foreach ($user_data as $key => $value) {
         if ($value['username'] == $username) {
            if ($value['password'] == $password) {
               $_SESSION['success'] = "Login Successful";
               $_SESSION['user_status'] = $key;
               return header("location:profile.php");
            }
         }
      }
      throw new Exception("Invalid username and password combination", 1);
   } else {
      throw new Exception("Error Processing Request User Data Not Found", 1);
   }
} catch (\Exception $e) {
   echo $e->getMessage();
}
