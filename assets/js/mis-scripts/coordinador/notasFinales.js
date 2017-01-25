

function verModalEvaluacion(codigo) {



    $("#form-publicar-nota-final")[0].reset();


    $.ajax({

        url: baseUrl+"/coordinador/ver_evaluacion_propuesta",
        type: "POST",
        data: {codigo: codigo},
        appendTo: "#form-asignar-directores",
        success: function (resp) {





            valores = eval(resp);

            for (var i = 0; i < valores.length; i++) {


                $("#codigo").val(codigo);
                $("#titulo-propuesta").val(valores[i].titulo);
                $("#fecha").val(valores[i].fecha_recepcion);
                $("#tipo").val(valores[i].tipo_propuesta);

                $("#evaluador1").val(valores[i].evaluador1);
                $("#evaluador2").val(valores[i].evaluador2);

                $("#nota-evaluador1").val(valores[i].nota1);
                $("#nota-evaluador2").val(valores[i].nota2);




                if( valores[i].nota2==null || valores[i].nota1===null){


                    $('#publicar-nota-final').prop("disabled",true);

                }else {

                    var n1 = parseFloat(valores[i].nota1);

                    var n2 = parseFloat( valores[i].nota2);


                    var notaFinal = (n1+n2)/2;

                    $("#nota-final").val(notaFinal);


                    $("#desc").val(descripcionNota(notaFinal));


                }


            }

            abrirModalId('modal-asignar-directores');

            $('#codigo').val(codigo);



            console.log(valores);

        }, error: function () {

            alert("Error");

        }
    });
    return false;

}



function descripcionNota(nota){

   var  descripcion_nota="";



    nota = parseFloat(nota);

    if(nota<3){


        descripcion_nota="RECHAZADA";

    }else if(nota>=3 && nota<3.7){

        descripcion_nota="ACEPTADA CON MODIFICACIONES MAYORES";

    }
    else if(nota>=3.7 && nota<4.3){

        descripcion_nota="ACEPTADA CON MODIFICACIONES MENORES";

    }else if(nota>=4.3){


        descripcion_nota="ACEPTADA";
    }


    return descripcion_nota;
}