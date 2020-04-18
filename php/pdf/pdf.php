<?php

require('fpdf.php');

class PDF extends FPDF {

    function Header() {

        $this->Image('../../img/logo.png',10,10,30);
        $this->SetFont('Arial','B',20);
        $this->SetTextColor(48, 59, 90);
        $this->Cell(1);
        $this->Cell(0,70,'SAKILA',0,0,'L');
        $this->Ln(45);
    	$this->SetFont('Arial','',14);

    }

    function Footer() {

        $this->SetY(-15);
        $this->SetFont('Arial','I', 8);
        $this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
        
    }  

}

 ?>
