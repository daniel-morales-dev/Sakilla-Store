<?php 

include 'pdf.php';
include_once '../pagos/modelo_pagos.php';

session_start();

$pago = new Pagos();
$lista = $pago->listar($_SESSION['fid']);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(255, 207, 17);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,6,'ID',1,0,'C',1);
$pdf->Cell(50,6,'EMPLEADO',1,0,'C',1);
$pdf->Cell(50,6,'CLIENTE',1,0,'C',1);
$pdf->Cell(30,6,'PRESTAMO',1,0,'C',1);
$pdf->Cell(40,6,'FECHA',1,1,'C',1);

$pdf->SetFillColor(224, 235, 255);
$pdf->SetFont('Arial','',10);

foreach ($lista as $value) {

    $pdf->Cell(20,6,$value['id'],1,0,'C');
    $pdf->Cell(50,6,utf8_decode($value['cliente']),1,0,'C');
    $pdf->Cell(50,6,utf8_decode($value['empleado']),1,0,'C');
    $pdf->Cell(30,6,$value['renta'],1,0,'C');
    $pdf->Cell(40,6,$value['fecha'],1,1,'C');
}

$pdf->Output();

 ?>