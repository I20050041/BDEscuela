<?php
require ("conn.php");
require('vendor/autoload.php');

$consulta = "Select * from carrera WHERE estatus = 1";
$datos = $conn->query($consulta);
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="carrera.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, array('Nombre', 'Cantidad semestre', 'Descripcion','Estatus'));

while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['nombre'],
        $rows['cantidad_semestres'],
        $rows['descripcion'],
        $rows['estatus'],
    ));
}
fclose($output);
exit;
    ?>