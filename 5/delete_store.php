<?php
include("checks.php");
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database)
or die ("Невозможно подключиться к серверу");
$id_as = $_GET['id_as'];
if ($_SESSION['type'] == 2)
    $result = $mysqli->query("DELETE FROM autos WHERE id_as='$id_as'");
else
    echo "Недостаточно прав";
header("Location: stores.php");
exit;
?>
