<?php
require ("conn.php");
require('vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$consulta="SELECT * from alumno 
INNER JOIN grupo ON alumno.idGrupo = grupo.idGrupo
INNER JOIN carrera ON alumno.idCarrera = carrera.idCarrera
WHERE estatusAl = 1";

$datos = $conn->query($consulta);

$excel = new Spreadsheet();
$hojaActiva =  $excel->getActiveSheet();
$hojaActiva->setTitle("Alumno");

$hojaActiva->setCellValue('A1', 'Nombre');
$hojaActiva->setCellValue('B1', 'Apellido Paterno');
$hojaActiva->setCellValue('C1', 'Apellido Materno');
$hojaActiva->setCellValue('D1', 'Matricula');
$hojaActiva->setCellValue('E1', 'Telefono');
$hojaActiva->setCellValue('F1', 'Grado');
$hojaActiva->setCellValue('G1', 'Seccion');
$hojaActiva->setCellValue('H1', 'Carrera');
$hojaActiva->setCellValue('I1', 'Cantidad semestre');
$hojaActiva->setCellValue('J1', 'Descripcion Carrera');
$hojaActiva->setCellValue('K1', 'Estatus');
$Fila = 2;

while($rows = $datos->fetch_assoc())
{
    $hojaActiva->getColumnDimension('A')->setWidth(20);
    $hojaActiva->setCellValue('A'.$Fila, $rows['nombreAl']);
    $hojaActiva->getColumnDimension('B')->setWidth(20);
    $hojaActiva->setCellValue('B'.$Fila, $rows['apellido_paterno']);
    $hojaActiva->getColumnDimension('C')->setWidth(20);
    $hojaActiva->setCellValue('C'.$Fila, $rows['apellido_materno']);
    $hojaActiva->getColumnDimension('D')->setWidth(20);
    $hojaActiva->setCellValue('D'.$Fila, $rows['matricula']);
    $hojaActiva->getColumnDimension('E')->setWidth(20);
    $hojaActiva->setCellValue('E'.$Fila, $rows['telefono']);
    $hojaActiva->getColumnDimension('F')->setWidth(20);
    $hojaActiva->setCellValue('F'.$Fila, $rows['grado']);
    $hojaActiva->getColumnDimension('G')->setWidth(20);
    $hojaActiva->setCellValue('G'.$Fila, $rows['seccion']);
    $hojaActiva->getColumnDimension('H')->setWidth(20);
    $hojaActiva->setCellValue('H'.$Fila, $rows['nombre']);
    $hojaActiva->getColumnDimension('I')->setWidth(20);
    $hojaActiva->setCellValue('I'.$Fila, $rows['cantidad_semestres']);
    $hojaActiva->getColumnDimension('J')->setWidth(20);
    $hojaActiva->setCellValue('J'.$Fila, $rows['descripcion']);
    $hojaActiva->getColumnDimension('K')->setWidth(20);
    $hojaActiva->setCellValue('K'.$Fila, $rows['estatus']);
    $Fila++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Alumno.xlsx"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;
    ?>