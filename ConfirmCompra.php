
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
    $result = mysqli_query($conexion, "SELECT MAX(id_factura) FROM factura WHERE estatus=1 AND Cedula_Rif='$Cedula' ");
    while ($row = $result ->fetch_assoc()){
        $idfac=$row['MAX(id_factura)'];
    }
    foreach($lista_carrito as $productos){
    $id = $productos['id'];
    $dia = date("d");
    $mes = date("m");
    $ano = date("y");
    $estuck = mysqli_query($conexion, "SELECT stock FROM productos WHERE estatus=1 AND id='$id' ");
    $sql = "INSERT INTO factura_producto(id_producto, id_factura, cantidad) VALUES ('$id','$idfac', '$cantidad')";
    $result2= $conn->query($sql);
    while($fila = $estuck->fetch_assoc()){
        $stock= $fila['stock'];
    }
    $newStock = $stock - $cantidad;
    $wEstock = mysqli_query($conexion, "UPDATE productos SET stock='$newStock' WHERE estatus=1 AND id='$id' ");
}



    if(!$result){
        die("Operacion invalida");
      }
      if(!$result2){

        die("Operacion invalida");
      }
      ?>
   

    <script>
      if(confirm('¿Desea ver su factura?')){
          window.location.href= 'Factura.php';
      }else{
          window.location.href = 'lobbyfactura.php';
     }
      </script>
      <?php 
      
}
	

?>
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
	<title>Confirmacion de la compra</title>
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
    <p class="titulo"> <?php echo $Usuario; ?> confirma tu compra. </p>

    
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
					<span class="button__text">Pagar</span>
			
	</button>
 
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