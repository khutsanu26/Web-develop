<?php
include("checks.php");
require_once 'connect1.php';
require('tfpdf/tfpdf.php');

$mysqli = new mysqli($host, $user, $password, $database);
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к БД";
}

$pdf = new tFPDF();
$pdf->AddFont('PDFFont', '', 'cour.ttf');
$pdf->SetFont('PDFFont', '', 12);
$pdf->AddPage();

$pdf->Cell(80);
$pdf->Cell(30, 10, 'Автомобили', 1, 0, 'C');
$pdf->Ln(20);

$pdf->SetFillColor(200, 200, 200);
$pdf->SetFontSize(6);

$header = array("п/п", "Марка", "Модель", "Год выпуска", "Трансмиссия", "Стоимость", "Название Автосалона", "Адрес");
$w = array(6, 20, 25, 20, 20, 20, 30, 17);
$h = 20;
for ($c = 0; $c < 8; $c++) {
    $pdf->Cell($w[$c], $h, $header[$c], 'LRTB', '0', '', true);
}
$pdf->Ln();

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

if ($result) {
    $counter = 1;
    // Для каждой строки из запроса
    while ($row = $result->fetch_row()) {
        $pdf->Cell($w[0], $h, $counter, 'LRBT', '0', 'C', true);
        $pdf->Cell($w[1], $h, $row[0], 'LRB');

        for ($c = 2; $c < 8; $c++) {
            $pdf->Cell($w[$c], $h, $row[$c - 1], 'RB');
        }
        $pdf->Ln();
        $counter++;
    }
}

$pdf->Output("I", 'auto.pdf', true);
?>