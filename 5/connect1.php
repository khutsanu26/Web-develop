<?php
$host = 'localhost';
$database = 'a0643082_avto';
$user = 'a0643082_avto';
$password = 'root';
//require_once 'connect.php';
$link = mysqli_connect($host, $user, $password, $database)
or die("ошибка" . mysqli_error($link));
?>
