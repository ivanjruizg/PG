
function verPeriodoRecepcion(periodo, fechaInicio, fechaLimite, fechaSustentacion) {


    $('#editar-periodo').modal({
        show: true,
        backdrop: 'static'
    });

    $("#periodo").val(periodo);

    $("#fecha-inicio").val(fechaInicio);
    $("#fecha-limite").val(fechaLimite);

    $("#fecha-sustentacion").val(fechaSustentacion);

}



function cambiarFechas() {


    event.preventDefault();

    $.ajax({


        url: $("#cambiar-fechas").attr("action"),
        type: $("#cambiar-fechas").attr("method"),
        data: $("#cambiar-fechas").serialize(),

        success: function (valores) {

            $('#editar-periodo').modal('hide');

        }, error: function () {

            alert("Error");
        }
    });

    return false;

}
