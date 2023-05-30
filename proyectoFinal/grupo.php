<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
      <a href="proceso.php" class="navbar-brand fw-bold text-light">Tabla del grupo</a>
    </div>
  </nav>
  <div class="col-md-11">
        <table class="table table-bordered table-sm">
          <thead>
            <tr>
              <td class ="text-center">Grado</td>
              <td class="text-center">Seccion</td>
              <td class="text-center">Estatus</td>
              <td class="text-center">Eliminar</td>
              <td class="text-center">Modificar</td>
              <?php
        require_once('config.inc.php');
        $conn = new mysqli($servername,$username,$password,$dbname);
        $consulta="select * from grupo where estatus = 1";
        $datos = $conn->query($consulta);
        while ($registro = mysqli_fetch_array($datos)) 
        {
         echo ' </tr>
          </thead>
          <tbody>
            <tr>
              <td><h7> '.$registro ['grado'].'</h7></td>
              <td><h7> '.$registro ['seccion'].'</h7></td>
              <td><h7>'.$registro ['estatus']. '
              <td><h2><form action="eliminarGrupo.php" method="GET"> 
              <input type="hidden" name="id" value="'.$registro ['idGrupo'].'">
              <input class="btn btn-danger" type="submit" value="Eliminar" onclick="return confirmacion()">
              </form></h7></td>
              <td><h2><form action="editarGrupo.php" method="POST"> 
              <input type="hidden" name="modificar" value="Modificar">
              <input type="hidden" name="idd" value="'.$registro ['idGrupo'].'">
              <input class="btn btn-warning" type="submit" value="Modificar">
              <input type="hidden" name="grado" value="'.$registro['grado'].'">
              <input type="hidden" name="seccion" value="'.$registro['seccion'].'">
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
      <a href="diseñoGrupo.php">
      <input class="btn btn-primary btn-lg" type="submit" value="Registrar">
      </a>
      <but>
      </div>
    </div>
  </div>
  </form>
  <br>
  <div class="btn-group">
  <br><label for="a">Exportar a:</label>
  <form action="exportarGrupoXLS.php" method="get">
  <button class = "btn btn-success" id="xls">XLS</button>
  </form>
  <form action="exportarGrupoCSV.php" method="get">
  <button class = "btn btn-success" id="csv">CSV</button>
  </form>
  <form action="exportarGrupoPdf.php" method="get">
  <button class = "btn btn-success" id="pdf">PDF</button>
  </form>
  <form action="exportarGrupoXML.php" method="get">
  <button class = "btn btn-success" id="xml">XML</button>
  </form>
  <form action="exportarGrupoJSON.php" method="get">
  <button class = "btn btn-success" id="json">JSON</button>
  </form>
  </form>
  </div>
</body>
</html>