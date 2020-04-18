<?php 

include 'pdf.php';
include_once '../inventario/modelo_inventario.php';

$inventario = new inventario();
$lista = $inventario->listar();

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(255, 207, 17);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,6,'ID',1,0,'C',1);
$pdf->Cell(70,6,'PELICULA',1,0,'C',1);
$pdf->Cell(50,6,'TIENDA',1,1,'C',1);

$pdf->SetFillColor(224, 235, 255);
$pdf->SetFont('Arial','',10);

foreach ($lista as $value) {

    $pdf->Cell(20,6,$value['id'],1,0,'C');
    $pdf->Cell(70,6,utf8_decode($value['film']),1,0,'C');
    $pdf->Cell(50,6,utf8_decode($value['store']),1,1,'C');
    
}

$pdf->Output();

 ?>