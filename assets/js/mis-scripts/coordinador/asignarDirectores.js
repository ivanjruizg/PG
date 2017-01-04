
$(document).ready(function () {



 //    alert("Ya.... cargo esta miertada");

    $("#autocomplete").autocomplete({
        source: baseUrl+"/coordinador/consultar_docentes",
        minLength: 1,
        select: function(event, ui) {
            event.preventDefault();




            console.log("Ya..."+ui);

            /*
            $('#director').val(ui.item.label);
            $('#correo-investigador2').val(ui.item.value);


            */

        }
    });

    $("#co-director").autocomplete({
        source: baseUrl+"/coordinador/consultar_docentes",
        minLength: 1,
        select: function(event, ui) {
            event.preventDefault();



/*            $('#investigador3').val(ui.item.label);
            $('#correo-investigador3').val(ui.item.value);*/



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



        }, error: function () {

            alert("Error");

        }
    });


    return false;

}

