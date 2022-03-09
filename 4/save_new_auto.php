<?php
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
if (mysqli_affected_rows($link) > 0)
{
    print "<p>Спасибо, Ваш Автомобиль добавлен в базу данных.";
    print "<p><a href=\"index.php\"> Вернуться к списку Автомобилей </a>";
} else {
    print "Ошибка сохранения. <a href=\"index.php\"> Вернуться к списку Автомобилей </a>";
    mysqli_close($link);
}
?>
