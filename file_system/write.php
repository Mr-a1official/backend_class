<?php
$username = $_POST['username'];
$location = "user_table.txt";

$open = fopen($location, 'a');
fwrite($open, $username . "\n");
fclose($open);
