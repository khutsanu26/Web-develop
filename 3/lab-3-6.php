<?php
//1
if (isset($_POST["firstButton"])) {
    $char = array("а", "е", "ё", "и", "о", "у", "ы", "э", "ю", "я");
    $string = mb_str_split($_POST["text1"]);
    $count = strlen($_POST["text1"]);
    $sum = 0;
    for ($i = 0; $i < 10; $i++) {
        for ($k = 0; $k <= $count; $k++) {
            if ($char[$i] == $string[$k]){ 
                $sum++;
            }
            if ($k == $count){ 
                echo($char[$i]." - " . $sum. "<br>");
                 $sum = 0;
            }
        }
        
    }

function mb_str_split($str, $l = 0)
{
    if ($l > 0) {
        $ret = array();
        $len = mb_strlen($str, "UTF-8");
        for ($i = 0; $i < $len; $i += $l) {
            $ret[] = mb_substr($str, $i, $l, "UTF-8");
        }
        return $ret;
    }
    return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
}
}

//2
if (isset($_POST["secondButton"])) {
    $ch = array(". ", "!", "?", "...");
    $pre=0;
     for ($i = 0; $i < 4; $i++) {
    $pre=$pre+mb_substr_count($_POST["text2"],$ch[$i]);
    }
echo("Количество предложений: ".$pre);
}

//3
if (isset($_POST["thirdButton"])) {
$r1="";
print("Исходная строка:<br /> ".$_POST['text3']."<br><br>" );
$b=$_POST['a1'].$_POST['a2'];
$str1=str_replace($b,'',$_POST['text3']);
print("Преобразованная строка:<br /> ".str_replace(mb_strtoupper($b, 'UTF-8'),'',$str1));
 
}
?>