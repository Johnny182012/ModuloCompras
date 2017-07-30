<?php

require('../fpdf/fpdf.php');

class PDF extends FPDF {

    //Cabecera de página
    function Header() {
        $this->Image('../img/logop.png');
        $this->Image('../img/logou.png');

        $this->SetFont('Arial', 'B', 12);
        $this->Cell(10, 10, 'UNIVERSIDAD TENCNICA DEL NORTE');
    }

    //Pie de página
    function Footer() {
//Posición: a 1,5 cm del final
        $this->SetY(-15);
//Arial italic 8
        $this->SetFont('Arial', 'I', 8);
//Número de página
        $this->Cell(0, 10, 'PAGINA  ' . $this->PageNo(), 0, 0, 'C');
    }

}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);
//Aquí escribimos lo que deseamos mostrar...
$pdf->Ln();
$pdf->Ln();
$listaClientes = 'fsfdsf';
$pdf->Cell(40, 10, $listaClientes);
//$pdf->Cell(40, 10,$listado );
$pdf->AddPage();
$pdf->Output();
?>



