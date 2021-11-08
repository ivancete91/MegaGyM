<?php 
    require_once "Conexion.php";
    session_start();

    $id_template = $_POST['id_template'];
 
    

    $sql = "UPDATE templates SET vigente = 0 where id_template = '$id_template'; INSERT INTO templates  (html, componente,vigente) VALUES ('$html_template', 'Inicio', 1); ";
    $result = $mysqli->query($sql);
    

?>