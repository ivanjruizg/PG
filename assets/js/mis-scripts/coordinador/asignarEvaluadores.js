$(document).ready(function () {

    $('#datatable-asignar-evaluadores').DataTable();


    $("#evaluador1").autocomplete({
        source: baseUrl+"/coordinador/consultar_docentes",
        minLength: 1,
        appendTo: "#modal-asignar-evaluadores",
        select: function(event, ui) {
            event.preventDefault();

            $('#evaluador1').val(ui.item.value);

        }
    });


    $("#evaluador2").autocomplete({
        source: baseUrl+"/coordinador/consultar_docentes",
        minLength: 1,
        appendTo: "#modal-asignar-evaluadores",
        select: function(event, ui) {
            event.preventDefault();

            $('#evaluador2').val(ui.item.value);

        }
    });


});




function asignarEvaluadores() {


    $.ajax({
        url: $("#form-asignar-evaluadores").attr("action"),
        type: $("#form-asignar-evaluadores").attr("method"),
        data: $("#form-asignar-evaluadores").serialize(),
        success: function (resp) {



            cerrarModalId('modal-asignar-evaluadores');


            alert(resp);


        }, error: function () {

            alert("Error");

        }
    });


    return false;

}





function verModalAsignarEvaluadores(codigo) {

    $(".inv1").hide();
    $(".inv2").hide();
    $(".inv3").hide();


    $.ajax({
        url: baseUrl+"/coordinador/ver_propuesta_con_evaluadores",
        type: "POST",
        data: {codigo: codigo},
        success: function (resp) {







            console.log(valores);

            abrirModalId('modal-asignar-evaluadores');


            $('#codigo').val(codigo);


        }, error: function () {

            alert("Error");

        }
    });
    return false;

}



