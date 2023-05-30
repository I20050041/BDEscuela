<?php
// Establecer la conexión con la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "escuela";
$conn = new mysqli($servername, $username, $password, $dbname);
// Verificar la conexión
if ($conn->connect_error) {
    die("Error al conectar con la base de datos: " . $conn->connect_error);
}
error_reporting(E_ALL & ~E_WARNING);
    $usuario=$_POST["txtCorreo"];
    $clave=$_POST["txtContraseña"];
    
    $sql = "SELECT * FROM usuario WHERE correo='$usuario' AND clave= md5('$clave')";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
         header("Location:http://localhost:8080/web/proyectoFinal/proceso.php");
    }
    else 
    {
        echo '<div class ="alert alert-danger">ACCESO DENEGADO</div>';
    }
$conn->close();
?>