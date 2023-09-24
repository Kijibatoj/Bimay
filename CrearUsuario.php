<?php 
require 'basededatos.php';
$nombre = "";
$apellido = "";
$correo = "";
$telefono= "";
$contra="";
$Cedula_Rif = "";
$tipo = "";
$error= "";
$error2= "";
$MensajeConfirmacion = ""; 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST ['correo'];
    $telefono= $_POST['telefono'];
    $contra=$_POST['contra'];
	$Cedula_Rif=$_POST['Cedula_Rif'];
	$tipo = $_POST['tipo'];
   do{
  if(empty($nombre) || empty($apellido) || empty($correo) || empty($telefono) || empty($contra) || empty($Cedula_Rif) || empty($tipo)){
	  $error = "Todos los campos son requeridos.";
	  break;
  } 


  #agregar un nuevo usuario a la tabla 

  $sql = "INSERT INTO usuarios(Nombre_Usuario, apellido, correo, telefono, Cedula_Rif, contra, privilegio, estatus) VALUES ('$nombre','$apellido','$correo', '$telefono','$Cedula_Rif', '$contra', '$tipo', 1); ";
$sql2 = "INSERT INTO acceso(correo, contra, privilegio,estatus) VALUES ('$correo','$contra', '$tipo',1); ";
  $result = $conn->query($sql);
$result = $conn->query($sql2);
  if(!$result){
	$error2= "Este usuario ya existe.";
	break;
  }

  $nombre = "";
  $apellido = "";
  $correo = "";
  $telefono= "";
  $contra="";
  $Cedula_Rif = "";
 $tipo = "";
  $MensajeConfirmacion = "El cliente fue registrado";

 

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
	<link rel = "stylesheet" type = "text/css" href = "CSS/Registro.css">
	<link rel = "stylesheet" type = "text/css" href = "CSS/alerta.css">
	<link rel="stylesheet" type="text/css" href="plugins/font-awesome-4.7.0/css/font-awesome.min.css"/>
	<script src="plugins/sweetAlert2/sweetalert2.all.min.js"></script>
	<title>Crear Usuario</title>
</head>

<header>
	<img class="logo" src="IMG/BIMAY.png" alt="logo">
	<nav>
		<ul class="nav_links">
			<li><a href="DashboardUser.php" class="texto">Regresar</a></li>
			
		</ul>
	</nav>
	
</header>

<body>
	<br>
	<br>
	<br>
	<?php 

if(!empty($error)){
	?>
	<script>
 Swal.fire({
         type: 'warning',
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
         title: 'Usuario agregado correctamente.',
         showConfirmButton: true,
         confirmButtonColor: '#432C7A',
         confirmButtonText: 'Continuar',
        
     }).then((result)=>{
         if(result.value){
			window.location.href = "DashboardUser.php";
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
         title: 'Este usuario ya existe.',
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
					<i class="login__icon fa fa-user"></i>
					<input type="text" class="login__input" name="nombre" value="<?php echo $nombre; ?>" placeholder="Nombre usuario">
				</div>
				<div class="login__field">
					<i class="login__icon fa fa-user"></i>
					<input type="text" class="login__input" name="apellido"  value="<?php echo $apellido; ?>" placeholder="Apellido usuario">
				</div>
				<div class="login__field">
					<i class="login__icon fa fa-envelope"></i>
					<input type="email" class="login__input" name="correo"  value="<?php echo $correo; ?>" placeholder="Ingrese el correo">
				</div>

				<div class="login__field">
					<i class="login__icon fa fa-phone"></i>
					<input type="text" class="login__input" name="telefono"  value="<?php echo $telefono; ?>" placeholder="Número de Teléfono">
				</div>
				<div class="login__field">
				<i class="login__icon fa fa-id-card-o"></i>
					<input type="text" class="login__input" name="Cedula_Rif"  value="<?php echo $Cedula_Rif; ?>" placeholder="Número de Cedula">
				</div>
				<div class="login__field">
				<i class="login__icon fa fa-lock"></i>
					<input type="password" class="login__input" name="contra"  value="<?php echo $contra; ?>" placeholder="Contraseña">
				</div>
				<div class="login__field">
				<i class="login__icon fa fa-lock"></i>
					<input type="text" class="login__input" name="tipo" list="tipo" value="<?php echo $tipo; ?>" placeholder="Tipo">
					<datalist id="tipo">
        <option value="usuario"></option>
        <option value="Admin"></option>
      </datalist>
				</div>

				<button type="submit" class="login__submit">
					<span class="button__text">Crear registro</span>
						<i class="button__icon fa fa-chevron-right"></i>
					
				</button>	
							
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