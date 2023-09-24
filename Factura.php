<?php 
require 'basededatos.php';
require 'conexion.php';
session_start();
$Usuario = $_SESSION['Nombre'];
$result = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Nombre_Usuario='$Usuario'");
$palabra = mysqli_fetch_array($result);
$_SESSION['Cedula'] = $palabra['Cedula_Rif'];
$Cedula =$_SESSION['Cedula'];
error_reporting(0);
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
	<link rel = "stylesheet" type = "text/css" href = "CSS/FormularioF.css">
	<link rel="stylesheet" href="plugins/sweetAlert2/sweetalert2.min.css">
	<title>Factura</title>
</head>

<header>
	<img class="logo" src="IMG/BIMAY.png" alt="logo">
	<nav>
		<ul class="nav_links">
		<li><a href="Volver" class="texto">Volver</a></li>
		</ul>
	</nav>

</header>

<body>
	<div class="container">
		<div id="app" class="col-11">
			<div class="col-2">
				<img src="IMG/BIMAY_N.png" />
			  </div>
			<h2>Factura</h2>
		
			<div class="row my-3">
			  <div class="col-10">
				<h1>BIMAY</h1>
				<p>L CENTRO COMERCIAL
					SAN IGNACIO</p>
				<p>Piso 2</p>
				<p>local 105</p>
			  </div>
			</div>
		  
			<hr />
		  
			<div class="row fact-info mt-3">
			  <div class="col-3">
				<h5>Facturar a</h5>
				<p>
				<?php echo $Usuario; ?> 
				</p>
			  </div>
			  <div class="col-3">
				<h5>N° de factura</h5>
				<h5>Fecha</h5>
			  </div>
			  <div class="col-3">
				  <?php
				  require 'basededatos.php' ;
          
          
				  $app = 'SELECT usuarios.Cedula_Rif, factura.id_factura, factura.dia_fecha, factura.mes_fecha, factura.ano_fecha FROM usuarios JOIN factura ON usuarios.Cedula_Rif = factura.Cedula_Rif';
				  $result = $conn->query($app);
		
				  if(!$result){
					die("Operacion invalida". $conn->error);
				  }
				  
				 while($row = $result->fetch(PDO::FETCH_ASSOC)){
					 $dia = $row['dia_fecha'];
					 $mes = $row['mes_fecha'];
					 $ayo = $row['ano_fecha'];
					 $NumberFac=  $row['id_factura'];
				 }
				  ?>
				<h5><?php echo $NumberFac; ?></h5>
				<p><?php echo $dia; ?>/<?php echo $mes; ?>/<?php echo $ayo; ?></p>
			  </div>
			</div>
		  
			<div class="row my-5">
			  <table class="table table-borderless factura">
				<thead>
				  <tr>
					<th>Cant.</th>
					<th>Descripcion</th>
					<th>Precio Unitario</th>
					<th>Total por Cantidad</th>
				  </tr>
				</thead>
				<tbody>
				<?php 
				require 'basededatos.php' ;
          
          
				$app = 'SELECT factura_producto.id_producto, factura_producto.id_factura, factura_producto.cantidad,factura.estatus, productos.producto, productos.precio, productos.id  FROM factura_producto JOIN productos JOIN factura ON productos.id = factura_producto.id_producto
				AND factura.id_factura = factura_producto.id_factura WHERE factura.estatus="1" ';
				$result = $conn->query($app);
	  
				if(!$result){
				  die("Operacion invalida". $conn->error);
				}
				
				while($row = $result->fetch(PDO::FETCH_ASSOC)){

					$cantidad = $row['cantidad'];
					$nombre = $row['producto'];
					$precio = $row['precio'];
					$totalxcantidad = $cantidad * $precio;
					$Total += $totalxcantidad;
                ?>
				  <tr>
					<td> <?php echo $cantidad ?> </td>
					<td><?php echo $nombre ?></td>
					<td><?php echo $precio ?>$</td>
					<td><?php echo "$totalxcantidad "; ?>$</td>
				  </tr>
				  <?php }?>
				</tbody>
				<tfoot>
			
				  <tr>
					<th></th>
					<th></th>
		
					<th>Total Factura</th>
					<th><?php echo $Total; ?></th>
				  </tr>
				</tfoot>
				
	
			  </table>
			</div>
		  
			<div class="cond row">
			  <div class="col-12 mt-3">
				<h4>Condiciones y formas de pago</h4>
				<p>El pago se debe realizar en un plazo de 15 dias.</p>
				<p>
				  Banco _______
				  <br />
				  Cedula(<?php echo $Usuario; ?>): <?php echo $Cedula; ?>
				  <br />
				  Código RIF(BIMAY): 
				</p>
			  </div>
			</div>
		</div>
		
		</div>
		<br>
		<br>
		<a class="login__submit" onclick="factura();">
			<span class="button__text">Imprimir PDF</span>
			<i class="button__icon fas fa-chevron-right"></i>
		</a>
		<a href="Volver.php" class="login__submit">
			<span class="button__text">Volver</span>
			<i class="button__icon fas fa-chevron-right"></i>
		</a>
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
      
<script src="js/Factura.js"></script> 

</html>