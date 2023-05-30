<?php
require ("conn.php");
require('vendor/autoload.php');

$consulta = "Select * from profesor WHERE estatus = 1";
$datos = $conn->query($consulta);
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="profesor.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, array('Nombre', 'Apellido Paterno', 'Apellido Materno','Especialidad','Telefono','Estatus'));

while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['nombre'],
        $rows['apellido_paterno'],
        $rows['apellido_materno'],
        $rows['especialidad'],
        $rows['telefono'],
        $rows['estatus'],
    ));
}
fclose($output);
exit;
    ?>