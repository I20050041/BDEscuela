<html>
<form action="profesor.php" method="post">
<?php
$nombre=$_GET["txtNombre"]; 
$apellidoPaterno=$_GET["txtApellidoPaterno"]; 
$apellidoMaterno=$_GET["txtApellidoMaterno"]; 
$telefono=$_GET["txtTelefono"]; 
$especialidad=$_GET["txtEspecialidad"]; 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "escuela";
$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO profesor(telefono,nombre,apellido_paterno,apellido_materno,especialidad) VALUES ('".$telefono."','".$nombre."','".$apellidoPaterno."','".$apellidoMaterno."','".$especialidad."')";
if ($conn->query($sql) === TRUE) 
{
   $conn->close();
   header("Location:http://localhost:8080/web/proyectoFinal/profesor.php");
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
