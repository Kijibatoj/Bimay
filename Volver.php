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
require 'basededatos.php';
require 'carrito.php';

unset($_SESSION['carrito']['productos']);

$Cedula =$_SESSION['Cedula'];
$app = "SELECT id_factura FROM factura WHERE estatus=1 AND Cedula_Rif='$Cedula'";
          $result = $conn->query($app);

          if(!$result){
            die("Operacion invalida". $conn->error);
          }
          
while($row = $result->fetch(PDO::FETCH_ASSOC)){
        $idfac=$row['id_factura'];
    }
    $result = mysqli_query($conexion, "UPDATE factura SET estatus=0 WHERE Cedula_Rif='$Cedula' AND id_factura='$idfac' ");
?>

<script>
Swal.fire({
  title: 'Gracias por hacer su compra <3',
                 imageUrl:'IMG/BIMAY_N.png',
                 imageWidth: '200px',
                 
                 showConfirmButton: true,
                 confirmButtonColor: '#432C7A',
                 confirmButtonText: 'Continuar',
                 allowOutsideClick: false
                
             }) 
             .then((result)=>{
                 if(result.value){
                    window.location.href="IndexIniciado.php";
                 }
             
                })
    </script>