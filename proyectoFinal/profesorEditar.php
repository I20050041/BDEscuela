<?php
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "escuela";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $nombre=$_GET["txtNombre"]; 
    $apellidoPaterno=$_GET["txtApellidoPaterno"]; 
    $apellidoMaterno=$_GET["txtApellidoMaterno"]; 
    $telefono=$_GET["txtTelefono"]; 
    $especialidad=$_GET["txtEspecialidad"]; 
    $id=$_GET["id"];
   $sql = "UPDATE profesor SET nombre='".$nombre."',apellido_paterno='".$apellidoPaterno."',apellido_materno='".$apellidoMaterno."',telefono='".$telefono."',especialidad='".$especialidad."' WHERE idProfesor=". $id;
    $resultado = mysqli_query($conn,$sql);
header("Location:profesor.php"); 
mysqli_close( $conn );
   ?>


