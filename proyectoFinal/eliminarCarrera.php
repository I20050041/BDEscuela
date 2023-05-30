<?php
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "escuela";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $id=$_GET["id"];
   $sql = "UPDATE carrera SET estatus= 0 WHERE idCarrera=". $id;
    $resultado = mysqli_query($conn,$sql);
header("Location:carrera.php"); 
mysqli_close( $conn );
   ?>