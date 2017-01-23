

function registroDocentes(){

    event.preventDefault();
    $.ajax({
        url:$("#form-inscripcion-docente").attr("action"),
        type:$("#form-inscripcion-docente").attr("method"),
        data:$("#form-inscripcion-docente").serialize(),
        success:function(resp){


            if(resp=="correo-duplicado") {


                $("#email").focus();
                $("#email").addClass("validar");


                $("#mensaje").html('<div class="alert alert-danger"> <strong>¡Correo duplicado!</strong>  Ingresaste un correo </div>');



            }else {
                window.location.href=resp;
            }

        }
    });


    return false;
}

function comprobarClavesRegistro() {

    var clave = $('#clave').val();
    var claveConfirmada = $('#clave-confirmada').val();

    if (claveConfirmada != clave && claveConfirmada!="") {

        $("#clave").addClass("validar");
        $("#clave-confirmada").addClass("validar");
        var mensaje = '<div class="alert alert-danger"><strong>Error!</strong> Las claves de acceso no coinciden </div>';

        $('#mensaje').html(mensaje);

        $('input[type="submit"]').attr('disabled', 'disabled');







    } else if(claveConfirmada==clave) {



        $("#clave").removeClass("validar");
        $("#clave-confirmada").removeClass("validar");

        $('#mensaje').html("");

        $('input[type="submit"]').removeAttr('disabled');
    }


    console.log("Yaa");

    return false;
}