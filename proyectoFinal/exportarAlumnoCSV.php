<?php
require ("conn.php");
require('vendor/autoload.php');

$consulta="SELECT * from alumno 
INNER JOIN grupo ON alumno.idGrupo = grupo.idGrupo
INNER JOIN carrera ON alumno.idCarrera = carrera.idCarrera
WHERE estatusAl = 1";$datos = $conn->query($consulta);
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="alumno.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, array('Nombre', 'Apellido Paterno', 'Apellido Materno','Matricula','Telefono','Grado','Seccion','Carrera','Cantidad Semestre','Descripcion Carrera','Estatus'));

while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['nombreAl'],
        $rows['apellido_paterno'],
        $rows['apellido_materno'],
        $rows['matricula'],
        $rows['telefono'],
        $rows['grado'],
        $rows['seccion'],
        $rows['nombre'],
        $rows['cantidad_semestres'],
        $rows['descripcion'],
        $rows['estatus'],
    ));
}
fclose($output);
exit;
    ?>