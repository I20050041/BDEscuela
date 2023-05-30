<html>
<form action="asignatura.php" method="post">
<?php
$nombre=$_GET["txtNombre"]; 
$descripcion=$_GET["txtDescripcion"];
$idCarrera=$_GET["txtCarreraNombre"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "escuela";
$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO asignatura(nombreAsignatura,descripcionAsignatura,idCarrera) VALUES ('".$nombre."','".$descripcion."','".$idCarrera."')";
if ($conn->query($sql) === TRUE) 
{
   $conn->close();
   header("Location:http://localhost:8080/web/proyectoFinal/asignatura.php");
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