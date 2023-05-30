<?php
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "escuela";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $id=$_GET["id"];
   $sql = "UPDATE grupo SET estatus= 0 WHERE idGrupo=". $id;
    $resultado = mysqli_query($conn,$sql);
header("Location:grupo.php"); 
mysqli_close( $conn );
   ?>