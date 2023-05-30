<?php
require ("conn.php");
$consulta="SELECT alumno.*, grupo.grado, grupo.seccion, carrera.nombre AS nombreCarrera, carrera.cantidad_semestres, carrera.descripcion AS descripcionCarrera
FROM alumno 
INNER JOIN grupo ON alumno.idGrupo = grupo.idGrupo
INNER JOIN carrera ON alumno.idCarrera = carrera.idCarrera
WHERE estatusAl = 1";
$resultado = $conn->query($consulta);

$alumnos = array(); 

while ($row = $resultado->fetch_assoc()) {
    $alumno = array(
        'Nombre' => $row['nombreAl'],
        'ApellidoPaterno' => $row['apellido_paterno'],
        'ApellidoMaterno' => $row['apellido_materno'],
        'Matricula' => $row['matricula'],
        'Telefono' => $row['telefono'],
        'Grado' => $row['grado'],
        'Seccion' => $row['seccion'],
        'Carrera' => $row['nombreCarrera'],
        'CantidadSemestre' => $row['cantidad_semestres'],
        'DescripcionCarrera' => $row['descripcionCarrera'],
        'Estatus' => $row['estatusAl']
    );

    $alumnos[] = $alumno; 
}

$conn->close();

$json = json_encode($alumnos);

header('Content-type: application/json');
header('Content-Disposition: attachment; filename="Alumno.json"');
header('Content-Length: ' . strlen($json));

echo $json;
exit();
?>
