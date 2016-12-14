function asignarEvaluadores() {


    $.ajax({
        url: $("#form-asignar-evaluadores").attr("action"),
        type: $("#form-asignar-evaluadores").attr("method"),
        data: $("#form-asignar-evaluadores").serialize(),
        success: function (resp) {

            $('#asignar-directores').modal('hide');

            alert(resp);


        }, error: function () {

            alert("Error");

        }
    });


    return false;

}


function verModalAsignarEvaluadores(codigo) {


    $.ajax({
        url: baseUrl+"/coordinador/ver_propuesta",
        type: "POST",
        data: {codigo: codigo},
        success: function (resp) {


            $("#form-asignar-evaluadores")[0].reset();


            valores = eval(resp);


            for (var i = 0; i < valores.length; i++) {


                $("#codigo").val(codigo);
                $("#titulo-propuesta").val(valores[i].titulo);
                $("#fecha").val(valores[i].fecha_recepcion);
                $("#tipo").val(valores[i].tipo_propuesta);


                $("#investigador" + (i + 1)).val(valores[i].estudiante);

                $(".inv" + (i + 1)).show();


            }


            $('#modal-asignar-evaluadores').modal({
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
