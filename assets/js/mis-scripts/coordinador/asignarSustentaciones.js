

$(document).ready(function () {


    $('#datatable-listado-sustentaciones-disponibles').DataTable();




    $("#titulo-fecha-sustentacion").html("Asignar sustentaciones para el "+fechaActual());

    $("#datepicker").datepicker({
        firstDay: 1,
        onSelect: function (date) {

            consultarHorarioDeSustentaciones(date);

            $("#titulo-fecha-sustentacion").html("Asignar sustentaciones para "+fechaEnEspañol(date));


        },
    });



});



propuestas = [];
propuestasSeleccionadas=[];



function quitarPropuestaDeHorarioDeSustentacion(codigoHorario) {


    var url =  baseUrl+"/coordinador/quitar_propuesta_horario_sustentacion";
    var pregunta = confirm('¿Esta seguro?');
    if(pregunta==true){
        $.ajax({

            type:'POST',
            url:url,
            data:'codigo='+codigoHorario,
            success: function(resp){


                for (var i = 0 ; i<propuestas.length; i++){


                    var valor = propuestas[i];

                    valores = valor.split(",");

                    if (codigoHorario==valores[1]){

                               delete propuestasSeleccionadas[i];

                    }


                }



                console.log(propuestasSeleccionadas.toString());


                $("#"+codigoHorario).html("");
            }
        });
        return false;
    }else{
        return false;
    }

}




function selecionarPropuestaParaAsignarSustentacion(codigoHorario,codigoPropuesta,tituloPropuesta) {

    propuestas.push(codigoPropuesta+","+codigoHorario);

    propuestasSeleccionadas.push(codigoPropuesta);

    $("#"+codigoHorario).html(tituloPropuesta);

    cerrarModalId('modal-asignar-sustentaciones');




}

function consultarHorarioDeSustentaciones(date) {



    $.ajax({
        url:baseUrl+"/coordinador/consultar_horario_de_sustentacion",
        type:"GET",
        data:{date:date},
        success: function (resp) {


                $("#horario").html(resp);


        }, error: function () {

            alert("Error");

        }
    });


    return false;
}



function abrirModalPropuestasParaSustentar(pos,codigo) {




    $.ajax({
        url: baseUrl+"/coordinador/asignar_sustentaciones",
        data: {pos:pos,propuestasSeleccionadas:propuestasSeleccionadas.toString()},
        type: "POST",
        success: function (resp) {

            //  console.log(resp);



            $("#propuestas-dirigidas").html(resp);



            abrirModalId('modal-asignar-sustentaciones');
            $('#datatable-asignar-sustentaciones').DataTable();

        },error: function () {

            alert("Error");

        }
    });
    return false;

}




function cancelar() {



    location.reload();


}

function asignarSustentaciones(){

    var fecha = $("#fecha").val();
    var aula = $("#aula").val();



    if(propuestas.length>0) {

        $.ajax({

            type: "POST",
            data: {propuestas: propuestas},
            // data: {cdp_detalles: cdp_detalles, cdps: cdps},
            url: baseUrl + "/coordinador/crear_sustentaciones",
            success: function (resp) {

                // location.reload(true);

                alert(resp);


            }, error: function () {


                alert("Error");


            }
        });


    }
    return  false;
}



