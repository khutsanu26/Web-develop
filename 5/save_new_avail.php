<?php
include ("checks.php");
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к БД";
}

$id_au = $_GET['id_au'];
$id_as = $_GET['id_as'];
$price = $_GET['price'];

// Выполнение запроса
$result = $mysqli->query("INSERT INTO avail SET id_au='$id_au', id_as='$id_as', price='$price'");
if ($result) {
    print "<p>Внесение данных прошло успешно!";
    if ($_SESSION['type'] == 1)
        echo "<p><a href=avail.php> Вернуться к списку </a>";
    elseif ($_SESSION['type'] == 2)
        echo ".<p><a href=availAdm.php> Вернуться к списку </a>";
} else {
    if ($_SESSION['type'] == 1)
        echo "Ошибка сохранения . <p><a href=avail.php> Вернуться к списку </a>";
    elseif ($_SESSION['type'] == 2)
        echo "Ошибка сохранения . <p><a href=availAdm.php> Вернуться к списку </a>";
}
?>