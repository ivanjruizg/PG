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




    $.ajax({


        url: $("#cambiar-fechas").attr("action"),
        type: $("#cambiar-fechas").attr("method"),
        data: $("#cambiar-fechas").serialize(),

        success: function (resp) {

            valores = eval(resp);

            if(valores[0].codigo==1){


            $('#mensaje-respuesta').html(valores[0].mensaje).show(200).delay(10000).hide(200);

            }

            else if(valores[0].codigo==2){

                $('#mensaje-respuesta').html(valores[0].mensaje).show(200).delay(2000).hide(200);
                window.setInterval("$('#editar-periodo').modal('hide')",3000, "JavaScript");
                setTimeout(recargar_pagina,3100);
            }


        }, error: function () {

            alert('Error');

        }
    });

    return false;

}

function recargar_pagina() {
    location.reload();
}