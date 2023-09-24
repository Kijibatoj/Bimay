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
session_start();

session_unset();

session_destroy();
?>
<script>
Swal.fire({
         type: 'success',
         title: 'Sesión cerrada.',
         text: 'Gracias por usar Bimay, vuelva pronto.',
         showConfirmButton: true,
         confirmButtonColor: '#432C7A',
         confirmButtonText: 'Continuar',
         allowOutsideClick: false
        
     }) 
     .then((result)=>{
         if(result.value){
            window.location.href="Login.php";
         }
     
        })
    </script>
<?php 

?>