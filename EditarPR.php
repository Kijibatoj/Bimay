<?php 
require 'basededatos.php';


if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(!isset($_GET["id"])){
        header("location: /BIMAY/Dashboard.php");
        exit;
    }
    $id = $_GET["id"];

    $app = "SELECT * FROM productos WHERE id=$id";
    $result = $conn->query($app);
    $row = $result->fetch(PDO::FETCH_ASSOC);               

    if(!$row){
        header("location: /BIMAY/Dashboard.php");
        exit;
    }
    $producto = $row['producto'];
    $stock = $row['stock'];
    $precio = $row ['precio'];
	$Imagen = $row ['imagen'];
	$Imagen_child = $row ['imagen_child'];
	$Tipo = $row ['Tipo_Producto'];
	$Desc = $row ['descripcion'];
}
else {
    $id = $_POST['id'];
	$producto = $_POST['producto'];
    $stock = $_POST['stock'];
    $precio = $_POST ['precio'];
	$Imagen = $_POST ['Imagen'];
	$Imagen_child = $_POST ['Imagen_child'];
	$Tipo = $_POST ['Tipo'];
	$Desc = $_POST['Desc'];
    


  do{
    if( empty($id) ||empty($producto) || empty($stock) || empty($precio) || empty($Imagen) || empty($Imagen_child)|| empty($Tipo)){
        $error = "Todos los campos son requeridos.";
        break;
    } 

    $app = "UPDATE productos ". 
    "SET producto='$producto', stock= '$stock', precio = '$precio', imagen='$Imagen',imagen_child= '$Imagen_child',  Tipo_Producto = '$Tipo', descripcion='$Desc' ". 
    "WHERE id = $id";

    $result = $conn->query($app);
    if(!$result){
        $error2= "Este producto ya existe.";
		break;
      }
    
    $MensajeConfirmacion = "El Producto fue registrado";


  }while(false);


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
	<title>Editar producto</title>
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
	<?php 

if(!empty($MensajeConfirmacion)){
	?>
	<script>
 Swal.fire({
         type: 'success',
         title: 'Se edito el producto correctamente',
         showConfirmButton: true,
         confirmButtonColor: '#432C7A',
         confirmButtonText: 'Continuar',
        
     })
	 .then((result)=>{
         if(result.value){
            window.location.href="Dashboard.php";
         }
     
        })
</script>
	<?php
}

?>

<?php 

if(!empty($error2)){
	?>
	<script>
 Swal.fire({
         type: 'warning',
         title: 'Esta informacion para el producto ya existe.',
         showConfirmButton: true,
         confirmButtonColor: '#432C7A',
         confirmButtonText: 'Continuar',
        
     })
</script>
	<?php
}

?>

	<div class="container">
	
	<div class="screen">
		<div class="screen__content">
			<form class="login" method="POST">
                <input type= "hidden" name="id" value="<?php echo $id; ?>">
				<div class="login__field">
				<i class="login__icon fa fa-product-hunt"></i>
					<input type="text" class="login__input" name="producto" value="<?php echo $producto; ?>" placeholder="Producto">
				</div>
				<div class="login__field">
				<i class="login__icon fa fa-line-chart"></i>
					<input type="text" class="login__input" name="stock"  value="<?php echo $stock; ?>" placeholder="Stock ">
				</div>
				<div class="login__field">
				<i class="login__icon fa fa-usd"></i>
					<input type="text" class="login__input" name="precio"  value="<?php echo $precio; ?>" placeholder="precio ">
				</div>
				<div class="login__field">
				<i class="login__icon fa fa-usd"></i>
					<textarea class="login__input2" placeholder="Descripcion" name="Desc"  value="<?php echo $Desc; ?>"><?php echo $Desc; ?></textarea>
				</div>
				<div class="login__field">
					<i class="login__icon fa fa-picture-o"></i>
					<input type="text" class="login__input" name="Imagen"  value="<?php echo $Imagen; ?>" placeholder="imagen">
				</div>
				<div class="login__field">
					<i class="login__icon fa fa-picture-o"></i>
					<input type="text" class="login__input" name="Imagen_child"  value="<?php echo $Imagen_child; ?>" placeholder="imagen">
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
					<span class="button__text">Editar</span>
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
<script src="plugins/sweetAlert2/sweetalert2.all.min.js"></script>
</html>