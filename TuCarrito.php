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
    if(isset($_GET['del'])){
        $id = $_GET['del'];
        unset($_SESSION['carrito']['productos'][$id]);
        header('location: TuCarrito.php');
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
	$Cedula =$_SESSION['Cedula'];
    $dia = date("d");
    $mes = date("m");
    $ano = date("y");
   
    $sql2 ="INSERT INTO factura(Cedula_Rif, dia_fecha, mes_fecha, ano_fecha, estatus) VALUES ('$Cedula', '$dia', '$mes','$ano',1 ); ";
    
    $result2 = $conn->query($sql2);
    
    if(!$result2){
        die("Operacion invalida");
      }
   header('location: ConfirmCompra.php');
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
	<title>Tu Carrito</title>
</head>
<header>
	<img class="logo" src="IMG/BIMAY.png" alt="logo">
	<nav>
		<ul class="nav_links">
			<li><a href="IndexIniciado.php" class="texto">Inicio</a></li>
			<li><a href="ctlgIniPC.php" class="texto">Computadoras</a></li>
            <li><a href="ctlgIniTLF.php" class="texto">Telefonos</a></li>
			<li><button class='btn btn-info'><a href="TuCarrito.php" class="texto">Tu Carrito <span id="num_cart"><?php echo $num_cart ?></span></a></li></button>
			<li><a href="CerrarSesion.php" class="texto">Cerrar Sesión</a></li>
		</ul>
	</nav>
	
</header>

<body>
    <br>
    <br>
    <br>
   
<div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Total por cantidad</th>
            <th>Borrar</th>
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
       
        <td>
        <?php echo" <a href='#' onclick='preguntar($id)'>  <button class='btn btn-info'><i class='fa fa-trash' aria-hidden='true'></i></button> </a>"; ?>
        </td>
     
        </tr>
        
        <tr>
        </tr>
        <?php } ?>
        <h2><?php echo "El total por todos los productos es de: $total"; ?>$</h2>
        </tbody>
     
    </table>
    <div class="login">
<a href="IndexIniciado.php" class="login__submit">
					<span class="button__text">Seguir comprando</span>

            </a>
            <form method="POST">
            <button type="submit" class="login__submit">
					<span class="button__text">Pagar</span>
                    </form>
	</button>
	</button>
    </div>
</div>
<?php } ?>
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