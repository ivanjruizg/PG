$(document).ready(function () {



    $("#investigador2").autocomplete({
        source: baseUrl+"/estudiante/consultar",
        minLength: 1,
        select: function(event, ui) {
            event.preventDefault();



            $('#investigador2').val(ui.item.label);
            $('#correo-investigador2').val(ui.item.value);



        }
    });

    $("#investigador3").autocomplete({
        source: baseUrl+"/estudiante/consultar",
        minLength: 1,
        select: function(event, ui) {
            event.preventDefault();



            $('#investigador3').val(ui.item.label);
            $('#correo-investigador3').val(ui.item.value);



        }
    });




});