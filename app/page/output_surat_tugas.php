<?php 
require('../../fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','BU',20);
$pdf->Cell(50);
$pdf->Cell(80,10,'Surat Perintah Tugas');

$pdf->SetFont('Arial','',13);
$pdf->Cell(-90);
$pdf->Cell(10,20,'Nomor : SP. Gas / 11 - BRTS / I / 2016 / BNNP');
$pdf->output();