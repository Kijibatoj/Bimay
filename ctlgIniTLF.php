<?php 
require 'carritove.php';

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
	<title>Accesorios para Telefonos</title>
</head>
<header>
	<img class="logo" src="IMG/BIMAY.png" alt="logo">
	<nav>
		<ul class="nav_links">
			<li><a href="IndexIniciado.php" class="texto">Inicio</a></li>
			<li><a href="ctlgIniPC.php" class="texto">Computadoras</a></li>
			<li><a href="TuCarrito.php" class="texto"><button class='btn btn-info'>Tu Carrito <span class="texto" id="num_cart"><?php echo $num_cart ?></span></li></button></a>
			<li><a href="CerrarSesion.php" class="texto">Cerrar Sesión</a></li>
		</ul>
	</nav>
	
</header>

<body>
<h1 class="title"><center>CATÁLOGO DE ACCESORIOS PARA TELÉFONOS</center></h1>

	<?php
	require 'conexion.php';
    $result = mysqli_query($conexion, "SELECT id,producto, precio, descripcion, imagen, imagen_child, Tipo_Producto, stock FROM productos WHERE Tipo_Producto= 'Telefonos' AND stock>0 AND estatus=1 ");

	?>
	<div class="cards">
	<?php foreach($result as $row){ ?>	
  		<div>
    		<a href="DetallesTLF.php?id=<?php echo $row['id']; ?>" type="submit" class="card">
	
      		<img src="<?php echo $row['imagen']; ?>" class="card__image" alt="" />
      		<div class="card__overlay">
        		<div class="card__header">
          			<svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
          				<div class="card__header-text">
            				<h3 class="card__title"><?php echo $row['Tipo_Producto']; ?></h3>            
            				<span class="card__status"><?php echo $row['producto']; ?></span>
          				</div>
        		</div>
        		<p class="card__description"><?php echo $row['descripcion']; ?></p>
      		</div>
			 
    		</a>      
		  </div>
<?php }?>
  		  
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

</html>