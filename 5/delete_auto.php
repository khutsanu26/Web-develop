<?php
include("checks.php");
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database) or die ("Невозможно
подключиться к серверу");
$id_au = $_GET['id_au'];
if ($_SESSION['type'] == 2)
    $result = $mysqli->query("DELETE FROM auto WHERE id_au ='$id_au'");
else
    echo "Недостаточно прав";
header("Location: autoAdm.php");
exit;
?>
