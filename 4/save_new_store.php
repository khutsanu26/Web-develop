<?php
require_once 'connect1.php';
$link = mysqli_connect($host, $user, $password, $database);
if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysql_connect_error());
    exit();
}
mysqli_query($link, "INSERT INTO autos SET name_as='" . $_GET['name_as']
    . "', address='" . $_GET['address'] . "'");
if (mysqli_affected_rows($link) > 0) // если нет ошибок при выполнении запроса
{
    print "<p>Спасибо, Ваш магазин добавлен в базу данных.";
    print "<p><a href=\"stores.php\"> Вернуться к списку
магазинов </a>";
} else {
    print "Ошибка сохранения. <a href=\"stores.php\">
Вернуться к списку магазинов </a>";
    mysqli_close($link);
}
?>
