<html>
<head><title> Добавление нового Автомобиля </title></head>
<body>
<H2>Добавление нового Автомобиля:</H2>
<form action="save_new_auto.php" method="get">
    Марка: <input name="mark" size="40" type="varchar">
    <br>Модель: <input name="model" size="50" type="text">
    <br>Год выпуска: <input name="year" size="4" type="int">
    <br>Трансмиссия: <input name="trans" size="50" type="text">
    <br>Объем производства: <input name="count_ex" size="11" type="int">
    <br>Стоимость: <input name="price_au" size="11" type="int">
    <p><input name="add" type="submit" value="Добавить">
        <input name="b2" type="reset" value="Очистить"></p>
</form>
<p>
    <a href="index.php"> Вернуться к списку Автомобилей </a>
</body>
</html>
