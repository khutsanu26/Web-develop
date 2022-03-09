<html>
<head><title> Добавление нового Автомобиля </title></head>
<body>
<H2>Добавление нового Автомобиля:</H2>
<form action="save_new_avail.php" method="get">
    <?php
    include ("checks.php");
    require_once 'connect1.php';
    $mysqli = new mysqli($host, $user, $password, $database);
    if ($mysqli->connect_errno) {
        echo "Невозможно подключиться к серверу";
    }

    $result = $mysqli->query("SELECT id_au, mark FROM auto");
    echo "<br>Автомобиль: <select name='id_au'>";

    if ($result) {
        while ($row = $result->fetch_array()) {
            $id_au = $row['id_au'];
            $mark = $row['mark'];
            echo "<option value='$id_au'>$mark</option>";
        }
    }
    echo "</select>";

    $result = $mysqli->query("SELECT id_as, name_as FROM autos");
    echo "<br>Магазин: <select name='id_as'>";

    if ($result) {
        while ($row = $result->fetch_array()) {
            $id_as = $row['id_as'];
            $name_as = $row['name_as'];
            echo "<option value='$id_as'>$name_as</option>";
        }
    }
    echo "</select>";

    print "<br> стоимость: <input name='price' size='11' type='int' value=$price>";
    echo "<p><input name='add' type='submit' value='Добавить'></p>";
    echo "<p><input name='b2' type='reset' value='Очистить'></p>";
    if ($_SESSION['type'] == 1)
        echo "<p><a href=avail.php> Вернуться к списку Автомобилей </a></p>";
    elseif ($_SESSION['type'] == 2)
        echo "<p><a href=availAdm.php> Вернуться к списку Автомобилей </a></p>";
    ?>
</form>
</body>
</html>
