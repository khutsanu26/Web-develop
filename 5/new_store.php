<html>
<head><title> Добавление нового автосалона </title></head>
<body>
<H2>Добавление нового автосалона:</H2>
<?php include("checks.php"); ?>
<form action="save_new_store.php" method="get">
    Название: <input name="name_as" size="50" type="text">
    <br>Адрес: <input name="address" size="50" type="text">
    <p><input name="add" type="submit" value="Добавить">
        <input name="b2" type="reset" value="Очистить"></p>
</form>
<?php
if ($_SESSION['type'] == 1)
    echo "<p><a href=stores.php> Вернуться к списку автосалонов </a>";
elseif ($_SESSION['type'] == 2)
    echo "<p><a href=storesAdm.php> Вернуться к списку автосалонов </a>";
?>
</body>
</html>
