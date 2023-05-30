<?php
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "escuela";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $id=$_GET["id"];
   $sql = "UPDATE profesor SET estatus= 0 WHERE idProfesor=". $id;
    $resultado = mysqli_query($conn,$sql);
header("Location:profesor.php"); 
mysqli_close( $conn );
   ?>