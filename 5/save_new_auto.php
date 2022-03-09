<?php
include("checks.php");
require_once 'connect1.php';
$link = mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysql_connect_error());
    exit();
}
mysqli_query($link, "INSERT INTO auto SET mark='" . $_GET['mark']
    . "', model='" . $_GET['model'] . "', `year`='"
    . $_GET['year'] . "', trans='" . $_GET['trans'] .
    "', count_ex='" . $_GET['count_ex'] . "', price_au='" . $_GET['price_au'] . "'");

if (mysqli_affected_rows($link) > 0) {
    print "<p>Спасибо, Ваш Автомобиль добавлен в базу данных.";
    if ($_SESSION['type'] == 1)
        echo "<p><a href=auto.php> Вернуться к списку Автомобилей </a>";
    elseif ($_SESSION['type'] == 2)
        echo "<p><a href=autoAdm.php> Вернуться к списку Автомобилей </a>";
} else {
    if ($_SESSION['type'] == 1)
        echo "Ошибка сохранения . <p><a href=auto.php> Вернуться к списку Автомобилей </a>";
    elseif ($_SESSION['type'] == 2)
        echo "Ошибка сохранения . <p><a href=autoAdm.php> Вернуться к списку Автомобилей </a>";
}
?>
