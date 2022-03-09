<html>
<head><title> Сведения об Автомобилях </title></head>
<body>
<h2>Сведения об Автомобилях:</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Марка</th>
        <th>Модель</th>
        <th>Год выпуска</th>
        <th>Трансмиссия</th>
        <th>Объем выпуска</th>
        <th>Стоимость</th>
        <th>Редактировать</th>
        <th>Уничтожить</th>
    </tr>
    </tr>
    <?php
    require_once 'connect1.php';
    $link = mysqli_connect($host, $user, $password, $database) or die ("Невозможно
подключиться к серверу" . mysqli_error($link));
    $result = mysqli_query($link, "SELECT id_au, mark, model, `year`, trans, count_ex, price_au
FROM auto");
    mysqli_select_db($link, "auto");

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['id_au'] . "</td>";
        echo "<td>" . $row['mark'] . "</td>";
        echo "<td>" . $row['model'] . "</td>";
        echo "<td>" . $row['year'] . "</td>";
        echo "<td>" . $row['trans'] . "</td>";
        echo "<td>" . $row['count_ex'] . "</td>";
        echo "<td>" . $row['price_au'] . "</td>";
        echo "<td><a href='edit_auto.php?id_au=" . $row['id_au']
            . "'>Редактировать</a></td>"; // запуск скрипта для редактирования
        echo "<td><a href='delete_auto.php?id_au=" . $row['id_au']
            . "'>Удалить</a></td>"; // запуск скрипта для удаления записи
        echo "</tr>";
    }
    print "</table>";
    $num_rows = mysqli_num_rows($result); // число записей в таблице БД
    print("<P>Всего Автомобилей: $num_rows </p>");
    ?>
    <p><a href="new_auto.php"> Добавить Автомобиль</a>
    <p><a href="avail.php">Автомобили в наличии</a>
    <p><a href="stores.php">Автосалоны</a>
    <p><a href="gen_pdf.php">Скачать pdf-файл</a>
    <p><a href="gen_xls.php">Скачать xls-файл</a>
</body>
</html>