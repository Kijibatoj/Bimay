<?php 
require 'conexion.php';
session_start();
$num_cart = 0;

if(isset($_SESSION['carrito']['productos'])){
    $num_cart = count($_SESSION['carrito']['productos']);
}
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
	<link rel = "stylesheet" type = "text/css" href = "CSS/Index.css">
	<title>Inicio</title>
</head>
<header>
	<img class="logo" src="IMG/BIMAY.png" alt="logo">
	<nav>
		<ul class="nav_links">
			<li><a href="ctlgIniTLF.php" class="texto">Teléfonos</a></li>
			<li><a href="ctlgIniPC.php" class="texto">Computadoras</a></li>
			<li><a href="TuCarrito.php" class="texto"><button class='btn btn-info'>Tu Carrito <span class="texto" id="num_cart"><?php echo $num_cart ?></span></li></button></a>
			<li><a href="CerrarSesion.php" class="texto">Cerrar Sesión</a></li>
		</ul>
	</nav>
</header>

<body>
	<h1 class="title"><center>Hola <?php echo $_SESSION['Nombre']; ?> bienvenido.</center></h1>
	<?php
	require 'conexion.php';
    $result = mysqli_query($conexion, "SELECT id, producto, precio, descripcion, imagen, imagen_child, Tipo_Producto FROM productos WHERE Tipo_Producto= 'Telefonos' AND estatus=1 ");

	?>
	<div class="cards">
	<?php foreach($result as $row){ ?>	
  		<div>
    		<a href="ctlgIniTLF.php" type="submit" class="card">
	
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
	<?php
	require 'conexion.php';
    $result = mysqli_query($conexion, "SELECT id, producto, precio, descripcion, imagen, imagen_child, Tipo_Producto FROM productos WHERE Tipo_Producto= 'Computadoras' AND estatus=1 ");

	?>
	<div class="cards">
	<?php foreach($result as $row){ ?>	
  		<div>
    		<a href="ctlgIniPC.php" type="submit" class="card">
	
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
	<div class="wrapper">
    <div class="product-img">
      <img src="IMG/Mision.jpg" height="100%" width="100%">
    </div>
    <div class="product-info">
      <div class="product-text">
        <h1>MISIÓN</h1>
        <h2>BIMAY</h2>
        <p>Somos una empresa de comercialización de productos y servicios en el área de accesorio para teléfonos y computadoras, confiable, eficiente y ética; orientada a satisfacer las necesidades y aspiraciones de nuestros clientes.</p>
      </div>
    </div>
  </div>
  <br><br><br><br>
  <div class="wrapper">
    <div class="product-img">
      <img src="IMG/Vision.jpg" height="100%" width="100%">
    </div>
    <div class="product-info">
      <div class="product-text">
        <h1>VISIÓN</h1>
        <h2>BIMAY</h2>
        <p>Ser para el presente año líder en la comercialización de productos y servicios en el sector de accesorios de telefonía movil y computadoras, satisfaciendo las necesidades de nuestros clientes, accionistas, capital humano y sociedad.</p>
      </div>
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

</html>