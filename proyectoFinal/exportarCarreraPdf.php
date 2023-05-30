<?php
require('pdf/fpdf.php');

class PDF extends FPDF
{
function Header()
{

    $this->SetFont('Arial','B',13);
    $this->Cell(60);
   $this->Cell(70,10,'Reporte de la Carrera ',0,0,'C');
    $this->Ln(20);

    $this->Cell(35,10,'Nombre',1,0,'C',0);
    $this->Cell(25,10,'Semestres',1,0,'C',0);
    $this->Cell(100,10,'Descripcion',1,0,'C',0);
    $this->Cell(25,10,'Estatus',1,1,'C',0);


}

function Footer()
{
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
}
}

require ("conn.php");
$consulta="SELECT * from carrera where estatus = 1";
$resultado = mysqli_query($conn, $consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);

while ($row=$resultado->fetch_assoc()) {
    $pdf->Cell(35,10,$row['nombre'],1,0,'C',0);
    $pdf->Cell(25,10,$row['cantidad_semestres'],1,0,'C',0);
    $pdf->Cell(100,10,$row['descripcion'],1,0,'C',0);
    $pdf->Cell(25,10,$row['estatus'],1,1,'C',0);

} 

$pdf->Output('Carrera.pdf', 'I');
?>