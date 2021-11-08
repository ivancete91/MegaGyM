<?php 
    require_once "Conexion.php";
    session_start();
    $id_turno = $_POST['id'];
    
    $id_user = $_SESSION['id_usuario'];

    $result = $mysqli -> query("SELECT fk_turno FROM usuarios_turnos WHERE fk_usuario = '$id_user' AND fecha_cancelacion IS NULL and fk_turno = '$id_turno'");
   
    $row_cnt = $result->num_rows;

    $result1 = false;
    $result2 = false;
    
    if($row_cnt == 0){

        $sql1 = "UPDATE turnos SET disponibilidad = disponibilidad - 1 where id_turno = '$id_turno';";
        $result1 = $mysqli->query($sql1);
        $data =  (new DateTime())->format('d-m-y');
        $sql2 = "INSERT INTO usuarios_turnos values ('$id_user', '$id_turno', '$data' ,null);";
        $result2 = $mysqli->query($sql2);
        $result1 = true;
        $result2 = true;
    }else{
        $result1 = false;
        $result2 = false;
    }
    if($result1 && $result2){
        echo 1;
    }else{
        echo 2;
    }
    

?>