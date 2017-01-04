
$(document).ready(function () {


    $("#co-director").autocomplete({
        source: baseUrl+"/coordinador/consultar_docentes",
        minLength: 1,
        appendTo: "#modal-asignar-directores",
        select: function(event, ui) {
            event.preventDefault();

            $('#co-director').val(ui.item.value);

        }
    });


    $("#director").autocomplete({
        source: baseUrl+"/coordinador/consultar_docentes",
        minLength: 1,
        appendTo: "#modal-asignar-directores",
        select: function(event, ui) {
            event.preventDefault();

            $('#director').val(ui.item.value);

        }
    });


});



function verModalAsignarDirectores(codigo) {


    $(".inv1").hide();
    $(".inv2").hide();
    $(".inv3").hide();


    $.ajax({

        url: baseUrl+"/coordinador/ver_propuesta",
        type: "POST",
        data: {codigo: codigo},
        appendTo: "#form-asignar-directores",
        success: function (resp) {


            $("#form-asignar-directores")[0].reset();


            valores = eval(resp);
            console.log(valores);

            for (var i = 0; i < valores.length; i++) {


                $("#codigo").val(codigo);
                $("#titulo-propuesta").val(valores[i].titulo);
                $("#fecha").val(valores[i].fecha_recepcion);
                $("#tipo").val(valores[i].tipo_propuesta);
                $("#director").val(valores[i].director);
                $("#co-director").val(valores[i].co_director);


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



        }, error: function () {

            alert("Error");

        }
    });


    return false;

}

