<!-- page content -->
<div class="right_col" role="main">
    <div class="">


        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Asignar sustentaciones</h2>
                        <ul class="nav navbar-right panel_toolbox">

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">


                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>

                                <th width="10" class="text-center">#</th>
                                <th width="10" class="text-center">Hora</th>
                                <th width="500"> Propuesta </th>


                            </tr>
                            </thead>
                            <tbody>




                            <a ></a>


                            <?php


                            $ci = &get_instance();
                            $ci->load->model("propuestas_model");





                            foreach ($horarios as $horario){

                                    $hora2= "'".$horario['hora']."'";

                                    $codigo_propuesta =-1;

                                    if(isset($horario['codigo_propuesta'])){

                                        $codigo_propuesta=$horario['codigo_propuesta'];


                                    }

                                    echo '<tr>

                                            <td class="text-center">'.$horario['codigo'].'</td>
                                            <td class="text-center">'.$horario['hora'].'</td>
                                            <td id="'.$horario['codigo'].'"  onclick="abrirModalPropuestasParaSustentar('.$horario['codigo'].','.$codigo_propuesta.')">'.$ci->propuestas_model->consultar_titulo($horario['codigo_propuesta']).'</td>
                                              
                                          </tr>';


                                }




                            ?>


                            <script>

                                horas = ['08:00','08:30','09:00','09:30','10:00','10:30','11:00','14:00','14:30','15:00','15:30','16:00','16:30','17:00'];
                                propuestas = [];
                                propuestasSeleccionadas=[];



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


                            </script>



                            </tbody>

                        </table>



                        <div class="container">


                            <form action="" class="form-horizontal" onsubmit="return asignarSustentaciones() ;">

                                <div class="item form-group">


                                    <button type="submit" class="btn btn-primary">Cancel</button>

                                    <input type="submit" class="btn btn-success" value="Subir">


                                </div>


<!--                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary">Cancel</button>

                                        <input type="submit" class="btn btn-success" value="Subir">

                                    </div>
                                </div>
-->

                            </form>



                        </div>



                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<!-- /page content -->

<fieldset>


    <div class="modal fade modal-wide2" id="modal-asignar-sustentaciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"><b>Propuestas disponibles para sustentar  <div id="hora-susetentacion"></div>  </b></h4>
                </div>



                <div class="modal-body">





                    <table id="datatable-calendario" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">


                        <thead>
                        <tr>

                            <th width="5">Codigo</th>
                            <th>Título</th>
                            <th width="5">Evaluadores</th>
                            <th width="5">Seleccionar</th>


                        </tr>
                        </thead>
                        <tbody id="propuestas-dirigidas">




                        </tbody>
                    </table>

                </div>


                <div class="modal-footer">
                    <input type="submit" value="Cerrar" class="btn btn-primary" onclick="cerrarModalId('modal-busca-propuesta')" id="reg"/>

                </div>

            </div>
        </div>
</fieldset>

