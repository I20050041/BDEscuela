<?php
require('pdf/fpdf.php');

class PDF extends FPDF
{
function Header()
{

    $this->SetFont('Arial','B',13);
    $this->Cell(60);
   $this->Cell(70,10,'Reporte de la Asignatura ',0,0,'C');
    $this->Ln(20);

    $this->Cell(25,10,'Nombre',1,0,'C',0);
    $this->Cell(55,10,'Descripcion',1,0,'C',0);
    $this->Cell(35,10,'Carrera',1,0,'C',0);
    $this->Cell(10,10,'N',1,0,'C',0);
    $this->Cell(80,10,'Descripcion carrera',1,1,'C',0);
}

function Footer()
{
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
}
}

require ("conn.php");
$consulta="SELECT * from asignatura 
INNER JOIN carrera ON asignatura.idCarrera = carrera.idCarrera
WHERE estatusAsignatura = 1"; 
$resultado = mysqli_query($conn, $consulta);
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);

while ($row=$resultado->fetch_assoc()) {
    $pdf->Cell(25,10,$row['nombreAsignatura'],1,0,'C',0);
    $pdf->Cell(55,10,$row['descripcionAsignatura'],1,0,'C',0);
    $pdf->Cell(35,10,$row['nombre'],1,0,'C',0);
    $pdf->Cell(10,10,$row['cantidad_semestres'],1,0,'C',0);
    $pdf->Cell(80,10,$row['descripcion'],1,1,'C',0);

} 

$pdf->Output('Asignatura.pdf', 'I');
?>