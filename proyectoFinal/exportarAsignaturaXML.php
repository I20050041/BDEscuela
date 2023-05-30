<?php
require ("conn.php");
$consulta="SELECT * from asignatura 
INNER JOIN carrera ON asignatura.idCarrera = carrera.idCarrera
WHERE estatusAsignatura = 1"; 
$resultado = $conn->query($consulta);

$xml = new XMLWriter();
$xml->openURI('Asignatura.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

$xml->startElement('tabla');

while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('asignatura');
    $xml->writeElement('Asignatura', $row['nombreAsignatura']);
    $xml->writeElement('Descripcion', $row['descripcionAsignatura']);
    $xml->writeElement('Carrera', $row['nombre']);
    $xml->writeElement('CantidadSemestre', $row['cantidad_semestres']);
    $xml->writeElement('Descripcion', $row['descripcion']);
    $xml->writeElement('Estatus', $row['estatusAsignatura']);
    $xml->endElement(); 
}
$xml->endElement();
$xml->endDocument();
$xml->flush();

$conn->close();

header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="Asignatura.xml"');
header('Content-Length: ' . filesize('Asignatura.xml'));

readfile('Asignatura.xml');
exit();
?>