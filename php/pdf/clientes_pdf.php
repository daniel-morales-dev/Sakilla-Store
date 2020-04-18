<?php 

include 'pdf.php';
include_once '../clientes/modelo_cliente.php';

$cliente = new Cliente();
$lista = $cliente->listar();

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(255, 207, 17);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,6,'ID',1,0,'C',1);
$pdf->Cell(60,6,'NOMBRE',1,0,'C',1);
$pdf->Cell(70,6,'DIRECCION',1,0,'C',1);
$pdf->Cell(40,6,'TELEFONO',1,1,'C',1);

$pdf->SetFillColor(224, 235, 255);
$pdf->SetFont('Arial','',10);

foreach ($lista as $value) {

    $pdf->Cell(20,6,$value['id'],1,0,'C');
    $pdf->Cell(60,6,utf8_decode($value['nombre']),1,0,'C');
    $pdf->Cell(70,6,utf8_decode($value['direccion']),1,0,'C');
    $pdf->Cell(40,6,$value['telefono'],1,1,'C');
}

$pdf->Output();

 ?>