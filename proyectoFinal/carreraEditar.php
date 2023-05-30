<?php
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "escuela";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $nombre=$_GET["txtNombre"]; 
    $cantidadSemestres=$_GET["txtCantidadSemestres"]; 
    $descripcion=$_GET["txtDescripcion"]; 
    $id=$_GET["id"];
   $sql = "UPDATE carrera SET nombre='".$nombre."',cantidad_semestres='".$cantidadSemestres."',descripcion='".$descripcion."' WHERE idCarrera=". $id;
    $resultado = mysqli_query($conn,$sql);
header("Location:carrera.php"); 
mysqli_close( $conn );
   ?>

