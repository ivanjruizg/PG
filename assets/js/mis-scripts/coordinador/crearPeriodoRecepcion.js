
function crearPeriodoRecepcion() {


    $.ajax({
        url: $("#crear-periodo-recpcion").attr("action"),
        type: $("#crear-periodo-recpcion").attr("method"),
        data: $("#crear-periodo-recpcion").serialize(),
        success: function (resp) {


            $('#mensaje').html(resp).show(200).delay(5500).hide(200);

            $("#crear-periodo-recpcion")[0].reset();


        }, error: function () {


            var mensaje = '<div class="alert alert-danger"><strong>Danger!</strong>Ya existe un periodo de recepcion para ese mes</div>';

            $('#mensaje').html(mensaje).show(200).delay(2000).hide(200);


        }
    });


    return false;
}

