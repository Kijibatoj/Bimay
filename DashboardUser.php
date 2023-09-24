<?php 

require "conexion.php";

if(isset($_GET['del'])){
  $id = $_GET['del'];
  $estraer= mysqli_query($conexion,"SELECT correo FROM usuarios WHERE Cedula_Rif= '$id'");
  foreach($estraer as $fila){
    $correo = $fila['correo'];
  }
  $upd= mysqli_query($conexion, "SELECT correo FROM acceso WHERE correo='$correo'");
  $query1=mysqli_query($conexion, "UPDATE acceso SET estatus=0 WHERE correo='$correo'");
  $query = mysqli_query($conexion,"UPDATE usuarios SET estatus=0 WHERE Cedula_Rif = '$id'");
  header('location: DashboardUser.php');
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
  <link rel = "stylesheet" type = "text/css" href = "CSS/Dashboard.css">
  <link rel="stylesheet" href="plugins/sweetAlert2/sweetalert2.min.css">
  <link rel="stylesheet" type="text/css" href="plugins/font-awesome-4.7.0/css/font-awesome.min.css"/>
 
    
  
	<title>Tabla Usuarios</title>
</head>
<header>
	<img class="logo" src="IMG/BIMAY.png" alt="logo">
	<nav>
		<ul class="nav_links">
	
    <li><a href="CerrarSesion.php" class="texto">Cerrar Sesión</a></li>
		</ul>
	</nav>
</header>

<body>
  <br><br><br>
<div class="container">
  <a class="card1" href="Dashboardventas.php">
    <h3>Ventas Totales</h3>
    <p class="small"></p>
    <div class="go-corner" href="#">
      <div class="go-arrow">
        →
      </div>
    </div>
  </a>
  
  <a class="card2" href="Dashboard.php">
    <h3>Control de Productos</h3>
    <p class="small"></p>
    
    <div class="go-corner" href="#">
      <div class="go-arrow">
        →
      </div>
    </div>
  </a>
  
</div>

<h2>Control de Usuarios</h2>
<div class="table-wrapper">

  <label>
  <a href="CrearUsuario.php"> <button class="btn btn-info" >Crear</button></a>
   <b>Buscador:</b>
  <input type="search" class="form-control form-control-sm light-table-filter" data-table="order-table"aria-controls="sampleTable">
</label>
    <table class="fl-table order-table">
        <thead>
        <tr>
        
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Contraseña</th>
            <th>Telefono</th>
            <th>Cedula</th>
            <th>Privilegio</th>
            <th>Editar/Eliminar</th>
        </tr>
        </thead>
        <tbody id="tabla_persona">
        
          <?php require 'basededatos.php' ;
          
          
          $app = 'SELECT * FROM usuarios WHERE estatus=1';
          $result = $conn->query($app);

          if(!$result){
            die("Operacion invalida". $conn->error);
          }
          
          while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $id = $row['Cedula_Rif'];
            ?>
        
            <tr>
            <td><?php echo$row['Nombre_Usuario'];?></td>
            <td><?php echo$row['apellido'];?></td>
            <td><?php echo$row['correo'];?></td>
            <td><?php echo$row['contra'];?></td>
            <td><?php echo$row['telefono'];?></td> 
            <td><?php echo$row['Cedula_Rif'];?></td> 
            <td><?php echo$row['privilegio'];?></td> 
            <td>
            <?php echo "<a href='EditarUSER.php?id=$id'><button class='btn btn-info'><i class='fa fa-pencil-square' aria-hidden='true' ></i></button> </a>"; ?>
            <?php echo" <a href='#' onclick='preguntar($id)'><button class='btn btn-info'><i class='fa fa-trash' aria-hidden='true'></i></button> </a>"; ?>
          </td>
            </tr>
            
            <?php 
            
          }
        
          ?>

        <tbody>
    </table>
   
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
    <!--    Plugin sweet Alert 2 --> 
    <script src="plugins/sweetAlert2/sweetalert2.all.min.js"></script>
    <script src="js/buscador.js"></script>
    <script src="js/Usuarios.js"></script>  

</html>