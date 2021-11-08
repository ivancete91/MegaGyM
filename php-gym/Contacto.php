<?php
    require 'Conexion.php';
    session_start();

    $correo = $_SESSION['correo'];

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
        <link href="css2/styles_correo.css" rel="stylesheet" />
    </head>
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
                <form action="Correo.php" method="POST">
                    <h2>CONTACTO</h2>
                    <input type="text" name="name" placeholder="Nombre" required="">
                    <input type="email" name="correo" value="<?php echo $correo ?>" required="" readonly>
                    <input type="text" name="asunto" placeholder="Asunto" required=""> 
                    <textarea name="msg" placeholder="Escribir mensaje" required=""></textarea>
                    <input type="submit" value="enviar" id="boton-enviar">
                </form>

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
    </body>
</html>
