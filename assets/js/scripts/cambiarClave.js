$(document).ready(function () {



    $('#mensaje').hide();





});


function comprobarClaves() {

    var claveNueva = $('#clave_nueva').val();
    var claveConfirmada = $('#clave_confirmada').val();

    if (claveConfirmada != claveNueva && claveConfirmada!="") {

        $("#c").addClass("has-error");

        $('#mensaje').show();

        $('input[type="submit"]').attr('disabled', 'disabled');

    } else if(claveConfirmada==claveNueva) {

        $("#c").removeClass("has-error");

        $('#mensaje').hide();

        $('input[type="submit"]').removeAttr('disabled');
    }


    return false;
}