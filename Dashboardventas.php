<?php 

require "conexion.php";

if(isset($_GET['del'])){
  $id = $_GET['del'];
  $query = mysqli_query($conexion,"UPDATE factura SET estatus=3 WHERE id_factura = '$id'");
   header('location: Dashboardventas.php');
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
 
    
  
	<title>Dashboard ventas</title>
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
  <a class="card1" href="Dashboard.php">
    <h3>Productos</h3>
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
<h2>Control de Ventas</h2>
<div class="table-wrapper">
  <label>
      
   <b>Buscador:</b>
  <input type="search" class="form-control form-control-sm light-table-filter" data-table="order-table" aria-controls="sampleTable">
</label>
    <table class="fl-table order-table">
        <thead>
        <tr>
            <th>ID Factura</th>
            <th>Cedula</th>
            <th>Dia</th>
            <th>Mes</th>
            <th>Año</th>
            <th>Ver/Anular</th>
        </tr>
        </thead>
        <tbody>
        <?php require 'basededatos.php' ;
          
          
          $app = 'SELECT usuarios.Cedula_Rif, factura.id_factura, factura.dia_fecha, factura.mes_fecha, factura.ano_fecha, factura.estatus FROM usuarios JOIN factura ON usuarios.Cedula_Rif = factura.Cedula_Rif WHERE factura.estatus=0  ';
          $result = $conn->query($app);

          if(!$result){
            die("Operacion invalida". $conn->error);
          }
          
         while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $id = $row['id_factura'];
            ?>
            
            <tr>
            <td><?php echo $row['id_factura'];?></td>
            <td><?php echo$row['Cedula_Rif'];?></td>
            <td><?php echo$row['dia_fecha'];?></td>
            <td><?php echo$row['mes_fecha'];?></td>
            <td><?php echo$row['ano_fecha'];?></td>
            <td>
            <?php echo "<a href='VerVenta.php?id=$id'><button class='btn btn-info'><i class='fa fa-eye' aria-hidden='true' ></i></button> </a>"; ?>
            <?php echo" <a href='#' onclick='preguntar($id)' >  <button class='btn btn-info'><i class='fa fa-trash' aria-hidden='true'></i></button> </a>"; ?>
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
    <!--    Plugin sweet Alert 2  -->
    <script src="plugins/sweetAlert2/sweetalert2.all.min.js"></script>
    <script src="js/buscador.js"></script>
    <script src="js/vent.js"></script> 

</html>