<?php 

include 'pdf.php';
include_once '../prestamos/modelo_prestamos.php';

session_start();

$prestamo = new Prestamos();
$lista = $prestamo->listar_pdf($_SESSION['fid']);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(255, 207, 17);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,6,'ID',1,0,'C',1);
$pdf->Cell(50,6,'EMPLEADO',1,0,'C',1);
$pdf->Cell(50,6,'CLIENTE',1,0,'C',1);
$pdf->Cell(70,6,'TIEMPO',1,1,'C',1);

$pdf->SetFillColor(224, 235, 255);
$pdf->SetFont('Arial','',10);

foreach ($lista as $value) {

    $pdf->Cell(20,6,$value['id'],1,0,'C');
    $pdf->Cell(50,6,utf8_decode($value['cliente']),1,0,'C');
    $pdf->Cell(50,6,utf8_decode($value['empleado']),1,0,'C');
    $pdf->Cell(70,6,$value['tiempo'],1,1,'C');
}

$pdf->Output();

 ?>