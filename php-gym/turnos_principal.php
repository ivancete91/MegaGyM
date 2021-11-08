<?php
    require 'Conexion.php';
    session_start();  

    ?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link href="/php-gym/css/estilosTPrincipal.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="librerias/alertify/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertify/css/themes/default.css">
    <link rel="stylesheet" href="/php-gym/librerias/bootstrap/css/bootstrap.min.css">
    <script src="/php-gym/librerias/bootstrap/css/bootstrap.min.js"></script>
    
    <script src="/php-gym/librerias/jquery-3.2.1.min.js"></script>
    <script src="/php-gym/librerias/alertify/alertify.js"></script>
    <script src="/php-gym/js/funciones.js"></script>


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
				
				<li><a href="">Mi perfil</a>
					<ul>
						<li><a href="perfilUsuario.php">Ver datos</a></li>
						<li><a href="logout.php">Cerrar sesión</a></li>
					</ul>
				</li>
			</ul>
	</div>
   
 <div class="table-turnos">
    <table class="tabla-turnos" id= "tabla-turnos">
        <tr>
        <th>ID</th>
        <th>Dia</th>
        <th>Hora inicio</th>
        <th>Hora fin</th>
        <th>Disponibilidad</th>
        <th>Acciones</th>
        <th></th>
        </tr>

    <?php
        $data =  (new DateTime())->format('Y-m-d');
        $sql = "select id_turno, dia, hora_inicio, hora_fin, disponibilidad from turnos where dia >= '$data' ";
        $result = $mysqli->query($sql);
        $row_cnt = $result->num_rows;
        if($row_cnt == 0){
            echo "Usted no tiene turnos para elegir. Consultar al administrador";
        }else{
        while($mostrar = mysqli_fetch_array($result)){
    ?>
    <tr>
        <td><?php echo $mostrar['id_turno']?></td>       
        <td><?php echo $mostrar['dia']?></td>
        <td><?php echo $mostrar['hora_inicio']?></td>
        <td><?php echo $mostrar['hora_fin']?></td>
        <td><?php echo $mostrar['disponibilidad']?></td>
        <td><button type="button" class="btn btn-lg btn-primary" onClick="preguntarSiNo('<?php echo $mostrar['id_turno']?>')"></button>Asignar</td>
        <td><button type="button" class="btn btn-secondary btn-lg" onClick="asignarTurno('<?php echo $mostrar['id_turno']?>')"></button>Cancelar</td>
    </tr>
    <?php 
        }
        }
    ?>
    </table>

</div>
    <footer>
        <h2>
           Concentrate en lo que deseas
        </h2>
    </footer>
</body>
</html>
    
