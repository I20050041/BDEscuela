<?php
require ("conn.php");
$consulta="Select * from carrera WHERE estatus = 1";
$resultado = $conn->query($consulta);

$xml = new XMLWriter();
$xml->openURI('Carrera.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

$xml->startElement('tabla');

while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('carrera');
    $xml->writeElement('Nombre', $row['nombre']);
    $xml->writeElement('CantidadSemestre', $row['cantidad_semestres']);
    $xml->writeElement('Descripcion', $row['descripcion']);
    $xml->writeElement('Estatus', $row['estatus']);
    $xml->endElement(); 
}
$xml->endElement();
$xml->endDocument();
$xml->flush();

$conn->close();

header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="Carrera.xml"');
header('Content-Length: ' . filesize('Carrera.xml'));

readfile('Carrera.xml');
exit();
?>