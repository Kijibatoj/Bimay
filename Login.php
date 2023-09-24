
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="icon" href="IMG/Logo2.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel = "stylesheet" type = "text/css" href = "CSS/Menu.css">
	<link rel = "stylesheet" type = "text/css" href = "CSS/Footer.css">
	<link rel = "stylesheet" type = "text/css" href = "CSS/CartaProducto.css">
	<link rel = "stylesheet" type = "text/css" href = "CSS/Login.css">
	<link rel="stylesheet" href="plugins/sweetAlert2/sweetalert2.min.css">

	<title>Inicio de Sesion</title>
</head>

<header>
	<img class="logo" src="IMG/BIMAY.png" alt="logo">
	<nav>
		<ul class="nav_links">
			<li><a href="Index.php" class="texto">Inicio</a></li>
			
		</ul>
	</nav>
	
</header>

<body>
	<br>
	<br>
	<br>
	<br>

	<div class="container">
		
	<div class="screen">
		<div class="screen__content">
			<form class="login" method="post" action="Validar.php">
				<h1 class="titulo">Inicio de Sesión</h1>
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="email" class="login__input" name="Correo"  placeholder="Correo">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input" name="Contra"  placeholder="Contraseña">
				</div>
				<button type="submit" class="login__submit">
					<span class="button__text">Iniciar Sesión</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
			</form>
			<div class="social-login">
				<br><br><br>
				<h3><a class="registro" href="Registro.php">¿Nuevo en BIMAY?</a></h3>
			</div>
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
<script src="plugins/sweetAlert2/sweetalert2.all.min.js"></script>
</html>