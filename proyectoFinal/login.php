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
    <form class="formulario" method="POST" action="log.php">
    
    <h1>Login</h1>
     <div class="contenedor">
     
         <div class="input-contenedor text-center">
            <i class="bi bi-person-circle icon"></i>
            <input type="text" name="txtCorreo" class ="input" placeholder="Correo Electronico">
         
         </div>
         
         <div class="input-contenedor icon text-center">
            <i class="bi bi-shield-lock-fill"></i>
            <input type="password" name="txtContraseña" class ="input" placeholder="Contraseña">
         
         </div>
         <input type="submit" value="Login" class="button">
         
         <p>Al registrarte, aceptas nuestras Condiciones de uso y Política de privacidad.</p>
         <p>¿No tienes una cuenta? <a class="link" href="register.php">Registrate </a></p>
     </div>
    </form>
</body>
</html>