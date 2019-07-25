<?php
require '../fpdf/chinese.php';

// get data
$oilData = include 'returnOil.php';
$header = array('No', 'ChiName', 'EngName', 'NaOH', 'KOH', 'INS(Solid)', 'INS(Liquid)', 'Cost');
$counter = 1;
$additivesData = include 'returnAdditives.php';
$header2 = array('No', 'ChiName', 'EngName', 'Cost (RM)', 'Amount (g / ml)');
$counter2 = 1;

$pdf = new PDF_Chinese();
$pdf->AddGBFont('simhei', '黑体');
$pdf->AddPage();
$pdf->SetFont('simhei', '', 13);
$pdf->MultiCell(180, 15, iconv("utf-8", "gbk", "Oil Library"));

// Draw Oil Table
// Header
$pdf->Cell(10, 7, $header[0], 1);
$pdf->Cell(20, 7, $header[1], 1);
$pdf->Cell(50, 7, $header[2], 1);
$pdf->Cell(20, 7, $header[3], 1);
$pdf->Cell(20, 7, $header[4], 1);
$pdf->Cell(25, 7, $header[5], 1);
$pdf->Cell(25, 7, $header[6], 1);
$pdf->Cell(20, 7, $header[7], 1);
$pdf->Ln();
// Data
foreach ($oilData as $row) {
  $pdf->Cell(10, 6, $counter++, 1);
  $pdf->Cell(20, 6, iconv("utf-8", "gbk", $row[1]), 1);
  $pdf->Cell(50, 6, $row[2], 1);
  $pdf->Cell(20, 6, $row[3], 1);
  $pdf->Cell(20, 6, $row[4], 1);
  $pdf->Cell(25, 6, $row[5], 1);
  $pdf->Cell(25, 6, $row[6], 1);
  $pdf->Cell(20, 6, $row[7], 1);
  $pdf->Ln();
}

$pdf->MultiCell(180, 15, iconv("utf-8", "gbk", "Additives Library"));

// Draw Additives Table
// Header
$pdf->Cell(10, 7, $header2[0], 1);
$pdf->Cell(30, 7, $header2[1], 1);
$pdf->Cell(70, 7, $header2[2], 1);
$pdf->Cell(35, 7, $header2[3], 1);
$pdf->Cell(35, 7, $header2[4], 1);
$pdf->Ln();
// Data
foreach ($additivesData as $row) {
  $pdf->Cell(10, 7, $counter2++, 1);
  $pdf->Cell(30, 7, iconv("utf-8", "gbk", $row[1]), 1);
  $pdf->Cell(70, 7, $row[2], 1);
  $pdf->Cell(35, 7, $row[3], 1);
  $pdf->Cell(35, 7, $row[4], 1);
  $pdf->Ln();
}
$pdf->Ln();
$pdf->Output();
