<?php
require('../pdf/fpdf.php');
require('config.php');

date_default_timezone_set("America/Bogota");


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
//$pdf->Image('../imagenes/logo.png',10,10,-150);
$pdf->Ln(20);
$pdf->Cell(90,20,'Fecha: '.date('d.m.Y.H.i.s').'',0);
$pdf->Ln(10);
$pdf->Cell(100,20,utf8_decode('REPORTES PDF'));
$pdf->Ln(10);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(20,20,'CÓDIGO');
$pdf->Cell(25,20,'NOMBRE_PRODUCTO');
$pdf->Cell(25,20,'MARCA');
$pdf->Cell(40,20,'PRECIO');
$pdf->Cell(45,20,'CANTIDAD');

$pdf->Ln(10);

$pdf->SetFont('Arial','',8);


$query_select = 'SELECT * FROM producto';
$result = mysqli_query($conec, $query_select);

if (mysqli_num_rows($result) > 0) {

    // Muestra datos de cada columna
    while($reg = mysqli_fetch_assoc($result)) {
    	


$pdf->Cell(20,20, $reg['codigo'], 0);

$pdf->Cell(25,20, utf8_decode($reg['nom_produc']), 0);

$pdf->Cell(25,20, utf8_decode($reg['marca']), 0);

$pdf->Cell(40,20, utf8_decode($reg['precio']), 0);

$pdf->Cell(45,20, utf8_decode($reg['cantidad']), 0);

$pdf->Ln(10);

}
}

$pdf->Output();
mysqli_close($conec);
?>
