<?php 
require 'basededatos.php';
$producto = "";
$stock = "";
$precio = "";
$Descripcion = "";
$Tipo = "";
$Imagen = "";
$Imagen_child = "";
$error= "";
$error2= "";
$MensajeConfirmacion = ""; 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$producto = $_POST['producto'];
    $stock = $_POST['stock'];
    $precio = $_POST ['precio'];
	$Descripcion = $_POST['Descripcion'];
    $Tipo = $_POST ['Tipo'];
	$Imagen = $_POST['Imagen'];
	$Imagen_child = $_POST ['Imagen_child'];

   do{
  if(empty($producto) || empty($stock) || empty($precio) || empty($Descripcion)|| empty($Tipo)|| empty($Imagen) || empty($Imagen_child)){
	  $error = "Todos los campos son requeridos.";
	  break;
  } 


  #agregar un nuevo usuario a la tabla 

  $sql = "INSERT INTO productos(producto, stock, precio, descripcion, imagen, imagen_child, Tipo_Producto, estatus) ".
          " VALUES ('$producto','$stock','$precio','$Descripcion','$Imagen','$Imagen_child',  '$Tipo', 1)";
  $result = $conn->query($sql);

  if(!$result){
	$error2 = "Este producto ya existe";
	break;
  }

  $producto = "";
  $stock = "";
  $precio = "";
  $Descripcion = "";
  $Tipo = "";
  $Imagen_child = "";
  $MensajeConfirmacion = "El producto fue registrado";



   } while(false);

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
	<link rel = "stylesheet" type = "text/css" href = "CSS/Crear.css">
	<link rel = "stylesheet" type = "text/css" href = "CSS/alerta.css">
	<link rel="stylesheet" type="text/css" href="plugins/font-awesome-4.7.0/css/font-awesome.min.css"/>
	<script src="plugins/sweetAlert2/sweetalert2.all.min.js"></script>
	<title>Crear Producto</title>
</head>

<header>
	<img class="logo" src="IMG/BIMAY.png" alt="logo">
	<nav>
		<ul class="nav_links">
			<li><a href="Dashboard.php" class="texto">Regresar</a></li>
			
		</ul>
	</nav>
	
</header>

<body>
	<br>
	<br>
	<?php 

if(!empty($error)){
	?>
	<script>
 Swal.fire({
         type: 'info',
         title: 'Todos los campos son requeridos.',
         showConfirmButton: true,
         confirmButtonColor: '#432C7A',
         confirmButtonText: 'Continuar',
        
     })
</script>
	<?php
}

?>
	<div class="container">
	<?php 
	 if (!empty($MensajeConfirmacion)){
		?>
		<script>
	 Swal.fire({
			 type: 'success',
			 title: 'Producto añadido correctamente.',
			 showConfirmButton: true,
			 confirmButtonColor: '#432C7A',
			 confirmButtonText: 'Continuar',
			
		 }).then((result)=>{
         if(result.value){
            window.location.href="Dashboard.php";
         }
     
        })
	</script>
		<?php
	 } 
	 
	 ?>

<?php 
	 if (!empty($error2)){
		?>
		<script>
	 Swal.fire({
			 type: 'warning',
			 title: 'Este producto ya existe.',
			 showConfirmButton: true,
			 confirmButtonColor: '#432C7A',
			 confirmButtonText: 'Continuar',
			
		 })
	</script>
		<?php
	 } 
	 
	 ?>
	<div class="screen">
		<div class="screen__content">
			<form class="login" method="POST">
				<div class="login__field">
				<i class="login__icon fa fa-product-hunt"></i>
					<input type="text" class="login__input" name="producto" value="<?php echo $producto; ?>" placeholder="Nombre Producto">
				</div>
				<div class="login__field">
					<i class="login__icon fa fa-line-chart"></i>
					<input type="text" class="login__input" name="stock"  value="<?php echo $stock; ?>" placeholder="Stock del producto">
				</div>
				<div class="login__field">
					<i class="login__icon fa fa-usd"></i>
					<input type="text" class="login__input" name="precio"  value="<?php echo $precio; ?>" placeholder="Precio del producto">
				</div>
				<div class="login__field">
				<i class="login__icon fa fa-id-card-o"></i>
					<input type="text" class="login__input" name="Descripcion"  value="<?php echo $Descripcion; ?>" placeholder="Descripcion del producto">
				</div>
				<div class="login__field">
				<i class="login__icon fa fa-picture-o"></i>
					<input type="text" class="login__input" name="Imagen"  value="<?php echo $Imagen; ?>" placeholder="Ingrese link de la imagen">
				</div>
				<div class="login__field">
				<i class="login__icon fa fa-picture-o"></i>
					<input type="text" class="login__input" name="Imagen_child"  value="<?php echo $Imagen_child; ?>" placeholder="Ingrese link de la imagen">
				</div>
				<div class="login__field">
					<i class="login__icon fa fa-lock"></i>
					<input type="text" class="login__input" name="Tipo" list="tipo"  value="<?php echo $Tipo; ?>" placeholder="Tipo de producto">
					<datalist id="tipo">
        <option value="Computadoras"></option>
        <option value="Telefonos"></option>
      </datalist>
				</div>

				
				

				<button type="submit" class="login__submit">
					<span class="button__text">Crear registro</span>
					<i class="button__icon fa fa-chevron-right"></i>
				</button>
				<a href="Dashboard.php" class="login__submit">
					<span class="button__text">Regresar</span>
						<i class="button__icon fa fa-chevron-left"></i>
					
				</a>				
			</form>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
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