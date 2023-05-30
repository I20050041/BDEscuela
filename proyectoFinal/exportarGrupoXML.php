<?php
require ("conn.php");
$consulta="Select * from Grupo WHERE estatus = 1";
$resultado = $conn->query($consulta);

$xml = new XMLWriter();
$xml->openURI('Grupo.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

$xml->startElement('tabla');

while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('grupo');
    $xml->writeElement('Grado', $row['grado']);
    $xml->writeElement('Seccion', $row['seccion']);
    $xml->writeElement('Estatus', $row['estatus']);
    $xml->endElement(); 
}
$xml->endElement();
$xml->endDocument();
$xml->flush();

$conn->close();

header('Content-type: application/octet-stream');
header('Content-Disposition: attachment; filename="Grupo.xml"');
header('Content-Length: ' . filesize('Grupo.xml'));

readfile('Grupo.xml');
exit();
?>