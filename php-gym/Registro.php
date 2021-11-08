<?php
require 'Conexion.php';

$message = '';

if (!empty($_POST['correo']) && !empty($_POST['password'])) {

  $correo = $_POST['correo'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $fecha_nac = $_POST['fecha_nac'];
  $numero_doc = $_POST['numero_doc'];
  $calle = $_POST['calle'];
  $numero = $_POST['numero'];
  $provincia = $_POST['provincia'];
  $localidad = $_POST['localidad'];  
  $password = $_POST['password'];  
  $fecha_alta =  (new DateTime())->format('d-m-y');
  $rol = 'Usuario';
  
  $sql = "INSERT INTO usuarios (correo, nombre,apellido,fecha_nac, numero_doc, calle, numero, provincia, localidad,  password, fecha_alta, rol) VALUES ($correo,  $nombre, $apellido, $fecha_nac,  $numero_doc,  $calle,  $numero,  $provincia,  $localidad,  $password,  $fecha_alta, $rol);";
  
  var_dump($sql);
  $result1 = $mysqli->query($sql);

  if($result1){
      echo "funciono";
  }else{
      echo "no funciono";
  }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>MegaGym</title>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        

        <link href="css2/styles.css" rel="stylesheet" />

        <link rel="stylesheet" type="text/css" href="librerias/alertify/css/alertify.css">
        <link rel="stylesheet" type="text/css" href="librerias/alertify/css/themes/default.css">
        <link rel="stylesheet" href="/php-gym/librerias/bootstrap/css/bootstrap.min.css">
        <script src="/php-gym/librerias/bootstrap/css/bootstrap.min.js"></script>
        
        <script src="/php-gym/librerias/jquery-3.2.1.min.js"></script>
        <script src="/php-gym/librerias/alertify/alertify.js"></script>
        <script src="/php-gym/js/funciones.js"></script>
        
    </head>
    <body>

    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <<img class="imagen1" src="img/intro.jpg" width="200" height="200">
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../php-gym/principal2.php">Inicio</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../php-gym/turnos_principal2.php">Mis Turnos</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Mis rutinas</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Acerca De</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <div class= "GYM">MegaGym</div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="#!">Contacto</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Institucional</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mi Perfil</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="datosPersonales.php">Editar datos personales</a>
                                        <a class="dropdown-item" href="#!">Abonar mes</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="logout.php">>Salir</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->

    
        <form action="Registro.php" method='POST' class="formulario_registro" name = "form_reg">
                        
                <h4>Formulario de registro:</h4>
                <ul>
                <br>
                <li>
                    <label for="name">Nombre</label>
                    <input type="text" name="nombre" placeholder="Nombre" required autocomplete="off">
                </li>

                <li>
                    <label for="name">Apellido</label>
                    <input type="text" name="apellido" placeholder="Apellido" required autocomplete="off">
                </li>

                <li>
                    <label for="name">Fecha de Nacimiento</label>
                    <input type="date" name="fecha_nac" value="1990-07-22" min="1990-01-01" max="2021-12-31">
                </li>
                
                <li>
                    <label for="name">Numero de documento</label>
                    <input type="number" name="numero_doc" placeholder="DNI" required autocomplete="off">
                </li>

                <li>
                    <label for="name">Calle</label>
                    <input type="text" name="calle" placeholder="Calle" required autocomplete="off">
                </li>

                <li>
                    <label for="name">N°</label>
                    <input type="number" name="numero" placeholder="Altura" required autocomplete="off">
                </li>

                <li>
                    <label for="name">Provincia</label>
                
                    <select name ="provincia" placeholder="Provincia" required>
                        <option value="" selected disabled hidden>Seleccione</option>
                        <option value="Ciudad autonoma de Buenos Aires">Ciudad autonoma de Buenos Aires</option>
                        <option value="Provincia de Buenos Aires">Provincia de Buenos Aires</option>
                    </select>
                </li>
                <li>

                    <label for="name">Localidad</label>
                    <input type="text" name="localidad" placeholder="Localidad" required autocomplete="off">
                    
                </li>
                
                <li>
                    
                    <label for="name">Correo</label>
                    <input type="mail" name="correo" placeholder="Correo" required autocomplete="off">
                    
                </li>
            
                <li>
                    <label for="name">Contraseña</label>
                    <input type="password" name="password" placeholder="Contraseña" required autocomplete="off">
                </li>
            
                <li class="btn">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </li>
            </ul>
        </form>
    
        </div>
    </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        
    </body>
</html>
