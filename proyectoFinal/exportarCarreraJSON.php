<?php
require ("conn.php");
$consulta="SELECT * FROM carrera WHERE estatus = 1";
$resultado = $conn->query($consulta);

$carreras = array();

while ($row = $resultado->fetch_assoc()) {
    $carrera = array(
        'Nombre' => $row['nombre'],
        'CantidadSemestre' => $row['cantidad_semestres'],
        'Descripcion' => $row['descripcion'],
        'Estatus' => $row['estatus']
    );

    $carreras[] = $carrera;
}

$conn->close();

$json = json_encode($carreras);

header('Content-type: application/json');
header('Content-Disposition: attachment; filename="Carrera.json"');
header('Content-Length: ' . strlen($json));

echo $json;
exit();
?>
