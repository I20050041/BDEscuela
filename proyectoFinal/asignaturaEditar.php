<?php
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "escuela";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $nombre=$_GET["txtNombre"]; 
    $descripcion=$_GET["txtDescripcion"]; 
    $idCarrera=$_GET["txtCarreraNombre"]; 
    $id=$_GET["id"];
   $sql = "UPDATE asignatura SET nombreAsignatura='".$nombre."',descripcionAsignatura='".$descripcion."',idCarrera='".$idCarrera."' WHERE idAsignatura=". $id;
    $resultado = mysqli_query($conn,$sql);
header("Location:asignatura.php"); 
mysqli_close( $conn );
   ?>

