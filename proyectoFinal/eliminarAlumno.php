<?php
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "escuela";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $id=$_GET["id"];
   $sql = "UPDATE alumno SET estatusAl= 0 WHERE idAlumno=". $id;
    $resultado = mysqli_query($conn,$sql);
header("Location:alumno.php"); 
mysqli_close( $conn );
   ?>