
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">


                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Calendario de trabajos de grado para el <?= date("Y")?> </h2>
                                <ul class="nav navbar-right panel_toolbox">

                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <table id="datatable-calendario" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">


                                <thead>
                                    <tr>

                                        <th>Fecha incio de recepción</th>
                                        <th >Fecha limite de recepción </th>
                                        <th >Fecha sustentación</th>
                                        <th >Editar</th>

                                    </tr>
                                    </thead>
                                    <tbody>


                                    <?php

                                    $ci  = &get_instance();
                                    $ci->load->library("formateador_fechas");

                                        foreach ($calendario as $periodo) {


                                            $fecha_limite_recepcion = "'" . $periodo['fecha_limite_recepcion'] . "'";
                                            $fecha_sustentacion = "'" . $periodo['fecha_sustentacion'] . "'";
                                            $fecha_inicio_recepcion = "'" . $periodo['fecha_inicio_recepcion'] . "'";


                                            $periodoR = "'".$periodo['periodo']."'";

                                            echo '<tr>
                                     
                                        <td>' . $ci->formateador_fechas->fechas_español($periodo['fecha_inicio_recepcion']). '</td>
                                        <td>' .$ci->formateador_fechas->fechas_español($periodo['fecha_limite_recepcion']) . '</td>
                                        <td>' .$ci->formateador_fechas->fechas_español($periodo['fecha_sustentacion']) . '</td>
                                        <td class="text-center"><a href="javascript:verPeriodoRecepcion(' . $periodoR . ',' . $fecha_inicio_recepcion . ',' . $fecha_limite_recepcion . ',' . $fecha_sustentacion . ');" class="fa fa-edit"></a></td>
                                      
                                    </tr>';




                                    }

                                    ?>
                                    </tbody>
                                </table>


                            </div>


                        </div>
                    </div>
                </div>



            </div>
        </div>
        <!-- /page content -->


        <fieldset>

        <div class="modal fade" id="editar-periodo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">
                            <i class="glyphicon glyphicon-edit"></i>
                            <b>Editar periodo de recepción</b></h4>
                    </div>


                    <form id="cambiar-fechas" class="formulario form-horizontal" action="<?= base_url('coordinador/cambiar_fechas_periodos') ?>" method="POST">
                        <div class="modal-body">




                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="name">Periodo :</label>
                                    <div class="col-md-8">


                                        <input   readonly id="periodo" name="periodo" type="text"  class="form-control">


                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="name">Fecha incio de recepción :</label>
                                    <div class="col-md-8">


                                        <input required  id="fecha-inicio" name="fecha-inicio" type="date"  class="form-control">



                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="name">Fecha limite de recepción :</label>
                                    <div class="col-md-8">

                                        <input required id="fecha-limite"  name="fecha-limite" type="date"  class="form-control">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="name">Fecha sustentación :</label>
                                    <div class="col-md-8">

                                        <input required id="fecha-sustentacion"  name="fecha-sustentacion" type="date"  class="form-control">

                                    </div>
                                </div>




                        </div>


                        <div class="modal-footer">

                            <input type="button" value="Cerrar" class="btn btn-primary"
                                   onclick="cerrarModalId('editar-periodo')"/>

                            <input type="submit" value="Editar" class="btn btn-success"/>

                        </div>
                    </form>
                </div>
            </div>


        </div>
        </fieldset>

