/*
 $(document).ready(function () {

 $('#datatable-responsive').DataTable();


 });
 */


function cambiarFechas() {


    event.preventDefault();

    $.ajax({


        url: $("#cambiar-fechas").attr("action"),
        type: $("#cambiar-fechas").attr("method"),
        data: $("#cambiar-fechas").serialize(),

        success: function (valores) {

            $('#editar-periodo').modal('hide');

        }, error: function () {

            alert("Error");
        }
    });

    return false;

}


function verPeriodoRecepcion(periodo, fechaInicio, fechaLimite, fechaSustentacion) {


    $('#editar-periodo').modal({
        show: true,
        backdrop: 'static'
    });

    $("#periodo").val(periodo);

    $("#fecha-inicio").val(fechaInicio);
    $("#fecha-limite").val(fechaLimite);

    $("#fecha-sustentacion").val(fechaSustentacion);

}

function verModalAsignarDirectores(codigo) {


    $(".inv1").hide();
    $(".inv2").hide();
    $(".inv3").hide();


    $.ajax({

        url: "http://localhost/pg/coordinador/ver_propuesta",
        type: "POST",
        data: {codigo: codigo},
        success: function (resp) {


            $("#form-asignar-directores")[0].reset();


            valores = eval(resp);


            for (var i = 0; i < valores.length; i++) {


                $("#codigo").val(codigo);
                $("#titulo-propuesta").val(valores[i].titulo);
                $("#fecha").val(valores[i].fecha_recepcion);
                $("#tipo").val(valores[i].tipo_propuesta);


                $("#investigador" + (i + 1)).val(valores[i].estudiante);

                $(".inv" + (i + 1)).show();


            }


            $('#modal-asignar-directores').modal({
                show: true,
                backdrop: 'static'
            });

            $('#codigo').val(codigo);


        }, error: function () {

            alert("Error");

        }
    });
    return false;

}

function asignarDirectores() {


    $.ajax({
        url: $("#form-asignar-directores").attr("action"),
        type: $("#form-asignar-directores").attr("method"),
        data: $("#form-asignar-directores").serialize(),
        success: function (resp) {

            $('#modal-asignar-directores').modal('hide');

            alert(resp);


        }, error: function () {

            alert("Error");

        }
    });


    return false;

}

function verPropuesta(codigo) {

    $(".inv1").hide();
    $(".inv2").hide();
    $(".inv3").hide();


    $.ajax({
        url: $("#modal-ver-propuesta").attr("action"),
        type: "POST",
        data: {codigo: codigo},
        success: function (resp) {


            $("#mostrar-propuesta")[0].reset();


            valores = eval(resp);


            for (var i = 0; i < valores.length; i++) {


                $("#codigo").val(codigo);
                $("#titulo-propuesta").val(valores[i].titulo);
                $("#fecha").val(valores[i].fecha_recepcion);
                $("#tipo").val(valores[i].tipo_propuesta);


                $("#investigador" + (i + 1)).val(valores[i].estudiante);

                $(".inv" + (i + 1)).show();


            }


            $('#asignar-directores').modal({
                show: true,
                backdrop: 'static'
            });

            $('#codigo').val(codigo);


        }, error: function () {

            alert("Error");

        }
    });
    return false;

}


function asignarEvaluadores() {


    $.ajax({
        url: $("#form-asignar-evaluadores").attr("action"),
        type: $("#form-asignar-evaluadores").attr("method"),
        data: $("#form-asignar-evaluadores").serialize(),
        success: function (resp) {

            $('#asignar-directores').modal('hide');

            alert(resp);


        }, error: function () {

            alert("Error");

        }
    });


    return false;

}


function verModalAsignarEvaluadores(codigo) {


    $.ajax({
        url: "http://localhost/pg/coordinador/ver_propuesta",
        type: "POST",
        data: {codigo: codigo},
        success: function (resp) {


            $("#form-asignar-evaluadores")[0].reset();


            valores = eval(resp);


            for (var i = 0; i < valores.length; i++) {


                $("#codigo").val(codigo);
                $("#titulo-propuesta").val(valores[i].titulo);
                $("#fecha").val(valores[i].fecha_recepcion);
                $("#tipo").val(valores[i].tipo_propuesta);


                $("#investigador" + (i + 1)).val(valores[i].estudiante);

                $(".inv" + (i + 1)).show();


            }


            $('#modal-asignar-evaluadores').modal({
                show: true,
                backdrop: 'static'
            });

            $('#codigo').val(codigo);


        }, error: function () {

            alert("Error");

        }
    });
    return false;

}

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


function cerraModal(id) {

    $('#' + id + '').modal('hide');

}





