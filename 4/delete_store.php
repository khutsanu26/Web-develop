<?php
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database)
or die ("Невозможно подключиться к серверу");
$id_as = $_GET['id_as'];
$result = $mysqli->query("DELETE FROM autos WHERE id_as='$id_as'");
header("Location: stores.php");
exit;
?>
