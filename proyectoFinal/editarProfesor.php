<?php
        $id=$_POST["idd"];
        $nombre=$_POST["nombre"];
        $apellidoPaterno=$_POST["ap"];
        $apellidoMaterno=$_POST["am"];
        $especialidad=$_POST["esp"];
        $telefono=$_POST["tel"];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "escuela";
        $conn = new mysqli($servername,$username,$password,$dbname);
        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        }
        $consulta= "SELECT * FROM profesor where estatus = 1";
$result = mysqli_query($conn,$consulta);
  if(!$result) 
  {
      echo "No se ha podido realizar la consulta";
  }
$colum = mysqli_fetch_array($result);
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
    <form class="formulario" method="get" action="profesorEditar.php">
    <h1>Modifica los datos del profesor</h1>
    <?php
            echo '<input type="hidden" name="id" value="'.$id.'">';
             ?>
     <div class="contenedor"> 
         <div class="input-contenedor text-center">
            <i class="bi bi-person-circle icon"></i>
            <?php
            echo ' <input type="text" name="txtNombre" class ="input"  placeholder="Nombre" value = "'.$nombre.'">'     
            ?>
            </div>
         <div class="input-contenedor text-center">
         <i class="bi bi-person-circle icon"></i>
         <?php 
         echo '<input type="text" name="txtApellidoPaterno" class ="input" placeholder="Apellido Paterno" value = "'.$apellidoPaterno.'">'
         ?>    
         </div>
         <div class="input-contenedor text-center">
            <i class="bi bi-person-circle icon"></i>
            <?php
            echo '<input type="text" name="txtApellidoMaterno" class ="input" placeholder="Apellido Materno" value = "'.$apellidoMaterno.'">' 
            ?>        
         </div>
         <div class="input-contenedor text-center">
            <i class="bi bi-mortarboard"></i>
            <?php
            echo '<input type="text" name="txtEspecialidad" class ="input" placeholder="Especialidad" value = "'.$especialidad.'">'
            ?>         
         </div>
         <div class="input-contenedor text-center">
            <i class="bi bi-telephone-fill"></i>
            <?php
            echo '<input type="text" name="txtTelefono" class ="input" placeholder="Telefono" value = "'.$telefono.'">'  
            ?>   
         </div>
         </div>
         <a class="bx bx-log-out" href="profesorEditar.php"></a>
         <input type="submit" value="Modificar" class="button">

     </div>
    </form>
</body>
</html>

