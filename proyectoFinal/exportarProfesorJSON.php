<?php
require ("conn.php");
$consulta="SELECT * FROM profesor WHERE estatus = 1";
$resultado = $conn->query($consulta);

$profesores = array(); // Array para almacenar los datos

while ($row = $resultado->fetch_assoc()) {
    $profesor = array(
        'Nombre' => $row['nombre'],
        'ApellidoPaterno' => $row['apellido_paterno'],
        'ApellidoMaterno' => $row['apellido_materno'],
        'Especialidad' => $row['especialidad'],
        'Telefono' => $row['telefono'],
        'Estatus' => $row['estatus']
    );

    $profesores[] = $profesor; // Agregar el profesor al array de profesores
}

$conn->close();

$json = json_encode($profesores); // Convertir el array a formato JSON

header('Content-type: application/json');
header('Content-Disposition: attachment; filename="Profesor.json"');
header('Content-Length: ' . strlen($json));

echo $json;
exit();
?>
