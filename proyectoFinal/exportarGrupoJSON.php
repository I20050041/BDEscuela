<?php
require ("conn.php");
$consulta="SELECT * FROM Grupo WHERE estatus = 1";
$resultado = $conn->query($consulta);

$grupos = array();

while ($row = $resultado->fetch_assoc()) {
    $grupo = array(
        'Grado' => $row['grado'],
        'Seccion' => $row['seccion'],
        'Estatus' => $row['estatus']
    );

    $grupos[] = $grupo;
}

$conn->close();

$json = json_encode($grupos);

header('Content-type: application/json');
header('Content-Disposition: attachment; filename="Grupo.json"');
header('Content-Length: ' . strlen($json));

echo $json;
exit();
?>
