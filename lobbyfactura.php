<?php 
require 'carrito.php';
require 'basededatos.php';

    $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos']: null;
    $lista_carrito= array();
    if($productos != null){
     foreach($productos as $aidi =>$cantidad ){
        $result = $conn->prepare("SELECT id,producto, precio, descripcion, Tipo_Producto, $cantidad as cantidad FROM productos WHERE id=?");
        $result->execute([$aidi]);
        $lista_carrito[] = $result->fetch(PDO::FETCH_ASSOC);
     }

    }
    
	
?>


<?php 
require 'basededatos.php';
require 'conexion.php';
$Usuario = $_SESSION['Nombre'];
$result = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Nombre_Usuario='$Usuario'");
$palabra = mysqli_fetch_array($result);
$_SESSION['Cedula'] = $palabra['Cedula_Rif'];
$Cedula =$_SESSION['Cedula'];

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      ?>
   
    <script>
          window.location.href= 'Factura.php';     
      </script>
      <?php 
    
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
    <link rel = "stylesheet" type = "text/css" href = "CSS/TuCarrito.css">
	<link rel = "stylesheet" type = "text/css" href = "CSS/CartaProducto.css">
    <link rel = "stylesheet" type = "text/css" href = "CSS/DetallesTLF.css">
    <link rel = "stylesheet" type = "text/css" href = "CSS/Carrito.css">
    <link rel="stylesheet" type="text/css" href="plugins/font-awesome-4.7.0/css/font-awesome.min.css"/>
	<title>Lobby Factura</title>
</head>
<header>
	<img class="logo" src="IMG/BIMAY.png" alt="logo">
	<nav>
		<ul class="nav_links">
			<li><a href="IndexIniciado.php" class="texto">Inicio</a></li>
			<li><a href="Volver.php" class="texto">Volver</a></li>
		</ul>
	</nav>
	
</header>

<body>
    <br>
    <br>
    <br>
    <form method="POST">
    <p class="titulo"> Hola <?php echo $Usuario; ?> estos son tus productos comprados.</p>

    
<div class="table-wrapper">

    <table class="fl-table">
        <thead>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Total por cantidad</th>
            
        </tr>
        </thead>
        
        <tbody>
        <?php if($lista_carrito == null){
            echo "<tr><td colspan='5'> <b>LISTA VACIA </b>  </td> </tr>";
        }else{
            $total =0;
            foreach($lista_carrito as $productos){
                $id = $productos['id'];
                $nombre = $productos['producto'];
                $precio = $productos['precio'];
                $cantidad = $productos['cantidad'];
                $totalxcantidad = $precio * $cantidad;
                $total += $totalxcantidad;
                ?>
            
        
        <tr>
        <td><?php echo $nombre ?></td>
        <td><?php echo $precio ?>$</td>
        <td>
     <?php echo $cantidad ?>       
    </td>
    <td>
        <?php echo "$totalxcantidad "; ?>
        </td>
        </tr>
        <?php } ?>
        <h2><?php echo "El total por todos los productos es de: $total"; ?>$</h2>
        </tbody>
     
    </table>
    <div class="login">
 
    <button type="submit" class="login__submit">
					<span class="button__text">Ver Factura</span>
			
            </button>
    <a href="Volver.php" class="login__submit">
					<span class="button__text">Volver</span>
			
            </a>
 
    </div>
</div>
<?php } ?>
</form>
<br>
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
      
    <script src="js/carritoeliminar.js"></script> 
 
</html>