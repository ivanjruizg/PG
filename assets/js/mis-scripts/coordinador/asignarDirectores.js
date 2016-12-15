function verModalAsignarDirectores(codigo) {


    $(".inv1").hide();
    $(".inv2").hide();
    $(".inv3").hide();


    $.ajax({

        url: "http://localhost/pg/coordinador/ver_propuesta",
        type: "POST",
        data: {codigo: codigo},
        success: function (resp) {


            $("#form-asignar-directores")[0].reset();


            valores = eval(resp);


            for (var i = 0; i < valores.length; i++) {


                $("#codigo").val(codigo);
                $("#titulo-propuesta").val(valores[i].titulo);
                $("#fecha").val(valores[i].fecha_recepcion);
                $("#tipo").val(valores[i].tipo_propuesta);


                $("#investigador" + (i + 1)).val(valores[i].estudiante);

                $(".inv" + (i + 1)).show();


            }


            $('#modal-asignar-directores').modal({
                show: true,
                backdrop: 'static'
            });

            $('#codigo').val(codigo);


        }, error: function () {

            alert("Error");

        }
    });
    return false;

}


function asignarDirectores() {


    $.ajax({
        url: $("#form-asignar-directores").attr("action"),
        type: $("#form-asignar-directores").attr("method"),
        data: $("#form-asignar-directores").serialize(),
        success: function (resp) {

            $('#modal-asignar-directores').modal('hide');

            alert(resp);


        }, error: function () {

            alert("Error");

        }
    });


    return false;

}

