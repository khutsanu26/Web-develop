<?
if ($_POST["a"]) {
  echo ("Большее из двух чисел a = $a");
  print_r($_POST["a"]);
} else {
  $_POST["a"]<$_POST["b"];
  echo ("Большее из двух чисел b =$b");
  print_r($_POST["b"]);
  }
echo ("<BR> <A href='lab-3-1.html'> Назад </A>");
?>