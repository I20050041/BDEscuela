<?php
require ("conn.php");
require('vendor/autoload.php');

$consulta="SELECT * from asignatura 
INNER JOIN carrera ON asignatura.idCarrera = carrera.idCarrera
WHERE estatusAsignatura = 1"; $datos = $conn->query($consulta);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="asignatura.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, array('Nombre', 'Descripcion', 'Carrera','Cantidad Semestre','Descripcion Carrera','Estatus'));

while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['nombreAsignatura'],
        $rows['descripcionAsignatura'],
        $rows['nombre'],
        $rows['cantidad_semestres'],
        $rows['descripcion'],
        $rows['estatusAsignatura'],
    ));
}
fclose($output);
exit;
    ?>