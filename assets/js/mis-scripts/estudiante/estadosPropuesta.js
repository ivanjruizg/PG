

function verDirectoresPropuesta(codigo) {

    // alert(codigo);

    $(".inv1").hide();
    $(".inv2").hide();
    $(".inv3").hide();


    $.ajax({

         url: $("#form-mostrar-propuesta-directores").attr("action"),
        //url: baseUrl+"/estudiante/ver_propuesta",
        type: $("#form-mostrar-propuesta-directores").attr("method"),
        //type: "POST",
        data: {codigo: codigo},
        //appendTo: "#form-asignar-directores",
        success: function (resp) {

            //console.log(resp);

            $("#form-mostrar-propuesta-directores")[0].reset();


            valores = eval(resp);
            console.log(valores);

            for (var i = 0; i < valores.length; i++) {


                $("#codigo").val(codigo);
                $("#titulo-propuesta").val(valores[i].titulo);
                $("#fecha").val(valores[i].fecha_recepcion);
                $("#tipo").val(valores[i].tipo_propuesta);
                $("#director").val(valores[i].director);

                if(valores[i].co_director==null){
                    $('#label-codirector').hide();
                    $("#co-director").hide();
                }
                else{

                    $('#label-codirector').show();
                    $("#co-director").val(valores[i].co_director);
                    $("#co-director").show();

                }


                $("#investigador" + (i + 1)).val(valores[i].estudiante);

                $(".inv" + (i + 1)).show();


            }

            abrirModalId('modal-ver-directores-asignados');

            $('#codigo').val(codigo);


        }, error: function () {

            alert("Error");

        }
    });
    return false;


}



function verEvaluadoresAsignados(codigo) {

    // alert(codigo);

    $(".inv1").hide();
    $(".inv2").hide();
    $(".inv3").hide();


    $.ajax({

        url: $("#form-mostrar-evaluadores-asignados").attr("action"),
        type: $("#form-mostrar-evaluadores-asignados").attr("method"),
        data: {codigo: codigo},
        //appendTo: "#form-asignar-directores",
        success: function (resp) {

            //console.log(resp);

            $("#form-mostrar-evaluadores-asignados")[0].reset();


            valores = eval(resp);
           // console.log(valores);

            for (var i = 0; i < valores.length; i++) {


                $("#codigo-e").val(codigo);
                $("#titulo-propuesta-e").val(valores[i].titulo);
                $("#fecha-e").val(valores[i].fecha_recepcion);
                $("#tipo-e").val(valores[i].tipo_propuesta);


                $("#director-e").val(valores[i].director);

                if(valores[i].co_director==null){
                    $('#label-codirector-e').hide();
                    $("#co-director-e").hide();
                }
                else{

                    $('#label-codirector-e').show();
                    $("#co-director-e").val(valores[i].co_director);
                    $("#co-director-e").show();

                }

                $("#evaluador1").val(valores[i].evaluador1);
                $("#evaluador2").val(valores[i].evaluador2);

                $("#investigador" + (i + 1)+"-e").val(valores[i].estudiante);

                $(".inv" + (i + 1)).show();

            }

            abrirModalId('modal-ver-evaluadores-asignados');

            $('#codigo').val(codigo);


        }, error: function () {

            alert("Error");

        }
    });
    return false;


}


function verSustentacionAsignada(codigo) {

    // alert(codigo);

    $(".inv1").hide();
    $(".inv2").hide();
    $(".inv3").hide();


    $.ajax({

        url: $("#form-mostrar-sustentacion-asignados").attr("action"),
        type: $("#form-mostrar-sustentacion-asignados").attr("method"),
        data: {codigo: codigo},
        //appendTo: "#form-asignar-directores",
        success: function (resp) {

            //console.log(resp);

            $("#form-mostrar-sustentacion-asignados")[0].reset();


            valores = eval(resp);
            // console.log(valores);

            for (var i = 0; i < valores.length; i++) {


                $("#codigo-s").val(codigo);
                $("#titulo-propuesta-s").val(valores[i].titulo);
                $("#fecha-s").val(valores[i].fecha_recepcion);
                $("#tipo-s").val(valores[i].tipo_propuesta);


                $("#director-s").val(valores[i].director);

                if(valores[i].co_director==null){
                    $('#label-codirector-s').hide();
                    $("#co-director-s").hide();
                }
                else{

                    $('#label-codirector-s').show();
                    $("#co-director-s").val(valores[i].co_director);
                    $("#co-director-s").show();

                }

                $("#evaluador1-s").val(valores[i].evaluador1);
                $("#evaluador2-s").val(valores[i].evaluador2);

                $("#investigador" + (i + 1)+"-s").val(valores[i].estudiante);

                $(".inv" + (i + 1)).show();

                $("#aula").val(valores[i].aula_sustentacion);
                $("#fecha-sustentacion").val(valores[i].fecha_sustentacion);
                $("#hora").val(valores[i].hora_sustentacion)


            }

            abrirModalId('modal-ver-sustentacion-asignados');

            $('#codigo').val(codigo);


        }, error: function () {

            alert("Error");

        }
    });
    return false;


}



function verNotaFinal(codigo) {

    // alert(codigo);

    $.ajax({

        url: baseUrl+"/estudiante/ver_nota_final",
        type: "POST",
        data: {codigo: codigo},
        //appendTo: "#form-asignar-directores",
        success: function (resp) {

            //console.log(resp);


$("#observaciones").html(resp);



            abrirModalId('modal-ver-nota-sustentaciones');

           // $('#codigo').val(codigo);


        }, error: function () {

            alert("Error");

        }
    });
    return false;


}
