<?php
        $id=$_POST["idd"];
        $nombre=$_POST["nombre"];
        $descripcion=$_POST["descripcion"];
        $idCarrera=$_POST["idCarrera"];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "escuela";
        $conn = new mysqli($servername,$username,$password,$dbname);
        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        }
        $consulta="Select * from asignatura
        INNER JOIN carrera ON asignatura.idCarrera = carrera.idCarrera
        WHERE estatusAsignatura = 1";
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
    <form class="formulario" method="get" action="asignaturaEditar.php">
    <h1>Modifica los datos de la Asignatura</h1>
    <?php
            echo '<input type="hidden" name="id" value="'.$id.'"';
             ?>
     <div class="contenedor"> 
     <div class="input-contenedor text-center">
            <i class="bi bi-mortarboard icon"></i>
            <?php
            echo '<input type="text" name="txtNombre" class ="input" placeholder="Nombre" value="'.$nombre.'">'
            ?>      
         </div>
         <div class="input-contenedor text-center">
            <i class="bi bi-chat-right-text-fill icon"></i>
            <?php
            echo '<input type="text" name="txtDescripcion" class ="input" placeholder="Descripcion" value="'.$descripcion.'">'
            ?>   
         </div>
            <select class = "form-select mb-3" name="txtCarreraNombre">
            <option selected disabled>--Selecciona la carrera--</option>
            <div class="input-contenedor text-center">
            <?php
             require_once('config.inc.php');
             $conn = new mysqli($servername,$username,$password,$dbname);
             $consulta="select * from carrera where estatus = 1";
             $datos = $conn->query($consulta);
             while ($registro = mysqli_fetch_array($datos)) 
             {
                echo "<option selected value='".$registro['idCarrera']."'>".$registro['nombre']."</option>";
            }
            ?>  
            </div> 
         </div>
         <a class="bx bx-log-out" href="asignaturaEditar.php"></a>
         <input type="submit" value="Modificar" class="button">
     </div>
    </form>
</body>
</html>