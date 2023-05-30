<?php
require ("conn.php");
$consulta="Select * from profesor WHERE estatus = 1";
$resultado = $conn->query($consulta);

$xml = new XMLWriter();
$xml->openURI('Profesor.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

$xml->startElement('tabla');

while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('profesor');
    $xml->writeElement('Nombre', $row['nombre']);
    $xml->writeElement('ApellidoPaterno', $row['apellido_paterno']);
    $xml->writeElement('ApellidoMaterno', $row['apellido_materno']);
    $xml->writeElement('Especialidad', $row['especialidad']);
    $xml->writeElement('Telefono', $row['telefono']);
    $xml->writeElement('Estatus', $row['estatus']);
    $xml->endElement(); 
}
$xml->endElement();
$xml->endDocument();
$xml->flush();

$conn->close();

header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="Profesor.xml"');
header('Content-Length: ' . filesize('Profesor.xml'));

readfile('Profesor.xml');
exit();
?>