<html>
<form action="carrera.php" method="post">
<?php
$nombre=$_GET["txtNombre"]; 
$cantidadSemestres=$_GET["txtCantidadSemestres"]; 
$descripcion=$_GET["txtDescripcion"]; 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "escuela";
$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO carrera(nombre,cantidad_semestres,descripcion) VALUES ('".$nombre."','".$cantidadSemestres."','".$descripcion."')";
if ($conn->query($sql) === TRUE) 
{
   $conn->close();
   header("Location:http://localhost:8080/web/proyectoFinal/carrera.php");
   exit();
}
else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
    $conn->close();
}
?>
</form>
</html>