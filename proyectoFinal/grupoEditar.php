<?php
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "escuela";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $grado=$_GET["txtGrado"]; 
    $seccion=$_GET["txtSeccion"]; 
    $id=$_GET["id"];
   $sql = "UPDATE grupo SET grado='".$grado."',seccion='".$seccion."' WHERE idGrupo=". $id;
    $resultado = mysqli_query($conn,$sql);
header("Location:grupo.php"); 
mysqli_close( $conn );
   ?>

