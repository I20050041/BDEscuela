<?php
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "escuela";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $id=$_GET["id"];
   $sql = "UPDATE asignatura SET estatusAsignatura= 0 WHERE idAsignatura=". $id;
    $resultado = mysqli_query($conn,$sql);
header("Location:asignatura.php"); 
mysqli_close( $conn );
   ?>