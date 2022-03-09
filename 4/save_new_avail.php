<?php
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
    print "<p><a href='avail.php'> Вернуться к списку </a>";
} else {
    print "Ошибка сохранения <a href='avail.php'> Вернуться к списку </a>";
}

?>