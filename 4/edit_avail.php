<html>
<head>
    <title> Редактирование данных о ключах </title>
</head>
<body>
<?php
require_once 'connect1.php';
$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Невозможно подключиться к серверу";
}// установление соединения с сервером

$id = $_GET['id'];
echo $id;
$prod = mysqli_query($mysqli, "SELECT
			avail.id,
			avail.price,

			auto.id_au as id_au,
			auto.mark as mark,

			autos.id_as as id_as,
			autos.name_as as name_as

			FROM avail
			LEFT JOIN auto ON avail.id_au=auto.id_au
			LEFT JOIN autos ON avail.id_as=autos.id_as
			WHERE avail.id='$id'"
);

if ($prod) {
    $prod = $prod->fetch_array();

    $id = $prod['id'];
    $price = $prod['price'];

    $id_as = $prod['id_as'];
    $name_as = $prod['name_as'];

    $id_au = $prod['id_au'];
    $mark = $prod['mark'];

}


print "<form action='save_edit_avail.php' method='get'>";

//работа
$result = $mysqli->query("SELECT id_au, mark FROM auto WHERE id_au <> '$id_au' ");
echo "<br>Марка:<select name='id_au'>";
echo "<option selected value='$id_au'>$mark</option>";
if ($result) {
    while ($row = $result->fetch_array()) {
        $id_au = $row['id_au'];
        $mark = $row['mark'];
        echo "<option value='$id_au'>$mark</option>";
    }
}
echo "</select>";

//работа с магазинами
$result = $mysqli->query("SELECT id_as, name_as FROM autos WHERE id_as <> '$id_as' ");
echo "<br>Автосалон: <select name='id_as'>";
echo "<option selected value='$id_as'>$name_as</option>";

if ($result) {
    while ($row = $result->fetch_array()) {
        $id_as = $row['id_as'];
        $name_as = $row['name_as'];
        echo "<option value='$id_as'>$name_as</option>";
    }
}
echo "</select>";


print "<br>Стоимость: <input name='price' size='11' type='int' value=$price>";
print "<input type='hidden' name='id' size='11' value=$id>";
print "<input  name='save' type='submit' value='Сохранить'>";
print "</form>";
print "<p><a href='avail.php'> Вернуться к списку Автомобилей </a>";
?>
</body>
</html>