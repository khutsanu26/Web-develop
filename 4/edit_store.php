<html>
<head>
<title>  Редактирование данных о магазине </title>
</head>
<body>
<?php
require_once 'connect1.php';
$mysqli= new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
echo "Невозможно подключиться к серверу"; 
}// установление соединения с сервером
$id_as = $_GET['id_as'];

$result = $mysqli->query("SELECT name_as, address FROM autos WHERE id_as='$id_as'");
if ($result){
 while ($gm = $result->fetch_array()) {
 $name_as = $gm['name_as'];
 $address = $gm['address'];
 }}
 
print "<form action='save_edit_store.php' method='get'>";
print "Название: <input name='name_as' size='40' type='varchar'
value='$name_as'>";
print "<br>Адрес: <input name='address' size='40' type='text'
value='$address'>";
print "<input type='hidden' name='id_as' size='11' type='int'
value='$id_as'>";
print "<input type='submit' name='save' value='Сохранить'>";
print "</form>";
print "<p><a href='stores.php'> Вернуться к списку магазинов </a>";
?>
</body>
</html>