
function cerrarModal() {

    $('#modal-busca-propuesta').modal('hide');
}


function abrirModalPropuetasParaSubirIforme() {



    $.ajax({
        url: "../docente/propuestas_dirigidas2",
        type: "POST",
        success: function (resp) {



            $("#propuestas-dirigidas").html(resp);



            $('#modal-busca-propuesta').modal({
                show: true,
                backdrop: 'static'
            });



        },error: function () {

            alert("Error");

        }
    });
    return false;

}


function selecionarPropuestaParaSubirInforme(codigo, titulo) {



    $("#codigo-propuesta").val(codigo);
    $("#titulo").val(titulo);

    cerrarModal();

}
