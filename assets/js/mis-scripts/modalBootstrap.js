
function cerrarModalId(id) {

    $('#' + id + '').modal('hide');

}


function abrirModalId(id) {


    $('#'+id+'').modal({
        show: true,
        backdrop: 'static'
    });


}


