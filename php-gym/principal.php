<?php
    session_start();

    $nombre = $_SESSION['nombre'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link href="css/estilosPrincipal.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="/php-gym/js/jquery-3.6.0.min.js"></script>
</head>
<body>
    <header>
        <h1>MEGAGYM</h1>
    </header>
    <nav>
        <img class="imagen1" src="img/intro.jpg" width="80" height="80"  >
        <h2>Megagym</h2>
        <hr>
        
        <a href="Registro.php"> <i class="bi bi-check2-circle"></i>  Inicio</a>
        <a href="turnos_principal.php"> <i class="bi bi-people-fill"></i>  Mis Turnos</a>
        <a href="rutinasPrincipal.php"> <i class="bi bi-bicycle"></i>  Mis rutinas</a>
        <a href="acercaDe.html"> <i class="bi bi-question-circle-fill"></i>  Acerca De</a>
 
    </nav>
    <div class="perfil-us">
			<ul class="nav-2">
				
				<li><a href="">Mi perfil</a> <?php echo $nombre; ?>
					<ul>
						<li><a href="perfilUsuario.php">Ver datos</a></li>
						<li><a href="logout.php">Cerrar sesión</a></li>
					</ul>
				</li>
			</ul>
	</div>
    

    <footer>
        <h2>
           Concentrate en lo que deseas
        </h2>
    </footer>
</body>
</html>