

function registroEstudiante(){



    $('#loading').addClass("glyphicon glyphicon-refresh glyphicon-refresh-animate");
    event.preventDefault();
    $.ajax({
        url:$("#form-inscripcion-estudiante").attr("action"),
        type:$("#form-inscripcion-estudiante").attr("method"),
        data:$("#form-inscripcion-estudiante").serialize(),
        success:function(resp){





            console.log(resp);


            if(resp=="correo-duplicado") {


                $("#email").focus();
                $("#email").addClass("validar");


                $('#loading').removeClass("glyphicon glyphicon-refresh glyphicon-refresh-animate");
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