<?php
        $id=$_POST["idd"];
        $grup=$_POST["grado"];
        $secc=$_POST["seccion"];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "escuela";
        $conn = new mysqli($servername,$username,$password,$dbname);
        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        }
        $consulta= "SELECT * FROM grupo where estatus = 1";
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
    <form class="formulario" method="get" action="grupoEditar.php">
    <h1>Modifica los datos de la Carrera</h1>
    <?php
            echo '<input type="hidden" name="id" value="'.$id.'"';
             ?>
     <div class="contenedor"> 
     <div class="input-contenedor text-center">
            <i class="bi bi-sort-numeric-down icon"></i>
            <?php
            echo '<input type="text" name="txtGrado" class ="input" placeholder="Grado" value="'.$grup.'">'    
            ?>    
         </div>
         <div class="input-contenedor text-center">
         <i class="bi bi-sort-alpha-down icon"></i>
         <?php
            echo '<input type="text" name="txtSeccion" class ="input" placeholder="Seccion" value="'.$secc.'">'    
            ?>   
         </div>
         </div>
         <a class="bx bx-log-out" href="grupoEditar.php"></a>
         <input type="submit" value="Modificar" class="button">
     </div>
    </form>
</body>
</html>

