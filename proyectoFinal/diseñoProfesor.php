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
    <form class="formulario" method="get" action="profesorInsertar.php">
    <h1>Agrega los datos del profesor</h1>
     <div class="contenedor">

         <div class="input-contenedor text-center">
            <i class="bi bi-person-circle icon"></i>
            <input type="text" name="txtNombre" class ="input" placeholder="Nombre">        
         </div>
         <div class="input-contenedor text-center">
            <i class="bi bi-person-circle icon"></i>
            <input type="text" name="txtApellidoPaterno" class ="input" placeholder="Apellido Paterno">
         </div>
         <div class="input-contenedor text-center">
            <i class="bi bi-person-circle icon"></i>
            <input type="text" name="txtApellidoMaterno" class ="input" placeholder="Apellido Materno">        
         </div>
         <div class="input-contenedor text-center">
            <i class="bi bi-mortarboard"></i>
            <input type="text" name="txtEspecialidad" class ="input" placeholder="Especialidad">        
         </div>
         <div class="input-contenedor text-center">
            <i class="bi bi-telephone-fill"></i>
            <input type="text" name="txtTelefono" class ="input" placeholder="Telefono">        
         </div>
         </div>
         <a class="bx bx-log-out" href="profesor.php"></a>
         <input type="submit" value="Registrar" class="button">

     </div>
    </form>
</body>
</html>