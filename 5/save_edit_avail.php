<html>
<body>
<?php
include("checks.php");
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
    if ($_SESSION['type'] == 1)
        echo "Все сохранено.<p><a href=avail.php> Вернуться к списку Автомобилей </a>";
    elseif ($_SESSION['type'] == 2)
        echo "Все сохранено.<p><a href=availAdm.php> Вернуться к списку Автомобилей </a>";
} else {
    if ($_SESSION['type'] == 1)
        echo "Ошибка сохранения. <p></p><a href=avail.php> Вернуться к списку Автомобилей </a>";
    elseif ($_SESSION['type'] == 2)
        echo "Ошибка сохранения. <p><a href=availAdm.php> Вернуться к списку Автомобилей </a>";
}
?>
</body>
</html>