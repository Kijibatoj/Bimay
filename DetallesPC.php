<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="IMG/Logo2.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "stylesheet" type = "text/css" href = "CSS/Menu.css">
    <link rel = "stylesheet" type = "text/css" href = "CSS/Footer.css">
    <link rel = "stylesheet" type = "text/css" href = "CSS/CartaProducto.css">
    <link rel = "stylesheet" type = "text/css" href = "CSS/DetallesPC.css">
    <link rel = "stylesheet" type = "text/css" href = "CSS/tablaFAC.css">
    <link rel = "stylesheet" type = "text/css" href = "CSS/FormularioF.css">
    <title>Especificaciones del Producto</title>
</head>
<header>
    <img class="logo" src="IMG/BIMAY.png" alt="logo">
    <nav>
        <ul class="nav_links">
            <li><a href="IndexIniciado.php" class="texto">Inicio</a></li>
            <li><a href="ctlgIniTLF.php" class="texto">Telefonos</a></li>
            <li><a href="ctlgIniPC.php" class="texto">Computadoras</a></li>
            <li><a href="TuCarrito.php" class="texto"><button class='btn btn-info'>Tu Carrito <span class="texto" id="num_cart"></span></li></button></a>
            <li><a href="CerrarSesion.php" class="texto">Cerrar Sesión</a></li>
        </ul>
    </nav>
    
</header>

<body>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="plugins/jquery-3.4.1.min.js"></script>

</head>
<br><br><br><br>
<body>
<?php 
                    require 'basededatos.php';
                   $id = isset( $_GET['id']) ? $_GET['id']: '';
                   if($id == ''){
                       echo "Error al procesar la peticion";
                       exit;
                   }
                   $result = $conn->prepare("SELECT id,producto, precio, descripcion, Tipo_Producto, stock, imagen_child FROM productos WHERE id=? AND Tipo_Producto = 'Computadoras' ");
                   $result->execute([$id]);
                   $row = $result->fetch(PDO::FETCH_ASSOC);
                   $producto = $row ['producto'];
                   $desc = $row['descripcion'];
                   $precio= $row['precio'];
                    $stock = $row['stock'];
                   $Tipo = $row ['Tipo_Producto'];
                    ?>

<center>
    <div class="container">
        <div class="imgBx">
            <img src="<?php echo $row['imagen_child']; ?>" >
        </div>
        <div class="details">
            <div class="content">

                
                    
            <h2><?php echo $producto; ?> <br>
                    <span><?php echo $Tipo; ?></span>
                </h2>
                <p>
                    <?php echo $desc; ?>
                </p>
                <h3>Cantidad:</h3> <input class="cambur" type="number" min="1" max="<?php echo $stock;?>" name="cantidad" id="cantidad" value="1">
              <br>
            <br><br><h3>U.S$ <?php echo $precio; ?></h3>
                <br><br><br>
           
      
                <button type='submit' onclick='addProducto(<?php echo$id; ?>, cantidad.value)'>Comprar</button>
     
                
            </div>
        </div>
    </div>


    <script>
        $(".product-colors span").click(function() {
            $(".product-colors span").removeClass("active");
            $(this).addClass("active");
            $(".active").css("border-color", $(this).attr("data-color-sec"))
            $("body").css("background", $(this).attr("data-color-primary"));
            $(".content h2").css("color", $(this).attr("data-color-sec"));
            $(".content h3").css("color", $(this).attr("data-color-sec"));
            $(".container .imgBx").css("background", $(this).attr("data-color-sec"));
            $(".container .details button").css("background", $(this).attr("data-color-sec"));
            $(".imgBx img").attr('src', $(this).attr("data-pic"));
        });
    </script>
<script>
let inputCantidad = document.getElementById("cantidad").value
 function addProducto(id, cantidad){
  let url= 'carrito.php'
  let formData = new FormData()
   formData.append('id',id)
   formData.append('cantidad',cantidad)
   Swal.fire({
        type: 'success',
        title: 'Producto añadido al carrito. ',
        showConfirmButton: true,
        confirmButtonColor: '#432C7A',
        confirmButtonText: 'Continuar',
        showCancelButton: false,
        allowOutsideClick: false
    }).then((result)=>{
        if(result.value){
       fetch(url, {
       method: 'POST',
       body: formData,
       mode: 'cors'
   }).then(response => response.json()).then(data=>{
       if(data.ok){
           let elemento = document.getElementById("num_cart")
           elemento.innerHTML = data.numero
       }
   })
 }
window.location.href='TuCarrito.php'
        })
    }
</script>
</center>
</body>

</html>
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
      
    <script src="js/CompraBoton.js"></script> 
</html>