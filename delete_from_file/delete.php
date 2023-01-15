<?php

$file = fopen("file.txt", "r");

$data = [];
$filtered_items = [];

if ($file) {
    while (($line = fgets($file)) != false) {
        array_push($data, $line);
    }
    fclose($file);
}
$query = "micheal@gmail.com";
foreach ($data as $key => $value) {
    if (trim($value) != trim($query)) {
        array_push($filtered_items, $value);
        unlink("file.txt");
        foreach ($filtered_items as $keys => $values) {
            $new_file = fopen("file.txt", "a");
            fwrite($new_file, $values);
            fclose($new_file);
        }
    } else {
        unlink("file.txt");
        fopen("file.txt", "a");
    }
}
