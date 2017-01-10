<!-- page content -->
<div class="right_col" role="main">
    <div class="">


        <style>

            #th-hora{

                width: 130px !important;

            }

            #th-fecha{

                width: 50px !important;

            }


            #th-quitar{

                width: 2px !important;

            }

            /*
            #th-codigo,#th-quitar{

                width: 10px !important;

            }

            #th-propuesta{

                width: 500px !important;

            }

            /*

        </style>


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


                        <table id="datatable-horarios-sustentaciones" class="table table-striped table-bordered dt-responsive"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>

                                <th id="th-codigo" class="text-center">#</th>

                                <th id="th-hora" class="text-center">Fecha y Hora</th>
                                <th id="th-propuesta"> Propuesta </th>
                                <th id="th-quitar"> Quitar </th>


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
                                           
                                            <td class="text-center">'.$horario['fecha'].' '.$horario['hora'].'</td> 
                                            <td id="'.$horario['codigo'].'"  onclick="abrirModalPropuestasParaSustentar('.$horario['codigo'].','.$codigo_propuesta.')">'.$ci->propuestas_model->consultar_titulo($horario['codigo_propuesta']).'</td>
                                             <td class="text-center"><a href="javascript:quitarPropuestaDeHorarioDeSustentacion('.$horario['codigo'].');" class="fa fa-trash"></a></td> 
                                          </tr>';


                                }




                            ?>






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





                    <table id="datatable-asignar-sustentaciones" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">


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

