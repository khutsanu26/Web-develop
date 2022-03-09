<html>
<head><title> Сведения о Автомобилях в наличии</title></head>
<body>
<h2>Сведения о Автомобилях в наличии:</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Марка автомобиля</th>
        <th>Автосалон</th>
        <th>Стоимость</th>
        <th> Редактировать</th>
        <th> Уничтожить</th>
    </tr>
    </tr>
    <?php
    include("checks.php");
    require_once 'connect1.php';
    $mysqli = new mysqli($host, $user, $password, $database);
    if ($mysqli->connect_errno) {
        echo "Невозможно подключиться к серверу";
    }
    $result = $mysqli->query("SELECT avail.id, auto.mark as auto, autos.name_as as autos, avail.price
FROM avail 
LEFT JOIN auto ON avail.id_au=auto.id_au
LEFT JOIN autos ON avail.id_as=autos.id_as");

    $counter = 0;
    if ($result) {
        while ($row = $result->fetch_array()) {
            $id = $row['id'];
            $auto = $row['auto'];
            $autos = $row['autos'];
            $price = $row['price'];

            echo "<tr>";
            echo "<td>$id</td><td>$auto</td><td>$autos</td><td>$price</td>";

            echo "<td><a href='edit_avail.php?id=" . $row['id']
                . "'>Редактировать</a></td>"; //Запуск редактирования
            echo "<td><a href='delete_avail.php?id=" . $row['id']
                . "'>Удалить</a></td>"; //запуск удаления
            echo "</tr>";
            $counter++;
        }
    }
    print "</table>";
    print("<p>Всего автомобилей: $counter </p>");
    echo "<p><a href=new_avail.php> Добавить Автомобиль </a>";
    if ($_SESSION['type'] == 1)
        echo "<p><a href=auto.php> Вернуться назад </a>";
    elseif ($_SESSION['type'] == 2)
        echo "<p><a href=autoAdm.php> Вернуться назад </a>";
    include("checkSession.php");
    ?>
</body>
</html>
