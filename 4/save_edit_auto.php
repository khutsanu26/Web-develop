<html>
<body>
<?php
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
} // установление соединения с сервером

$id_au = $_GET['id_au'];

$mark = $_GET['mark'];
$model = $_GET['model'];
$year = $_GET['year'];
$trans = $_GET['trans'];
$count_ex = $_GET['count_ex'];
$price_au = $_GET['price_au'];

$zapros = "UPDATE auto SET mark='$mark', model='$model',
year='$year', trans='$trans', count_ex='$count_ex', price_au = '$price_au'
WHERE id_au='$id_au'";

$result = $mysqli->query($zapros);

if ($result) {
    echo 'Все сохранено. <a href="index.php"> Вернуться к списку Автомобилей </a>';
} else {
    echo 'Ошибка сохранения. <a href="index.php">Вернуться к списку Автомобилей</a> ';
}
?>
</body>
</html>