<?php
    require 'Conexion.php';
    session_start();

    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];
    
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
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <<img class="imagen1" src="img/intro.jpg" width="200" height="200">
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Inicio</a>
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
                                <li class="nav-item active"><a class="nav-link" href="../php-gym/Contacto.php">Contacto</a></li>
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

                <button type="button" id="btn-template" class="btn btn-danger btn-sm" <?php if ($rol != 'Administrador'){ ?> style="display: none;" <?php   } ?> onClick= "mostrar()">Mostrar</button>
                <div class="editor-template" id="ed-template" style="display: none;">
                <?php 
                    $result = $mysqli -> query("SELECT id_template, html FROM templates WHERE vigente = 1 and componente = 'Inicio'");
                    $mostrar = mysqli_fetch_array($result);

                ?>
                <form action="../php-gym/cargarTemplate.php" method="post">
                    <textarea name="text-template" id="txt-tmp" cols="200" rows="10"><?php echo $mostrar['html']?></textarea>
                    <button type="button" id="btn-template-ed" class="btn btn-danger btn-sm" onClick= "preguntarSiNoModificarTemplate(<?php echo $mostrar['id_template']?>)">Modificar</button>
                </form>
                </div>

                <div class="container-fluid">
                    <h1 class="mt-4">Bienvenidos a MegaGym</h1>
                    <body>
                        <br>
                        <br>
                        <p>
                            <?php  
                                
                                echo $mostrar['html'];
                            
                            ?>
                        </p>
                    </body>
                </div>

                <div class="galeria">
                     <div class="musc">
                        <img class ="imag" src="img/pesas.jpg">
                     </div>     
                     <div class="musc">
                         <img class ="imag" src="img/piernas.jpg">
                     </div>
                     <div class="musc">
                        <img class ="imag" src="img/Cinta-correr-1.jpg">
                     </div>  
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js2/scripts.js"></script>
        <script src="js/funciones.js"></script>
    </body>
</html>
