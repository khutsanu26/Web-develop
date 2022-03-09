<?php
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database) or die ("Невозможно
подключиться к серверу");
$id_au = $_GET['id_au'];
$result = $mysqli->query("DELETE FROM auto WHERE id_au ='$id_au'");
header("Location: index.php");
exit;
?>
