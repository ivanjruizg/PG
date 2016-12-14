

function comprobarClaves() {

    var claveNueva = $('#clave_nueva').val();
    var claveConfirmada = $('#clave_confirmada').val();

    if (claveConfirmada != claveNueva && claveConfirmada!="") {

        $("#c").addClass("has-error");
        var mensaje = '<div class="alert alert-danger"><strong>Error!</strong> Las claves de acceso no coinciden </div>';

        $('#mensaje').html(mensaje);

        $('input[type="submit"]').attr('disabled', 'disabled');





    } else if(claveConfirmada==claveNueva) {

        $("#c").removeClass("has-error");

        $('#mensaje').html("");

        $('input[type="submit"]').removeAttr('disabled');
    }


    return false;
}


function cambiarClave() {

    event.preventDefault();

    $.ajax({


        url: $("#cambiar-clave").attr("action"),
        type: $("#cambiar-clave").attr("method"),
        data: $("#cambiar-clave").serialize(),

        success: function (resp) {

            var resps= parseInt(resp);

            if(resps==0){


                alert();

                var mensaje = '<div class="alert alert-danger"><strong>Error!</strong> Debe escribir la clave de acceso actual correctamente</div>';

                $('#mensaje').html(mensaje).show(200).delay(4000).hide(200);
            //    $('#mensaje').html(mensaje).show(200).delay(2000).hide(200);


            }else {

                var mensaje = '<div class="alert alert-info"><strong>Exito!</strong> Se ha cambiado su clave de acceso correctamente</div>';

                $("#cambiar-clave")[0].reset();
                $('#mensaje').html(mensaje).show(200).delay(4000).hide(200);

            }


        }, error: function () {

            alert("Error");
        }
    });

    return false;

}