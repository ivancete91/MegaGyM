function preguntarSiNo(id){
    alertify.confirm('Asignación de turno', '¿Está seguro que quiere asignarse el turno?', function(){ asignarTurno(id) }
                , function(){ alertify.error('Cancelar')});
}


function asignarTurno(id){
    cadena="id=" + id;

    $.ajax({
        type:"POST",
        url: "/php-gym/asignarTurno.php",
        data: cadena,
        success:function(r){

            if(r==1){
                $('#tabla-turnos').load('/php-gym/turnos_principal2.php');
                location.reload(true);
                alertify.success("Turno asignado");                               
            }else{
                alertify.error("Usted ya eligio ese turno");
            }                
        }
    });
}

function preguntarSiNoCancelar(id){
    alertify.confirm('Cancelación de turno', '¿Está seguro que desea cancelar el turno?', function(){ cancelarTurno(id) }
                , function(){ alertify.error('Cancelar')});
}


function cancelarTurno(id){
    cadena="id=" + id;

    $.ajax({
        type:"POST",
        url: "/php-gym/cancelarTurno.php",
        data: cadena,
        success:function(r){

            if(r==1){
                $('#tabla-turnos').load('/php-gym/turnos_principal2.php');
                location.reload(true);
                alertify.success("Turno Cancelado");                               
            }else{
                alertify.error("No se pudo cancelar");
            }                
        }
    });

    function refrescar(){
        header("Refresh:5");
    }
}

function mostrar(){
    document.getElementById("ed-template").style.display ="block";
}

function preguntarSiNoModificarTemplate(id){
    alertify.confirm('Modificar Template', '¿Está seguro que desea modificar el template?', function(){ modificar(id) }
                , function(){ alertify.error('Cancelar')});
}

function modificar(id){
    cadena="id=" + id;
    $.ajax({
        type:"POST",
        url: "/php-gym/cargarTemplate.php",
        data: cadena,
        success:function(r){
            if(r==1){
                location.reload(true);
                alertify.success("Template actualizado");                               
            }else{
                alertify.error("No se pudo actualizar el template");
            }                
        }
    });
}