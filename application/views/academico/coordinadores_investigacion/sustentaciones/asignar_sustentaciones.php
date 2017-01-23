<?php

$ci= &get_instance();
$ci->load->library('formateador_fechas');


?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="row">
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2 id="titulo-fecha-sustentacion">Asignar sustentaciones para <?= $ci->formateador_fechas->formatear_fecha($fecha);?>  </h2>
                        <ul class="nav navbar-right panel_toolbox">

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">


                        <table id="datatable-horarios-sustentaciones" class="table table-striped table-bordered dt-responsive"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr >



                                <th  class="text-center width60px">Hora</th>
                                <th> Propuesta </th>
                                <th class="width2px"> Quitar </th>



                            </tr>
                            </thead>
                            <tbody id="horario">






                            <?php



                            $ci->load->model("propuestas_model");


                            $fecha_sustentacion = new DateTime($fecha);
                            $ahora= new DateTime("now");


                            foreach ($horarios as $horario){

                                    $hora2= "'".$horario['hora']."'";

                                    $codigo_propuesta =-1;

                                    if(isset($horario['codigo_propuesta'])){

                                        $codigo_propuesta=$horario['codigo_propuesta'];


                                    }


                            if ($fecha_sustentacion > $ahora) {

                                echo '<tr>

                                            <td class="text-center">'.$horario['hora'].'</td> 
                                            <td id="'.$horario['codigo'].'"  onclick="abrirModalPropuestasParaSustentar('.$horario['codigo'].','.$codigo_propuesta.')">'.$ci->propuestas_model->consultar_titulo($horario['codigo_propuesta']).'</td>
                                             <td class="text-center"><a href="javascript:quitarPropuestaDeHorarioDeSustentacion('.$horario['codigo'].');" class="fa fa-trash"></a></td> 
                                          </tr>';

                            }else{

                                echo '<tr>

                                            <td class="text-center">'.$horario['hora'].'</td> 
                                            <td id="'.$horario['codigo'].'" >'.$ci->propuestas_model->consultar_titulo($horario['codigo_propuesta']).'</td>
                                           <td class="text-center"></td> 
                                          </tr>';
                            }




                                }




                            ?>






                            </tbody>

                        </table>



                        <div class="container">


                            <form action="" class="form-horizontal" onsubmit="return asignarSustentaciones() ;">

                                <div class="item form-group">


                                    <div class="col-md-offset-8 col-md-4">

                                        <button type="button" onclick="cancelar()" class="btn btn-primary">Cancelar</button>

                                        <input type="submit" class="btn btn-success" value="Guardar">

                                    </div>





                                </div>



                            </form>



                        </div>



                    </div>
                </div>
            </div>



            <div class="col-md-2 col-sm-3 col-xs-12">


                <div id="datepicker">


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
                    <h4 class="modal-title" id="myModalLabel">

                        <i class="fa fa-bars"></i>
                        <b>Propuestas disponibles para sustentar  </b>


                    </h4>
                </div>



                <div class="modal-body">





                    <table id="datatable-asignar-sustentaciones" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">


                        <thead>
                        <tr>

                            <th width="5">Codigo</th>
                            <th>Título</th>
                            <th width="5">Evaluadores</th>
                            <th width="5">Seleccionar</th>


                        </tr>
                        </thead>
                        <tbody id="propuestas-dirigidas"></tbody>
                    </table>

                </div>


                <div class="modal-footer">
                    <input type="submit" value="Cerrar" class="btn btn-primary" onclick="cerrarModalId('modal-asignar-sustentaciones')" id="reg"/>

                </div>

            </div>
        </div>
</fieldset>
