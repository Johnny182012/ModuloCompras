<?php

require_once '../model/Database.php';
require_once '../model/Cajero.php';

require('../fpdf/fpdf.php');

class PDF extends FPDF {

    //Cabecera de página
    function Header() {

        $this->Image('../img/logoup.png');
        $this->Ln(10);
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

$lista = array(
    "NOMBRE CAJERO","ESTADO CAJERO"
);

$pdf = new PDF();
$pdf->AddPage();

for ($i = 0; $i < count($lista); $i++) {
    $pdf->SetFont('Times', '', 12);
    $pdf->Cell(37, 20, $lista[$i], 1, 0, 'C');
}
$pdf->Ln( 10);
  if (isset($_SESSION['listaPR'])) {
                                        $listaPR = unserialize($_SESSION['listaPR']);
                                        foreach ($listaPR as $caj) {
                                            echo "<tr>";
                                            echo "<td>" . $caj->getNombreusuario() . "</td>";
                                            if ($caj->getEstadousuario() == 1) {
                                                echo "<td>Activo</td>";
                                                echo "</tr>";
                                            } else {
                                                echo "<td>Inactivo</td>";
                                                echo "</tr>";
                                            }
                                        }
                                    } else {
                                        echo "No se han cargado datos.";
                                    }
//$pdo = Database::connect();
//$sql = "select * from proveedor order by nombreproveedor";
//$resultado = $pdo->query($sql);
////transformamos los registros en objetos:
//$listado = array();
//foreach ($resultado as $res) {
//    $proveedor = new Proveedor($res['idproveedor'], $res['tipoidproveedor'], $res['nombreproveedor'], $res['fecnacproveedor'], $res['ciudnacproveedor'], $res['tipoproveedor'], $res['direccionproveedor'], $res['telefonoproveedor'], $res['emailproveedor'], $res['estadoproveedor']);
//
//    $idproveedor = $res['idproveedor'];
//    $tipoidproveedor = $res['tipoidproveedor'];
//    $nombreproveedor = $res['nombreproveedor'];
//    $fecnacproveedor = $res['fecnacproveedor'];
//    $ciudnacproveedor = $res['ciudnacproveedor'];
//    $tipoproveedor = $res['tipoproveedor'];
//    $direccionproveedor = $res['direccionproveedor'];
//    $telefonoproveedor = $res['telefonoproveedor'];
//    $emailproveedor = $res['emailproveedor'];
//    $estadoproveedor = $res['estadoproveedor'];
////Aquí escribimos lo que deseamos mostrar...
//    $pdf->Cell(37, 30, $idproveedor, 1, 0, 'C');
//    $pdf->Cell(37, 30, $tipoidproveedor, 1, 0, 'C');
//    $pdf->Cell(37, 30, $nombreproveedor, 1, 0, 'C');
//    $pdf->Cell(37, 30, $fecnacproveedor, 1, 0, 'C');
//    $pdf->Cell(37, 30, $ciudnacproveedor, 1, 0, 'C');
//    $pdf->Cell(37, 30, $tipoproveedor, 1, 0, 'C');
//    $pdf->Cell(37, 30, $direccionproveedor, 1, 0, 'C');
//    $pdf->Cell(37, 30, $telefonoproveedor, 1, 0, 'C');
//    $pdf->Cell(37, 30, $emailproveedor, 1, 0, 'C');
//    $pdf->Ln( 10);
//}
//Database::disconnect();
//$pdf->AddPage();
$pdf->Output();
?>
