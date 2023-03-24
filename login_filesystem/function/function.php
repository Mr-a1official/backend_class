<?php

function create_user_data($username, $password)
{

   $location = "../storage/user.txt";
   $open = fopen($location, 'a');
   fwrite($open, $username . "\n" . sha1($password) . "\n");
   fclose($open);
}

function get_all_users()
{
   $location = "../storage/user.txt";
   $fopen = fopen($location, 'r');
   $data = [];
   if ($fopen) {
      while (($line = fgets($fopen)) != false) {
         array_push($data, $line);
      }
      fclose($fopen);
   }
   return $data;
}
