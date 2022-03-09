<html>
<body>
<?php
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
} // установление соединения с сервером

$id = $_GET['id'];
$id_au = $_GET['id_au'];
$id_as = $_GET['id_as'];
$price = $_GET['price'];

$result = $mysqli->query("UPDATE avail SET id_au='$id_au', id_as='$id_as', price='$price' WHERE id='$id'");

if ($result) {
    echo 'Все сохранено. <a href="avail.php"> Вернуться к списку Автомобилей </a>';
} else {
    echo 'Ошибка сохранения. <a href="avail.php">Вернуться к списку Автомобилей</a> ';
}
?>
</body>
</html>