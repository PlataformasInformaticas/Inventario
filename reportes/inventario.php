<?php
require ('fpdf/fpdf.php');

$pdf= new FPDF();
$pdf->addPage();
$pdf->setFont('arial','',10);
$pdf->cell(18,10,'Asmol',1);
$pdf->cell(150,10,'',1);
$pdf->setFont('arial','',9);
$pdf->cell(30,10,date('d/m/Y'),1);
$pdf->ln(15);
$pdf->setFont('Arial','B',11);
$pdf->cell(65);
$pdf->cell(60,8,'LISTADO DE PRODUCTOS',1,'C');
$pdf->ln(23);
$pdf->setFont('Arial','B',8);
$pdf->cell(15,8,'Id',1);
$pdf->cell(50,8,'Producto',1);
$pdf->cell(30,8,'Cantidad',1);
$pdf->cell(50,8,'Tipo Producto',1);
$pdf->cell(50,8,'Presentacion',1);
$pdf->ln(8);
$pdf->setFont('Arial,'',8);


$pdf->output();



?>
