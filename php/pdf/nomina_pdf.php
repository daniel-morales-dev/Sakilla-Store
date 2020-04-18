<?php 

include 'pdf.php';
include_once '../nomina/modelo_nomina.php';

$nomina = new nomina();
$lista = $nomina->listar();

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(255, 207, 17);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,6,'ID',1,0,'C',1);
$pdf->Cell(60,6,'EMPLEADO',1,0,'C',1);
$pdf->Cell(30,6,'TIENDA',1,1,'C',1);
//$pdf->Cell(40,6,'DIAS LABORADOS',1,0,'C',1);
//$pdf->Cell(40,6,'NETO A PAGAR',1,1,'C',1);

$pdf->SetFillColor(224, 235, 255);
$pdf->SetFont('Arial','',10);

foreach ($lista as $value) {

    $pdf->Cell(20,6,$value['nomina_id'],1,0,'C');
    $pdf->Cell(60,6,utf8_decode($value['empleado']),1,0,'C');
    $pdf->Cell(30,6,utf8_decode($value['store']),1,1,'C');
    //$pdf->Cell(70,6,utf8_decode($value['dias']),1,0,'C');
    //$pdf->Cell(40,6,$value['neto a pagar'],1,1,'C');
}

$pdf->Output();

 ?>