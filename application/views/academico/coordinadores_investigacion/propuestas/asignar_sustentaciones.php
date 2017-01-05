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

                                <th width="10" class="text-center">Hora</th>
                                <th width="500"> Propuesta </th>


                            </tr>
                            </thead>
                            <tbody>




                            <a ></a>


                            <?php



                                $horas = array('08:00','08:30','09:00','09:30','10:00','10:30','11:00','14:00','14:30','15:00','15:30','16:00','16:30','17:00');

                                $i=0;

                            foreach ($horas as $hora){

                                    $hora2= "'".$hora."'";

                                    echo '<tr>
                                            <td class="text-center">'.$hora.'</td>
                                             <td id="'.$i.'"  onclick="abrirModalPropuestasParaSustentar('.$i.')"></td>
                                              
                                          </tr>';

                                    $i++;
                                }




                            ?>


                            <script >

                                horas = ['08:00','08:30','09:00','09:30','10:00','10:30','11:00','14:00','14:30','15:00','15:30','16:00','16:30','17:00'];
                                propuestas = [];

                                function selecionarPropuestaParaAsignarSustentacion(pos,codigo,propuesta) {

                                 propuestas.push(codigo+","+horas[pos]);

                                   $("#"+pos).html(propuesta);

                                    cerrarModalId('modal-asignar-sustentaciones');

                                }



                                function abrirModalPropuestasParaSustentar(pos) {



                                    $.ajax({
                                        url: baseUrl+"/coordinador/asignar_sustentaciones",
                                        data: "pos="+pos,
                                        type: "POST",
                                        success: function (resp) {



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
                                        data: {propuestas: propuestas, fecha:fecha,aula:aula},
                                       // data: {cdp_detalles: cdp_detalles, cdps: cdps},
                                        url: baseUrl+"/coordinador/crear_sustentaciones",
                                        success: function (msg) {


                                            console.log(msg);


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
                                    <label class="control-label col-md-1 col-sm-1 col-xs-12" for="name">Día* <span class="required">*</span>
                                    </label>
                                    <div class="col-md-3 col-sm-3 col-xs-3">

                                        <input required name="fecha" id="fecha" type="date"  class="form-control">

                                    </div>



                                    <label class="control-label col-md-1 col-sm-1 col-xs-12" for="name">Aula <span class="required">*</span>
                                    </label>
                                    <div class="col-md-3 col-sm-3 col-xs-3">

                                        <input  required   name="aula" id="aula" type="text"  class="form-control">

                                    </div>


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

