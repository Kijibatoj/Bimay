<?php 

require "conexion.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="icon" href="IMG/Logo2.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" type = "text/css" href = "CSS/Menu.css">
	<link rel = "stylesheet" type = "text/css" href = "CSS/Footer.css">
	<link rel = "stylesheet" type = "text/css" href = "CSS/CartaProducto.css">
  <link rel = "stylesheet" type = "text/css" href = "CSS/Dashboard.css">
  <link rel = "stylesheet" type = "text/css" href = "CSS/Menu.css">
    <link rel = "stylesheet" type = "text/css" href = "CSS/TuCarrito.css">
    <link rel = "stylesheet" type = "text/css" href = "CSS/DetallesTLF.css">
    <link rel = "stylesheet" type = "text/css" href = "CSS/Carrito.css">
  <link rel="stylesheet" href="plugins/sweetAlert2/sweetalert2.min.css">
  <link rel="stylesheet" type="text/css" href="plugins/font-awesome-4.7.0/css/font-awesome.min.css"/>
 
    
  
	<title>Productos Factura</title>
</head>      
                                                                                                                                                                                              
<header>
	<img class="logo" src="IMG/BIMAY.png" alt="logo">
	<nav>
		<ul class="nav_links">
	
    <li><a href="Dashboardventas.php" class="texto">Volver</a></li>
		</ul>
	</nav>
</header>

<body>
<h1 class="title"><center>Productos de la Factura.</center></h1>
  <br><br><br>

<div class="table-wrapper">
 
    <table class="fl-table order-table" >
        <thead>
        <tr>
            <th>ID</th>
            <th>Productos</th>
            <th>Cantidad</th>
        </tr>
        </thead>
        <tbody>
        <?php 
require_once('conexion.php');

            if(!isset($_GET["id"])){
                header("location: /BIMAY/Dashboarventas.php");
                exit;
            }
            $id = $_GET["id"];
        
           
        $busqueda = mysqli_query($conexion, "SELECT factura_producto.id_producto, factura_producto.cantidad, productos.producto, productos.id FROM factura_producto JOIN productos ON productos.id= factura_producto.id_producto WHERE id_factura=$id"); 
      
        foreach($busqueda as $row)
        { 
          
            $idPro = $row['id_producto'];
            $cantidad = $row['cantidad'];
            $Nombre = $row['producto'];
            ?>
            
            <tr>
            <td><?php echo $idPro; ?></td>
            <td><?php echo $Nombre;?></td>
            <td><?php echo $cantidad;?></td>  
            </tr>
            
            <?php 
            
          }
    
          ?>
        
    
        <tbody>
    </table>
    <div class="login">
 <?php
 $id2 = $_GET['id'];
 echo"
    <a href='FacturaAdm.php?id=$id2' class='login__submit'>
					<span class='button__text'>Ver Factura</span>"
			?>
            </button>
    <a href="Dashboardventas.php" class="login__submit">
					<span class="button__text">Volver</span>
			
            </a>
 
    </div>
   
</div>
</body>

<footer>
	<div class="container-footer">
        <div class="footer">
            <div class="copyright">
            	© 2022 Todos los Derechos Reservados - <a href="IndexIniciado.php">BIMAY</a>
            </div>
            <div class="information">
            	<a href="IndexIniciado.php">Informacion de la Compañia | Politica y Privacidad | Terminos y Condiciones</a>
            </div>
        </div>
    </div>
</footer>
    <script src="plugins/sweetAlert2/sweetalert2.all.min.js"></script>
    <script src="js/Productos.js"></script>
    <script src="js/buscador.js"></script>
</html>