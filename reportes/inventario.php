<?php
require ('fpdf/fpdf.php');
require ('../comprusr.php');
include ('../conect.php');
class PDF extends FPDF
{
    function Footer(){

        $this->setY(-15);
        $this->setFont('Arial','I',8);
        $this->cell(0,10,'page '.$this->PageNo().'/{nb}',0,0,'C');



    }
}



$str="Presentación";
$str = iconv('UTF-8', 'windows-1252', $str);
$pdf= new PDF();
$pdf->AliasNbPages();
$pdf->addPage('P','Letter');
$pdf->setFont('arial','',10);
$pdf->cell(18,10,'ASOMOL',0);
$pdf->cell(150,10,'',0);
$pdf->setFont('arial','',9);
$pdf->cell(30,10,date('d/m/Y'),0);
$pdf->ln(15);
$pdf->setFont('Arial','B',11);
$pdf->cell(70);
$pdf->cell(60,8,'LISTADO DE PRODUCTOS',0,'C');
$pdf->ln(23);
$pdf->setFont('Arial','B',8);
$pdf->cell(10,8,'',0);
$pdf->cell(15,8,'Id',0);
$pdf->cell(10,8,'',0);
$pdf->cell(30,8,'Producto',0);
$pdf->cell(10,8,'',0);
$pdf->cell(30,8,'Cantidad',0);
$pdf->cell(10,8,'',0);
$pdf->cell(30,8,'Tipo Producto',0);
$pdf->cell(10,8,'',0);
$pdf->cell(50,8,$str,0);

$pdf->ln(8);
$pdf->setFont('Arial','',8);
$sql=('SELECT prod.id, prod.descripcion as des1, cantidad, tp.descripcion as des2, pp.descripcion as des3 FROM Producto as prod inner join tipoProd as tp on tp.id = tipoProd_id inner join presentacionProducto as pp on pp.id = presentacionProducto_id');

$resultado= $con->query($sql);

while($obj=$resultado->fetch_object()){
$pdf->cell(10,8,'',0);
$pdf->cell(15,8,$obj->id,0);
$pdf->cell(10,8,'',0);
$pdf->cell(30,8,$obj->des1,0);
$pdf->cell(10,8,'',0);
$pdf->cell(30,8,$obj->cantidad,0);
$pdf->cell(10,8,'',0);
$pdf->cell(30,8,$obj->des2,0);
$pdf->cell(10,8,'',0);
$pdf->cell(50,8,$obj->des3,0);
$pdf->ln(8);
}

$pdf->output();

?>
