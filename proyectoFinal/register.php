<?php
error_reporting(E_ALL & ~E_WARNING);
$text =$_POST['txtNombre']
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title></title> 
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">

</head>

<body>
 <form class="formulario" action="register.php" method="POST">   
    <h1>Registrate</h1>
     <div class="contenedor">
        <div class="input-contenedor text-center">
        <i class="bi bi-person-circle icon "></i>
        <input type="text" name="txtNombre" placeholder="Nombre Completo">
    </div>
        <div class="input-contenedor text-center">
        <i class="bi bi-person-circle icon "></i>
        <input type="text" name="txtApellidoPaterno" placeholder="Apellido Paterno">
    </div> 
        <div class="input-contenedor text-center">
        <i class="bi bi-person-circle icon "></i>
        <input type="text" name="txtApellidoMaterno" placeholder="Apellido Materno">           
    </div>
         
         <div class="input-contenedor text-center">
         <i class="bi bi-envelope-fill icon"></i>
         <input type="text" name="txtCorreo" placeholder="Correo Electronico">
         </div>

         <div class="input-contenedor text-center">
         <i class="bi bi-shield-lock-fill icon"></i>
         <input type="password" name="txtContraseña" placeholder="Contraseña">
        </div>
        <input type="submit" value="Registrate" class="button">
         <p>Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
         <p>¿Ya tienes una cuenta?<a class="link" href="login.php">Iniciar Sesion</a></p>
     </div>
    </form>
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
    $nombre = $_POST['txtNombre'];
    $apellidoP = $_POST['txtApellidoPaterno'];
    $apellidoM = $_POST['txtApellidoMaterno'];
    $correo = $_POST['txtCorreo'];
    $password = $_POST['txtContraseña'];

    // Consulta para verificar si el usuario ya existe
    $checkUserQuery = "SELECT * FROM usuario WHERE username = '$username'";
    $checkUserResult = $conn->query($checkUserQuery);

    if ($checkUserResult->num_rows == 0) {
        // Insertar nuevo usuario en la base de datos
        $insertUserQuery = "INSERT INTO usuario (nombre,apellidoPaterno,apellidoMaterno,correo,clave) VALUES ('$nombre','$apellidoP','$apellidoM','$correo', md5('$password'))";
        if ($conn->query($insertUserQuery) === TRUE) {
echo "Registro exitoso. ";
exit();
} else {
$error = "Error al registrar el usuario: " . $conn->error;
}
} else {
$error = "El nombre de usuario ya existe.";
}

?>
</body>
</html>
