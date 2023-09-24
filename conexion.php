<?php 

$servidor = "localhost";
$usuario = "root";
$clave = "";
$base_datos =  "bimay";

$conexion = mysqli_connect("$servidor", "$usuario", "$clave","$base_datos");

if(mysqli_connect_errno()){
    echo "conexion fallida con el error:".
    mysqli_connect_errno();
}




?>