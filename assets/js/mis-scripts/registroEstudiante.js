

function registroEstudiante(){

    event.preventDefault();
    $.ajax({
        url:$("#form-inscripcion-estudiante").attr("action"),
        type:$("#form-inscripcion-estudiante").attr("method"),
        data:$("#form-inscripcion-estudiante").serialize(),
        success:function(resp){


            alert(resp);

            if(resp=="correo-duplicado") {


                $("#email").focus();
                $("#email").addClass("validar");


                $("#error-correo").html('<div class="alert alert-danger"> <strong>¡Correo duplicado!</strong>  Ingresaste un correo </div>');



            }else {
                window.location.href=resp;
            }

        }
    });


    return false;
}
