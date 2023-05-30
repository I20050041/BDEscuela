<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="tableExport.js"></script>
<script type="text/javascript" src="jquery.base64.js"></script>
<script type="text/javascript" src="jspdf/libs/sprintf.js"></script>
<script type="text/javascript" src="jspdf/jspdf.js"></script>
<script type="text/javascript" src="jspdf/libs/base64.js"></script>
</head>
<script>
function confirmacion() 
    {
     var respuesta = confirm("¿Deseas realmente eliminar este registro?");
     if (respuesta == true) 
     {
      return true
     }
     else
     {
      return false;
     }
    }
</script>
<body>
  <nav class="navbar bg-primary">
    <div class="container-fluid">
      <a href="proceso.php" class="navbar-brand fw-bold text-light">Tabla del Profesor</a>
    </div>
  </nav>
  <div class="col-md-11">
        <table class="table table-bordered table-sm">
          <thead>
            <tr>
              <td class ="text-center">Nombre</td>
              <td class="text-center">Apellido Paterno</td>
              <td class="text-center">Apellido Materno</td>
              <td class="text-center">Especialidad</td>
              <td class="text-center">Telefono</td>
              <td class="text-center">Estatus</td>
              <td class="text-center">Eliminar</td>
              <td class="text-center">Modificar</td>
              <?php
        require_once('config.inc.php');
        $conn = new mysqli($servername,$username,$password,$dbname);
        $consulta="select * from profesor where estatus = 1";
        $datos = $conn->query($consulta);
        while ($registro = mysqli_fetch_array($datos)) 
        {
         echo ' </tr>
          </thead>
          <tbody>
            <tr>
              <td><h7> '.$registro ['nombre'].'</h7></td>
              <td><h7> '.$registro ['apellido_paterno'].'</h7></td>
              <td><h7>'.$registro ['apellido_materno'].'</h7></td>
              <td><h7> '.$registro ['especialidad'].'</h7></td>
              <td><h7>'.$registro ['telefono'].'</h7></td>
              <td><h7>'.$registro ['estatus']. '
              <td><h2><form action="eliminarProfesor.php" method="GET"> 
              <input type="hidden" name="id" value="'.$registro ['idProfesor'].'">
              <input class="btn btn-danger" type="submit" value="Eliminar" onclick="return confirmacion()">  
              </form></h7></td>
              <td><h2><form action="editarProfesor.php" method="POST"> 
              <input type="hidden" name="modificagrega" value="Modificar">
              <input type="hidden" name="idd" value="'.$registro ['idProfesor'].'">
              <input class="btn btn-warning" type="submit" value="Modificar" >
              <input type="hidden" name="nombre" value="'.$registro['nombre'].'">
              <input type="hidden" name="ap" value="'.$registro['apellido_paterno'].'">     
              <input type="hidden" name="am" value="'.$registro['apellido_materno'].'">
              <input type="hidden" name="esp" value="'.$registro['especialidad'].'">  
              <input type="hidden" name="tel" value="'.$registro['telefono'].'">                                
              </form></h2></td>
              <td></td>
            </tr>
          </tbody>'; 
        }
        $conn->close();
        ?>
            </tr>
          </thead>
        </table>
      <a href="diseñoProfesor.php">
      <input class="btn btn-primary btn-lg" type="submit" value="Registrar">
      </a>
      <but>
      </div>
    </div>
  </div>
  <br>
  <div class="btn-group">
  <br><label for="a">Exportar a:</label>
  <form action="exportarProfesorXLS.php" method="get">
  <button class = "btn btn-success" id="xls">XLS</button>
  </form>
  <form action="exportarProfesorCSV.php" method="get">
  <button class = "btn btn-success" id="csv">CSV</button>
  </form>
  <form action="exportarProfesorPdf.php" method="get">
  <button class = "btn btn-success" id="pdf">PDF</button>
  </form>
  <form action="exportarProfesorXML.php" method="get">
  <button class = "btn btn-success" id="xml">XML</button>
  </form>
  <form action="exportarProfesorJSON.php" method="get">
  <button class = "btn btn-success" id="json">JSON</button>
  </form>
  </form>
  </div>
</body>
</html>