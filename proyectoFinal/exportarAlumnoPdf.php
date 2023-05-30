<?php
require('pdf/fpdf.php');

class PDF extends FPDF
{
function Header()
{

    $this->SetFont('Arial','B',8);
    $this->Cell(60);
   $this->Cell(70,10,'Reporte del Alumno ',0,0,'C');
    $this->Ln(20);

    $this->Cell(20,10,'Nombre',1,0,'C',0);
    $this->Cell(25,10,'Apellido P',1,0,'C',0);
    $this->Cell(25,10,'Apellido M',1,0,'C',0);
    $this->Cell(25,10,'Matricula',1,0,'C',0);
    $this->Cell(25,10,'Telefono',1,0,'C',0);
    $this->Cell(10,10,'G',1,0,'C',0);
    $this->Cell(10,10,'S',1,0,'C',0);
    $this->Cell(25,10,'Carrera',1,0,'C',0);
    $this->Cell(10,10,'N',1,0,'C',0);
    $this->Cell(100,10,'Descripcion',1,1,'C',0);
}

function Footer()
{
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
}
}

require ("conn.php");
$consulta="SELECT * from alumno 
INNER JOIN grupo ON alumno.idGrupo = grupo.idGrupo
INNER JOIN carrera ON alumno.idCarrera = carrera.idCarrera
WHERE estatusAl = 1";
$resultado = mysqli_query($conn, $consulta);
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);

while ($row=$resultado->fetch_assoc()) {
    $pdf->Cell(20,10,$row['nombreAl'],1,0,'C',0);
    $pdf->Cell(25,10,$row['apellido_paterno'],1,0,'C',0);
    $pdf->Cell(25,10,$row['apellido_materno'],1,0,'C',0);
    $pdf->Cell(25,10,$row['matricula'],1,0,'C',0);
    $pdf->Cell(25,10,$row['telefono'],1,0,'C',0);
    $pdf->Cell(10,10,$row['grado'],1,0,'C',0);
    $pdf->Cell(10,10,$row['seccion'],1,0,'C',0);
    $pdf->Cell(25,10,$row['nombre'],1,0,'C',0);
    $pdf->Cell(10,10,$row['cantidad_semestres'],1,0,'C',0);
    $pdf->Cell(100,10,$row['descripcion'],1,1,'C',0);

} 

$pdf->Output('Alumno.pdf', 'I');
?>