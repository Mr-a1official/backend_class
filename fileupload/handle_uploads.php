<?php
echo "<pre>";
$name = $_FILES['image']['name'];
$type = $_FILES['image']['type'];
$tmp_name = $_FILES['image']['tmp_name'];
$size = $_FILES['image']['size'];
$file_format = pathinfo($name, PATHINFO_EXTENSION);
$valid_format = ['jpeg', 'png'];
$needle = explode("/", $type);

if ($name == "") {
    echo "filed is empty";
} else {
    if (!in_array($needle[1], $valid_format)) {
        echo "format not supported";
    } else {
        if ($size < 1000000) {
            if (getimagesize($tmp_name)) {
                if (!file_exists("uploads/" . $name)) {
                    if (move_uploaded_file($tmp_name, "uploads/" . md5($name) . "." . $file_format)) {
                        $fopen =  fopen("file.txt", "a");
                        fwrite($fopen, md5($name) . "." . $file_format . "\n");
                        fclose($fopen);
                        echo  "file uploaded";
                    }
                } else {
                    echo "file already exists";
                }
            } else {
                echo "file is not an image";
            }
        } else {
            echo "file is too large";
        }
    }
}
