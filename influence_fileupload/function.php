<?php
require_once(__DIR__ . '/config/connection.php');

function file_upload($file)
{
   $tmp_name = $file['tmp_name'];
   $name     = $file['name'];
   $size     = $file['size'];
   $type     = explode("/", $file['type']);
   $allowed_format = ['png', 'jpeg'];
   $location = "uploads/";
   $encrypted_name =  md5(rand(5555, 90000) . $name) . "." . $type[1];

   $data = [
      "name" => $name,
      'tmp_name' => $tmp_name,
      'size' => $size,
      'type' => $type,
      'location' => $location,
      'new_name' => $encrypted_name
   ];

   if (!empty($name)) {
      if (getimagesize($tmp_name)) {
         if ($size <= 2000000) {
            if (in_array($type[1], $allowed_format)) {
               if (!file_exists($location . $name)) {
                  if (move_uploaded_file($tmp_name, $location . $encrypted_name)) {
                     return $data;
                  } else {
                     throw new Exception("File was unable to upload please contact the administrator", 1);
                  }
               } else {
                  throw new Exception("File already exists", 1);
               }
            } else {
               throw new Exception($type[1] . " " .  "not allowed", 1);
            }
         } else {
            throw new Exception("File is too large", 1);
         }
      } else {
         throw new Exception("File is not an image", 1);
      }
   } else {
      throw new Exception("This field is required", 1);
   }
}
function dd($value)
{
   echo "<pre>";
   var_dump($value);
   echo "</pre>";
   die;
}
function insert_profile($profile)
{
   $stmt = "INSERT INTO file_upload(file) VALUES('$profile')";
   $stmt = mysqli_query(connection(), $stmt);
   return true;
}
function all_profile()
{
   $stmt =  "SELECT * FROM file_upload";
   $stmt = mysqli_query(connection(), $stmt);
   while ($row = mysqli_fetch_assoc($stmt)) {
      $data[] = $row;
   }
   return $data;
}
