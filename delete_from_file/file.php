<?php
session_start();
class delete_image
{
    function file_exist()
    {
        try {
            if (file_exists('location.txt')) {
            } else {
                throw new Exception("Error Processing Request Location does not exist");
            }
        } catch (\Exception $error) {
            echo $error->getMessage();
            exit;
        }
    }
    var $option = [];
    var $option2 = [];
    function location()
    {
        return $location = 'location.txt';
    }
    function filtering()
    {
        foreach ($this->option as $key => $value) {
            $query = $key;
            $query_string = $_GET['num'] ?? '';
            if ($query != $query_string) {
                array_push($this->option2, $value);
                unlink($this->location());
            } else {
                unlink('uploads/' . trim($value));
                header('location:algorithm.php');
            }
        }
    }
    function rewriting()
    {
        foreach ($this->option2 as $key => $inside) {
            $loc = fopen($this->location(), 'a');
            fwrite($loc, $inside);
            fclose($loc);
            header('location:algorithm.php');
            $_SESSION['success'] = "image deleted successfully";
        }
    }
    function condition_statement()
    {

        $fopen = fopen($this->location(), 'r');
        try {
            if ($fopen) {
                while (($line = fgets($fopen)) != false) {
                    array_push($this->option, $line);
                }
                fclose($fopen);
                $this->filtering();
                $this->rewriting();
            } else {
                throw new Exception("Error Processing Request Could not open file");
            }
        } catch (\Exception $error) {
            echo $error->getMessage();
        }
    }
}
$delete = new delete_image();
$delete->file_exist();
$delete->condition_statement();
