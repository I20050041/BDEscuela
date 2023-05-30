<html>
<form action="grupo.php" method="post">
<?php
$grado=$_GET["txtGrado"]; 
$seccion=$_GET["txtSeccion"]; 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "escuela";
$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO grupo(grado,seccion) VALUES ('".$grado."','".$seccion."')";
if ($conn->query($sql) === TRUE) 
{
   $conn->close();
   header("Location:http://localhost:8080/web/proyectoFinal/grupo.php");
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