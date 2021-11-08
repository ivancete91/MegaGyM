<?php
  require "Conexion.php";
  session_start();

  if (!empty($_POST['correo']) && !empty($_POST['password'])) {
    
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $sql = ("SELECT id_usuario, nombre,apellido, correo, rol FROM usuarios where correo = '$correo' and password = '$password'");
    
    $result = $mysqli->query($sql);

      /* determinar el número de filas del resultado */
    $row_cnt = $result->num_rows;
    

    if($row_cnt == 1){
      $row = $result -> fetch_assoc();
      $_SESSION['id_usuario'] = $row['id_usuario'];
      $_SESSION['nombre'] = $row['nombre']; 
      $_SESSION['apellido'] = $row['apellido'];
      $_SESSION['correo'] = $row['correo'];
      $_SESSION['rol'] = $row['rol'];
      header("Location: principal2.php");

    }else{
        ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Incorrecto!</strong> Debe ingresar bien el nombre usuario o contraseña.
        </div>
        <?php $result->close();
    }
    
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Registro - MegaGym</title>
    <link href="css/estilos.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/php-gym/librerias/bootstrap/css/bootstrap.min.css">
    <script src="/php-gym/librerias/jquery-3.2.1.min.js"></script>
</head>
<body>
    <?php 
        if(!empty($message)): ?>
            <p><?php $message ?></p>
        <?php endif; ?>
    <main>
        <div class="contenedor_todo">
            <div class="caja_trasera">
                <div class="caja_trasera_login">
                <h3>¿Ya tienes una cuenta?</h3>
                <p>Inicia sesion para entrar en la pagina</p>
                <button id="btn_iniciar_sesion">Iniciar Sesion</button>
            </div>
            <div class="caja_trasera_registro">
                <h3>Aun no tienes una cuenta?</h3>
                <h2>Navegar sin cuenta...</h2>
                <a href="./principal2.php"><br>Entrar como invitado</a>
                <a href="./Registro.php"><br>Registrarse</a>
            </div>
          
        </div>
        <!--Formulario de login y registro-->
        <div class="contenedor_login_registro">
            <!--Login-->
            <form action="index.php" method='post' class="formulario_login">
                <h2>Iniciar sesion</h2>
                <input type="mail" name="correo" placeholder="Correo">
                <input type="password" name="password" placeholder="Contraseña">
                <input type="submit" id = "Conectar" value="Entrar" class="btn-entrar" required>
            </form>
      </div>
    </main>   
</body>
</html>