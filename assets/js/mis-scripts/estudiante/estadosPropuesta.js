

function verDirectoresPropuesta(codigo) {

    // alert(codigo);

    $(".inv1").hide();
    $(".inv2").hide();
    $(".inv3").hide();


    $.ajax({

         //url: $("#form-mostrar-propuesta-directores").attr("action"),
        url: baseUrl+"/estudiante/ver_propuesta",
        //type: $("#form-mostrar-propuesta-directores").attr("method"),
        type: "POST",
        data: {codigo: codigo},
        //appendTo: "#form-asignar-directores",
        success: function (resp) {

            console.log(resp);

            valores = eval(resp);
            //console.log(valores);

            for (var i = 0; i < valores.length; i++) {

                $("#directores-asignados").html("Director: "+valores[i].director);
                $("#codigo").val(codigo);
                $("#titulo-propuesta").html(valores[i].titulo);
                if(valores[i].co_director==null){
                    $('#co-directores-asignados').hide();
                }
                else{

                    $('#co-directores-asignados').show();
                    $("#co-directores-asignados").html("Co-director= "+valores[i].co_director);
                    $("#co-directores-asignados").show();

                }

            }

            abrirModalId('modal-ver-directores-asignados');


        }, error: function () {

            alert("Error");

        }
    });
    return false;


}



function verEvaluadoresAsignados(codigo) {

    // alert(codigo);
/*

    $(".inv1").hide();
    $(".inv2").hide();
    $(".inv3").hide();
*/


    $.ajax({

        url: baseUrl+"/estudiante/ver_propuesta_con_evaluadores",
        type: "POST",
        data: {codigo: codigo},
        //appendTo: "#form-asignar-directores",
        success: function (resp) {

            //console.log(resp);
            valores = eval(resp);
           // console.log(valores);

            for (var i = 0; i < valores.length; i++) {


                //$("#codigo-e").val(codigo);
                $("#titulo-propuesta-e").html(valores[i].titulo);
                //$("#fecha-e").val(valores[i].fecha_recepcion);
                //$("#tipo-e").val(valores[i].tipo_propuesta);

                //$("#director-e").val(valores[i].director);

                $("#evaluador1").html("Evaluador 1: "+valores[i].evaluador1);
                $("#evaluador2").html("Evaluador 2: "+valores[i].evaluador2);



            }

            abrirModalId('modal-ver-evaluadores-asignados');


        }, error: function () {

            alert("Error");

        }
    });
    return false;


}


function verSustentacionAsignada(codigo) {

    // alert(codigo);

   /* $(".inv1").hide();
    $(".inv2").hide();
    $(".inv3").hide();*/


    $.ajax({

        url: baseUrl+"/estudiante/ver_sustentacion_asignada",
        type:"POST",
        data: {codigo: codigo},
        //appendTo: "#form-asignar-directores",
        success: function (resp) {

            //console.log(resp);

            //$("#form-mostrar-sustentacion-asignados")[0].reset();


            valores = eval(resp);
            console.log(valores);

            for (var i = 0; i < valores.length; i++) {


                $("#titulo-propuesta-s").html(valores[i].titulo);
                $("#evaluador1-s").html("Evaluador 1: "+valores[i].evaluador1);
                $("#evaluador2-s").html("Evaluador 2: "+valores[i].evaluador2);

                $("#aula").html("Aula: "+valores[i].aula_sustentacion);
                $("#fecha-sustentacion").html("Fecha de sustentación: "+valores[i].fecha_sustentacion);
                $("#hora").html("Hora: "+valores[i].hora_sustentacion)


            }

            abrirModalId('modal-ver-sustentacion-asignados');




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
