<?php 
require 'basededatos.php';


if($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(!isset($_GET["id"])){
        header("location: /BIMAY/DashboardUser.php");
        exit;
    }
    $id = $_GET["id"];

    $app = "SELECT * FROM usuarios WHERE Cedula_Rif=$id";
    $result = $conn->query($app);
    $row = $result->fetch(PDO::FETCH_ASSOC);               

    if(!$row){
        header("location: /BIMAY/DashboardUser.php");
        exit;
    }
    $nombre = $row['Nombre_Usuario'];
    $apellido = $row['apellido'];
    $correo = $row ['correo'];
    $telefono= $row['telefono'];
    $contra=$row['contra'];
    $tipo = $row ['privilegio'];
}
else {
    $id = $_POST['id'];
	$nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST ['correo'];
    $telefono= $_POST['telefono'];
    $contra=$_POST['contra'];
    $tipo = $_POST ['tipo'];


  do{
    if( empty($id) ||empty($nombre) || empty($apellido) || empty($correo) || empty($telefono) || empty($contra) || empty($tipo)){
        $error = "Todos los campos son requeridos.";
        break;
    } 

    $app = "UPDATE usuarios  SET Nombre_Usuario='$nombre', apellido= '$apellido', correo = '$correo', telefono = '$telefono', contra= '$contra', privilegio= '$tipo' WHERE Cedula_Rif = $id; ";  
	$result = $conn->query($app);    
	$consulta = "SELECT correo, contra, privilegio FROM usuarios WHERE Cedula_Rif=$id";
	$result2= $conn->query($consulta);
	while($row = $result2->fetch(PDO::FETCH_ASSOC)){
		$NewCorreo= $row['correo'];
		$NewContra= $row['contra'];
		$NewPrivilegio = $row['privilegio'];
		$app2= "UPDATE acceso SET correo='$NewCorreo',contra= '$NewContra', privilegio= '$NewPrivilegio' WHERE correo = '$correo'";
	}
	
	$result3 = $conn->query($app2);
    if(!$result){
        $error2 = "Operacion invalida.";
		break;
      }
	  if(!$result3){
        $error2 = "Operacion invalida.";
		break;
      }
	  if(!$result2){
        $error2 = "Operacion invalida.";
		break;
      }
    
    
    $MensajeConfirmacion = "El cliente fue registrado";



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
	<title>Editar usuario</title>
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
			 title: 'Usuario editado.',
			 showConfirmButton: true,
			 confirmButtonColor: '#432C7A',
			 confirmButtonText: 'Continuar',
			
		 }).then((result)=>{
         if(result.value){
            window.location.href="DashboardUser.php";
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
			 title: 'Operacion invalida',
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
                <input type= "hidden" name="id" value="<?php echo $id; ?>">
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
				<i class="login__icon fa fa-lock"></i>
					<input type="text" class="login__input" name="contra"  value="<?php echo $contra; ?>" placeholder="Contraseña">
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
					<span class="button__text">Editar</span>
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