


$(document).ready(function () {


    $('#datatable-propuestas-recibidas-periodo-actual').DataTable();

});


function verPropuesta(codigo) {

    $(".inv1").hide();
    $(".inv2").hide();
    $(".inv3").hide();


    $.ajax({
        url:baseUrl+"/coordinador/ver_propuesta",
        type: "POST",
        data: {codigo: codigo},
        success: function (resp) {

            $("#form-mostrar-propuesta")[0].reset();


            valores = eval(resp);


            for (var i = 0; i < valores.length; i++) {


                $("#codigo").val(codigo);
                $("#titulo-propuesta").val(valores[i].titulo);
                $("#fecha").val(valores[i].fecha_recepcion);
                $("#tipo").val(valores[i].tipo_propuesta);


                $("#investigador" + (i + 1)).val(valores[i].estudiante);
                console.log(valores[i].estudiante);

                $(".inv" + (i + 1)).show();


            }

            abrirModalId('modal-ver-propuesta');




            $('#codigo').val(codigo);


        }, error: function () {

            alert("Error");

        }
    });
    return false;

}


function verCartaRemision(codigo) {


    $.ajax({
        url: baseUrl+"/coordinador/verCartaRemision",
        type: "POST",
        data: {codigo: codigo},
        success: function (resp) {



            valores = eval(resp);


            //$("#carta-remision").attr("src","");
            $("#carta-remision").attr("src", "./assets/docs/cartas/" + valores[0].ruta_carta);
//                        $("#carta-remision").attr("src","assets/docs/cartas/"+valores.ruta_carta);


            abrirModalId('ver-carta');


        }, error: function () {

            alert("Error");

        }
    });
    return false;

}


function descargarCarta() {

     var ruta=$('#carta-remision').attr("src");

    var enlace = document.createElement('a');

    enlace.href = ruta;

    enlace.download ="";

    document.body.appendChild(enlace);

    enlace.click();

//Borrrar el elemento
    enlace.parentNode.removeChild(enlace);

}