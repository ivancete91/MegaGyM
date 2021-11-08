<?php 

    $destino = "megagyminfo@gmail.com";
    $nombre = $_POST["name"];
    $correo = $_POST["correo"];
    $asunto = $_POST["asunto"];
    $mensaje = $_POST["msg"];
    $contenido = "Nombre: " . $nombre . "\nCorreo: " . $correo . "\nAsunto: " . $asunto . "\nMensaje: " . $mensaje;
    mail($destino, $asunto, $contenido);
    //header("Location:");
?>