<html>
<form action="alumno.php" method="post">
<?php
$nombre=$_GET["txtNombre"]; 
$apellidoP=$_GET["txtApellidoPaterno"];
$apellidoM=$_GET["txtApellidoMaterno"];
$matricula=$_GET["txtMatricula"];
$telefono=$_GET["txtTelefono"];
$idCarrera=$_GET["txtCarreraNombre"];
$idGrupo=$_GET["txtGrupo"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "escuela";
$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO alumno(nombreAl,apellido_paterno,apellido_materno,matricula,telefono,idGrupo,idCarrera) VALUES ('".$nombre."','".$apellidoP."','".$apellidoM."','".$matricula."','".$telefono."','".$idGrupo."','".$idCarrera."')";
if ($conn->query($sql) === TRUE) 
{
   $conn->close();
   header("Location:http://localhost:8080/web/proyectoFinal/alumno.php");
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