<html>
<head>
    <title> Редактирование данных об Автомобилях </title>
</head>
<body>
<?php
include("checks.php");
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
}// установление соединения с сервером
$id_au = $_GET['id_au'];

$result = $mysqli->query("SELECT mark, model, `year`, trans, count_ex, price_au FROM auto WHERE id_au='$id_au'");
if ($result) {
    while ($gm = $result->fetch_array()) {
        $mark = $gm['mark'];
        $model = $gm['model'];
        $year = $gm['year'];
        $trans = $gm['trans'];
        $count_ex = $gm['count_ex'];
        $price_au = $gm['price_au'];
    }
}

print "<form action='save_edit_auto.php' method='get'>";
print "Марка: <input name='mark' size='30' type='text'
value='$mark'>";
print "<br>Модель: <input name='model' size='30' type='text'
value='$model'>";
print "<br>Год выпуска: <input name='year' size='30' type='int'
value='$year'>";
print "<br>Трансмиссия: <input name='trans' size='30' type='text'
value='$trans'>";
print "<br>Объем выпуска: <input name='count_ex' size='11' type='int'
value='$count_ex'>";
print "<br>Стоимость: <input name='price_au' size='11' type='int'
value='$price_au'>";
print "<input type='hidden' name='id_au' size='11' type='int'
value='$id_au'>";
print "<input type='submit' name='save' value='Сохранить'>";
print "</form>";
if ($_SESSION['type'] == 1)
    echo "<p><a href=auto.php> Вернуться к списку Автомобилей </a>";
elseif ($_SESSION['type'] == 2)
    echo "<p><a href=autoAdm.php> Вернуться к списку Автомобилей </a>";
?>
</body>
</html>