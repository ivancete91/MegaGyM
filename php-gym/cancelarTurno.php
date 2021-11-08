<?php 
    require_once "Conexion.php";
    session_start();
    $id_turno = $_POST['id'];
    
    $id_user = $_SESSION['id_usuario'];

    $result = $mysqli -> query("SELECT fk_turno FROM usuarios_turnos WHERE fk_usuario = '$id_user' AND fecha_cancelacion IS NULL and fk_turno = '$id_turno'");
    echo var_dump($id_turno);
    echo var_dump($id_user);
    $row_cnt = $result->num_rows;

    $result1 = false;
    $result2 = false;
    
    if($row_cnt == 1){

        $sql1 = "UPDATE turnos SET disponibilidad = disponibilidad + 1 where id_turno = '$id_turno';";
        echo var_dump($sql1);
        $result1 = $mysqli->query($sql1);
        $data =  (new DateTime())->format('d-m-y');//me agrega un dia, ver si es un problema de la hora de la bd
        $sql2 = "UPDATE  usuarios_turnos SET fecha_cancelacion = '$data' where fk_turno = '$id_turno' and fk_usuario = '$id_user';";
        echo var_dump($sql2); //no me actualiza la tabla bien.
        $result2 = $mysqli->query($sql2);
        $result1 = true;
        $result2 = true;
        echo "hola";

    }else{
        $result1 = false;
        $result2 = false; 
        echo "chau";
    }
    if($result1 && $result2){
        echo 1;echo "hola2";
    }else{
        echo 2; echo "chau2";
    }
    
?>