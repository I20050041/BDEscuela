<?php
require ("conn.php");
$consulta="SELECT * from alumno 
INNER JOIN grupo ON alumno.idGrupo = grupo.idGrupo
INNER JOIN carrera ON alumno.idCarrera = carrera.idCarrera
WHERE estatusAl = 1";
$resultado = $conn->query($consulta);

$xml = new XMLWriter();
$xml->openURI('Alumno.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

$xml->startElement('tabla');

while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('alumno');
    $xml->writeElement('Nombre', $row['nombreAl']);
    $xml->writeElement('ApellidoPaterno', $row['apellido_paterno']);
    $xml->writeElement('ApellidoMaterno', $row['apellido_materno']);
    $xml->writeElement('Matricula', $row['matricula']);
    $xml->writeElement('Telefono', $row['telefono']);
    $xml->writeElement('Grado', $row['grado']);
    $xml->writeElement('Seccion', $row['seccion']);
    $xml->writeElement('Carrera', $row['nombre']);
    $xml->writeElement('CantidadSemestre', $row['cantidad_semestres']);
    $xml->writeElement('Descripcion', $row['descripcion']);
    $xml->writeElement('Estatus', $row['estatusAl']);
    $xml->endElement(); 
}
$xml->endElement();
$xml->endDocument();
$xml->flush();

$conn->close();

header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="Alumno.xml"');
header('Content-Length: ' . filesize('Alumno.xml'));

readfile('Alumno.xml');
exit();
?>