<?php 
require 'basededatos.php';
$nombre = "";
$apellido = "";
$correo = "";
$telefono= "";
$contra="";
$ConfirmContra="";
$Cedula_Rif = "";
$tipo = "usuario";
$error= "";
$error2= "";
$error3="";
$MensajeConfirmacion = ""; 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST ['correo'];
    $telefono= $_POST['telefono'];
    $contra=$_POST['contra'];
	$Cedula_Rif=$_POST['Cedula_Rif'];
	$tipo = "usuario";
	$ConfirmContra= $_POST['Confirm_Contra'];
if($contra == $ConfirmContra){
   do{
  if(empty($nombre) || empty($apellido) || empty($correo) || empty($telefono) || empty($contra) || empty($Cedula_Rif)){
	  $error = "Todos los campos son requeridos.";
	  break;
  } 


  #agregar un nuevo usuario a la tabla 

  $sql = "INSERT INTO usuarios(Nombre_Usuario, apellido, correo, telefono, Cedula_Rif, contra, privilegio,estatus) VALUES ('$nombre','$apellido','$correo', '$telefono','$Cedula_Rif', '$contra', '$tipo', 1); ";
  $sql2=" INSERT INTO acceso(correo,contra, privilegio, estatus) VALUES ('$correo','$contra', '$tipo',1); ";
  $result = $conn->query($sql);
  $result2 = $conn->query($sql2);
  if(!$result){
	$error2= "Este usuario ya existe";
	break;
  }
  if(!$result){
	$error2= "Este usuario ya existe";
	break;
  }



  $MensajeConfirmacion = "El cliente fue registrado";



   } while(false);
   
}else{
	$error3 = "Las contrasenas no coinciden";
}
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
	<script src="plugins/sweetAlert2/sweetalert2.all.min.js"></script>
	<title>Registro</title>
</head>

<header>
	<img class="logo" src="IMG/BIMAY.png" alt="logo">
	<nav>
		<ul class="nav_links">
			<li><a href="Login.php" class="texto">Inicio</a></li>
			
		</ul>
	</nav>
	
</header>

<body>
	<br>
	<br>
	<br>

	<h1 class="titulo">Registro de Nuevo Usuario</h1>
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
         title: 'Usuario creado satisfactoriamente.',
         showConfirmButton: true,
         confirmButtonColor: '#432C7A',
         confirmButtonText: 'Continuar',
        
     }).then((result)=>{
         if(result.value){
            window.location.href="Login.php";
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
         title: 'Este usuario ya existe',
         showConfirmButton: true,
         confirmButtonColor: '#432C7A',
         confirmButtonText: 'Continuar',
        
     }).then((result)=>{
         if(result.value){
            window.location.href="Registro.php";
         }
     
        })
</script>
	<?php
	 } 
	 
	 ?>
	  <?php 
	 if (!empty($error3)){
		?>
	<script>
 Swal.fire({
         type: 'warning',
         title: 'Las contraseñas no coinciden.',
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
					<i class="login__icon fas fa-user"></i>
					<input type="text" class="login__input" name="nombre" value="<?php echo $nombre; ?>" placeholder="Nombre usuario">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" class="login__input" name="apellido"  value="<?php echo $apellido; ?>" placeholder="Apellido usuario">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="email" class="login__input" name="correo"  value="<?php echo $correo; ?>" placeholder="Ingrese el correo">
				</div>

				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="text" class="login__input" list="tipo" name="telefono"  value="<?php echo $telefono; ?>" placeholder="Número de Teléfono">
					<datalist id="tipo">
        <option value="0412"></option>
        <option value="0424"></option>
        <option value="0416"></option>
</datalist>
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="text" class="login__input" name="Cedula_Rif"  value="<?php echo $Cedula_Rif; ?>" placeholder="Número de Cedula">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input" name="contra"  value="<?php echo $contra; ?>" placeholder="Contraseña">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input" name="Confirm_Contra"  value="<?php echo $ConfirmContra; ?>" placeholder="Confirmar Contraseña">
				</div>

				<button type="submit" class="login__submit">
					<span class="button__text">Crear registro</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>	
				<a href="Login.php" class="login__submit">
					<span class="button__text">Regresar</span>
					<i class="button__icon fas fa-chevron-right"></i>
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
            	© 2022 Todos los Derechos Reservados - <a href="Index.php">BIMAY</a>
            </div>
            <div class="information">
            	<a href="Index.php">Informacion de la Compañia | Politica y Privacidad | Terminos y Condiciones</a>
            </div>
        </div>
    </div>
</footer>

</html>