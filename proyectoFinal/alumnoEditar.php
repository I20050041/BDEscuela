<?php
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "escuela";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $nombre=$_GET["txtNombre"]; 
    $apellidoP=$_GET["txtApellidoPaterno"];
    $apellidoM=$_GET["txtApellidoMaterno"];
    $matricula=$_GET["txtMatricula"];
    $telefono=$_GET["txtTelefono"];
    $idCarrera=$_GET["txtCarreraNombre"];
    $idGrupo=$_GET["txtGrupo"];
    $id=$_GET["id"];
   $sql = "UPDATE alumno SET nombreAl='".$nombre."',apellido_paterno='".$apellidoP."',apellido_materno='".$apellidoM."',matricula='".$matricula."',telefono='".$telefono."',idGrupo='".$idGrupo."',idCarrera='".$idCarrera."' WHERE idAlumno=". $id;
    $resultado = mysqli_query($conn,$sql);
header("Location:alumno.php"); 
mysqli_close( $conn );
   ?>
