function abrirModalFormatoDeEvaluacion(codigo,titulo) {


    // $('#formu')[0].reset();

    abrirModalId("modal-formato-evaluacion");

    $('#codigo-propuesta').val(codigo);
    $('#titulo').html(titulo);

}



function calcularNota() {

    var notaFinal=0;
    var nota=0;

    for (var i = 1;i<=8;i++){

        var valor = parseFloat($('#nota-p'+i).val());


        if(!isNaN(valor)){

            var porc = parseFloat($('#porc-p'+i).val());
            nota = valor*porc;
            notaFinal+=nota;


        }

       }


    $("#nota").val(formatoDecimal(notaFinal,2));

}