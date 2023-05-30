<?php
require ("conn.php");
$consulta="SELECT * from asignatura 
INNER JOIN carrera ON asignatura.idCarrera = carrera.idCarrera
WHERE estatusAsignatura = 1"; 
$datos = $conn->query($consulta);
$resultado = $conn->query($consulta);

$asignaturas = array(); // Array para almacenar los datos

while ($row = $resultado->fetch_assoc()) {
    $asignatura = array(
        'Asignatura' => $row['nombreAsignatura'],
        'Descripcion' => $row['descripcionAsignatura'],
        'Carrera' => $row['nombre'],
        'CantidadSemestre' => $row['cantidad_semestres'],
        'DescripcionCarrera' => $row['descripcion'],
        'Estatus' => $row['estatusAsignatura']
    );

    $asignaturas[] = $asignatura; // Agregar la asignatura al array de asignaturas
}

$conn->close();

$json = json_encode($asignaturas); // Convertir el array a formato JSON

header('Content-type: application/json');
header('Content-Disposition: attachment; filename="Asignatura.json"');
header('Content-Length: ' . strlen($json));

echo $json;
exit();
?>
