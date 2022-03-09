<?php
include("checks.php");
require_once 'connect1.php';
require_once('php_excel/Classes/PHPExcel.php');
require_once('php_excel/Classes/PHPExcel/Writer/Excel2007.php');

$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno){
    echo "Не удалось подключиться к БД";
}

// Запрос на выборку сведений о пользователях
$result = $mysqli->query("SELECT
        auto.mark as mark,
        auto.model as model,
        auto.year as `year`,
        auto.trans as trans,
        avail.price,
        autos.name_as as name_as,
        autos.address as address
        FROM avail
        LEFT JOIN auto ON avail.id_au=auto.id_au
        LEFT JOIN autos ON avail.id_as=autos.id_as"
);

$xls = new PHPExcel();
// Устанавливаем индекс активного листа
$xls->setActiveSheetIndex(0);
// Получаем активный лист
$sheet = $xls->getActiveSheet();
// Подписываем лист
$sheet->setTitle('Автомобили');
// Вставляем текст в ячейку A1
$sheet->setCellValue("A1", 'Автомобили');
$sheet->getStyle('A1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
$sheet->getStyle('A1')->getFill()->getStartColor()->setRGB('EEEEEE');
// Объединяем ячейки
$sheet->mergeCells('A1:I1');
// Выравнивание текста
$sheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$c = 0;

$header = array("п/п", "Марка", "Модель", "Год выпуска", "Трансмиссия", "Стоимость", "Название Автосалона", "Адрес");
foreach ($header as $h){
    $sheet->setCellValueByColumnAndRow($c,2,$h);
    // Применяем выравнивание
    $sheet->getColumnDimensionByColumn($c)->setAutoSize(true);
    $c++;
}

if ($result){
    $r = 3;
    // Для каждой строки из запроса
    while ($row = $result->fetch_row()){
        $c = 0;

        $sheet->setCellValueByColumnAndRow($c,$r,$r-2);
        $c++;

        foreach ($row as $cell){
            $sheet->setCellValueByColumnAndRow($c,$r,$cell);
            $c++;
        }
        $r++;
    }
}

header('Content-Type: application/xls');
header('Content-Disposition: inline; filename=auto.xls');
header('Cache-Control: private, max-age=0, must-revalidate');
header('Pragma: public');

$objWriter = new PHPExcel_Writer_Excel5($xls);
$objWriter->save('php://output');
?>