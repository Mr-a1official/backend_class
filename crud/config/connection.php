<?php
require_once(__DIR__ . '/constants.php');

function connection()
{
   try {
      $connection = mysqli_connect(HOST, USER, PASS, DB);
      if (mysqli_connect_error()) {
         throw new Exception("Error processing request could not connect to db", 1);
      } else {
         return $connection;
      }
   } catch (\Exception $e) {
      die($e->getMessage());
   }
}
