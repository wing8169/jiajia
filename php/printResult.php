<?php
session_start();
require '../fpdf/chinese.php';

// get data
if (isset($_SESSION["type"]) && isset($_SESSION["data1"]) && isset($_SESSION["data2"])) {
  $data1 = json_decode($_SESSION["data1"]);
  $data2 = json_decode($_SESSION["data2"]);
  $header = array('No', 'Add. Name', 'Original Cost (RM)', 'Amount used (g/ml)', 'Price (RM)');
  $header2 = array('No', 'Oil Name', "pct (%)", "Oil Amnt", "Sap.", "NaOH (g)", "INS Value", "Total INS");
  if ($_SESSION["type"] != "solid") {
    $header2 = array('No', 'Oil Name', "pct (%)", "Oil Amnt", "Sap.", "KOH (g)", "INS Value", "Total INS");
  }
}

$pdf = new PDF_Chinese();
$pdf->AddGBFont('simhei', '黑体');
$pdf->AddPage();
$pdf->SetFont('simhei', '', 13);
$pdf->MultiCell(180, 15, iconv("utf-8", "gbk", "Soap"));

// Draw Oil Table
// Header
$pdf->Cell(10, 7, $header2[0], 1);
$pdf->Cell(50, 7, $header2[1], 1);
$pdf->Cell(20, 7, $header2[2], 1);
$pdf->Cell(20, 7, $header2[3], 1);
$pdf->Cell(20, 7, $header2[4], 1);
$pdf->Cell(25, 7, $header2[5], 1);
$pdf->Cell(25, 7, $header2[6], 1);
$pdf->Cell(20, 7, $header2[7], 1);
$pdf->Ln();
// Data
foreach ($data2 as $row) {
  $pdf->Cell(10, 6, $row[0], 1);
  $pdf->Cell(50, 6, iconv("utf-8", "gbk", $row[1]), 1);
  $pdf->Cell(20, 6, $row[2], 1);
  $pdf->Cell(20, 6, $row[3], 1);
  $pdf->Cell(20, 6, $row[4], 1);
  $pdf->Cell(25, 6, $row[5], 1);
  $pdf->Cell(25, 6, $row[6], 1);
  $pdf->Cell(20, 6, $row[7], 1);
  $pdf->Ln();
}

$pdf->MultiCell(180, 15, iconv("utf-8", "gbk", "Additives Used"));

// Draw Additives Table
// Header
$pdf->Cell(10, 7, $header[0], 1);
$pdf->Cell(60, 7, $header[1], 1);
$pdf->Cell(40, 7, $header[2], 1);
$pdf->Cell(45, 7, $header[3], 1);
$pdf->Cell(25, 7, $header[4], 1);
$pdf->Ln();
// Data
foreach ($data1 as $row) {
  $pdf->Cell(10, 7, $row[0], 1);
  $pdf->Cell(60, 7, iconv("utf-8", "gbk", $row[1]), 1);
  $pdf->Cell(40, 7, $row[2], 1);
  $pdf->Cell(45, 7, $row[3], 1);
  $pdf->Cell(25, 7, $row[4], 1);
  $pdf->Ln();
}
$pdf->Ln();
$pdf->Output();
