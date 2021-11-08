<?php
    require 'Conexion.php';
    session_start();  


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
                
                <div class="table-turnos">
                    <h4>Turnos disponibles para musculación</h4>
                    <br>
                    <table class="table table-bordered table-dark" id= "turnosID">
                        <tr id= "miTablaPersonalizada">

                        <th>Dia</th>
                        <th>Hora inicio</th>
                        <th>Hora fin</th>
                        <th>Disponibilidad</th>
                        <th colspan ="2">Acciones</th>

                        </tr>

                    <?php
                        $data =  (new DateTime())->format('Y-m-d');
                        $sql = "select id_turno, dia, hora_inicio, hora_fin, disponibilidad from turnos where dia >= '$data' ";
                        $result = $mysqli->query($sql);
                        $row_cnt = $result->num_rows;
                        if($row_cnt == 0){
                    ?>       <div class="alert alert-primary" role="alert">
                                Usted no tiene disponibles turnos para elegir. Ante cualquier duda consulte con el administrador <a href="../php-gym/Contacto.php">aquí</href>
                            </div>
                    <?php    }else{
                        while($mostrar = mysqli_fetch_array($result)){
                    ?>
                    <tr>       
                        <td><?php $oldDate = $mostrar['dia'];
                        $arr = explode('-', $oldDate);
                        $newDate = $arr[2].'-'.$arr[1].'-'.$arr[0];
                        echo $newDate?></td>
                        <td><?php echo $mostrar['hora_inicio']?></td>
                        <td><?php echo $mostrar['hora_fin']?></td>
                        <td><?php echo $mostrar['disponibilidad']?></td>
                        <td><button type="button" class="btn btn-lg btn-primary" onClick="preguntarSiNo('<?php echo $mostrar['id_turno']?>')"></button>Asignar</td>
                        <td><button type="button" class="btn btn-secondary btn-lg" onClick="preguntarSiNoCancelar('<?php echo $mostrar['id_turno']?>')"></button>Cancelar</td>
                    </tr>
                    <?php 
                        }
                        }
                    ?>
                    </table>
            </div>
        </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js2/scripts.js"></script>
    </body>
</html>
