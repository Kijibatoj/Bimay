<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="plugins/sweetAlert2/sweetalert2.min.css">
  <link rel="stylesheet" type="text/css" href="plugins/font-awesome-4.7.0/css/font-awesome.min.css"/>
  <script src="plugins/sweetAlert2/sweetalert2.all.min.js"></script>
    <title></title>
</head>
<body>
<?php
require 'conexion.php';
session_start();
$Correo = $_POST["Correo"];
$contra = $_POST["Contra"];
$NombreUser = mysqli_query($conexion, "SELECT Nombre_Usuario FROM usuarios WHERE Correo='$Correo' and contra='$contra' and estatus='1' ");
$NombreUser1 =mysqli_num_rows($NombreUser); 
$result = mysqli_query($conexion, "SELECT * FROM acceso WHERE Correo='$Correo' and contra='$contra' and estatus='1' ");
$result1= mysqli_num_rows($result);
$palabra = mysqli_fetch_array($NombreUser);
if($result1!=0){
    $_SESSION['Nombre'] = $palabra['Nombre_Usuario'];
    foreach($result as $columnas){
        if($columnas['privilegio']== 'Admin'){
           
            ?>
            <script>

    Swal.fire({
         type: 'success',
         title: 'Inicio de sesión exitoso.',
         showConfirmButton: true,
         confirmButtonColor: '#432C7A',
         confirmButtonText: 'Continuar',
         allowOutsideClick: false
        
     }).then((result)=>{
         if(result.value){
            window.location.href="Dashboard.php";
         }
     
        })
                </script> <?php
        } else{
            ?>
            <script>
         Swal.fire({
         type: 'success',
         title: 'Inicio de sesión exitoso.',
         showConfirmButton: true,
         confirmButtonColor: '#432C7A',
         confirmButtonText: 'Continuar',

         allowOutsideClick: false
        
     }).then((result)=>{
         if(result.value){
            window.location.href="IndexIniciado.php";
         }
     
        })       
 
                </script> <?php
        }
    }
}else{
    ?>
    <script>
         Swal.fire({
         type: 'warning',
         title: 'Datos erróneos vuelva a intentarlo.',
         showConfirmButton: true,
         confirmButtonColor: '#432C7A',
         confirmButtonText: 'Continuar',
         allowOutsideClick: false
        
     }).then((result)=>{
         if(result.value){
            window.location.href="Login.php";
         }
     
        })

    </script>
    <?php

} 





