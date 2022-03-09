<html>
<head><title> Добавление нового Автомобиля </title></head>
<body>
<H2>Добавление нового Автомобиля:</H2>
<?php include("checks.php"); ?>
<form action="save_new_auto.php" method="get">
    Марка: <input name="mark" size="50" type="text">
    <br>Модель: <input name="model" size="50" type="text">
    <br>Год выпуска: <input name="year" size="4" type="int">
    <br>Трансмиссия: <input name="trans" size="50" type="text">
    <br>Объем производства: <input name="count_ex" size="11" type="int">
    <br>Стоимость: <input name="price_au" size="11" type="int">
    <p><input name="add" type="submit" value="Добавить">
        <input name="b2" type="reset" value="Очистить"></p>
</form>
<?php
if ($_SESSION['type'] == 1)
    echo "<p><a href=auto.php> Вернуться к списку Автомобилей </a>";
elseif ($_SESSION['type'] == 2)
    echo "<p><a href=autoAdm.php> Вернуться к списку Автомобилей </a>";
?>
</body>
</html>
