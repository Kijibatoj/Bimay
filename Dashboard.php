<?php 

require "conexion.php";
session_start();
if(isset($_GET['del'])){
  $id = $_GET['del'];
  $query = mysqli_query($conexion,"UPDATE productos SET estatus=0 WHERE id = '$id'");
  header('location: Dashboard.php');
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
 
    
  
	<title>Dashboard</title>
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
<h1 class="title"><center>Hola <?php echo $_SESSION['Nombre']; ?> bienvenid@.</center></h1>
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
  
 
  
  <a class="card3" href="DashboardUser.php">
    <h3>Usuarios</h3>
    <p class="small"></p>
    <div class="dimmer"></div>
    <div class="go-corner" href="#">
      <div class="go-arrow">
        →
      </div>
    </div>
  </a>
</div>
<h2>Control de Producto</h2>
<div class="table-wrapper">
  <label>
  <a href="CrearProducto.php"><button class="btn btn-info">Crear</button></a>
   <b>Buscador:</b>
  <input type="search" class="form-control form-control-sm light-table-filter" data-table="order-table" aria-controls="sampleTable" id="buscar" name="buscar">
</label>
    <table class="fl-table order-table" >
        <thead>
        <tr>
            <th>ID</th>
            <th>Productos</th>
            <th>Stock</th>
            <th>Precio</th>
            <th>Tipo de Producto</th>
            <th>Imagen Principal</th>
            <th>Imagen Producto</th>
            <th>Editar/Borrar</th>
        </tr>
        </thead>
        <tbody>
        <?php require 'basededatos.php' ;
          
          
          $app = 'SELECT * FROM productos WHERE estatus=1';
          $result = $conn->query($app);

          if(!$result){
            die("Operacion invalida". $conn->error);
          }
          
          while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $id = $row['id'];
            ?>
            
            <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo$row['producto'];?></td>
            <td><?php echo$row['stock'];?></td>
            <td><?php echo$row['precio'];?>$</td>  
            <td><?php echo$row['Tipo_Producto'];?></td>
            <td><?php echo$row['imagen'];?></td> 
            <td><?php echo$row['imagen_child'];?></td> 
            <td>
            <?php echo "<a href='EditarPR.php?id=$id'><button class='btn btn-info'><i class='fa fa-pencil-square' aria-hidden='true' ></i></button> </a>"; ?>
            <?php echo" <a href='#' onclick='preguntar($id)'>  <button class='btn btn-info'><i class='fa fa-trash' aria-hidden='true'></i></button> </a>"; ?>
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
    <script src="plugins/sweetAlert2/sweetalert2.all.min.js"></script>
    <script src="js/Productos.js"></script>
    <script src="js/buscador.js"></script>
</html>