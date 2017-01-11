

$(document).ready(function () {

    $('#datatable-horarios-sustentaciones').DataTable();
    $('#datatable-asignar-sustentaciones').DataTable();
    $('#datatable-listado-sustentaciones-disponibles').DataTable();

});



propuestas = [];
propuestasSeleccionadas=[];



function quitarPropuestaDeHorarioDeSustentacion(codigo) {


    var url =  baseUrl+"/coordinador/quitar_propuesta_horario_sustentacion";
    var pregunta = confirm('¿Esta seguro?');
    if(pregunta==true){
        $.ajax({
            type:'POST',
            url:url,
            data:'codigo='+codigo,
            success: function(registro){


                $("#"+codigo).html("");
            }
        });
        return false;
    }else{
        return false;
    }

}




function selecionarPropuestaParaAsignarSustentacion(pos,codigo,propuesta) {

    propuestas.push(codigo+","+pos);

    propuestasSeleccionadas.push(codigo);

    $("#"+pos).html(propuesta);

    cerrarModalId('modal-asignar-sustentaciones');

}



function abrirModalPropuestasParaSustentar(pos,codigo) {




    $.ajax({
        url: baseUrl+"/coordinador/asignar_sustentaciones",
        data: {pos:pos,propuestasSeleccionadas:propuestasSeleccionadas.toString()},
        type: "POST",
        success: function (resp) {

            //  console.log(resp);

            $('#hora-susetentacion').html("Hola");

            $("#propuestas-dirigidas").html(resp);



            $('#modal-asignar-sustentaciones').modal({
                show: true,
                backdrop: 'static'
            });



        },error: function () {

            alert("Error");

        }
    });
    return false;

}



function asignarSustentaciones(){

    var fecha = $("#fecha").val();
    var aula = $("#aula").val();


    $.ajax({

        type: "POST",
        data: {propuestas: propuestas},
        // data: {cdp_detalles: cdp_detalles, cdps: cdps},
        url: baseUrl+"/coordinador/crear_sustentaciones",
        success: function (msg) {

            // location.reload(true);


        }
    });


    return  false;
}



