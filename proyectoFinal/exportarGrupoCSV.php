<?php
require ("conn.php");
require('vendor/autoload.php');

$consulta = "Select * from grupo WHERE estatus = 1";
$datos = $conn->query($consulta);
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="grupo.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, array('Grado', ' Seccion', 'Estatus'));

while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['grado'],
        $rows['seccion'],
        $rows['estatus'],
    ));
}
fclose($output);
exit;
    ?>