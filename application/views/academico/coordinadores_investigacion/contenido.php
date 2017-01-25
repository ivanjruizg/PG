
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">


                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Propuestas presentadas en el periodo de recepción actual</h2>
                                <ul class="nav navbar-right panel_toolbox">

                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <!--
                                                                <p class="text-muted font-13 m-b-30">
                                                                    Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
                                                                </p>
                                                                -->
                                <table id="datatable-propuestas-recibidas-periodo-actual" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%"  >
                                    <thead>
                                    <tr>

                                        <th>Título</th>
                                        <th width="50">Tipo</th>
                                        <th width="50">Estado</th>
                                        <th width="50">Carta de remisión</th>
                                        <th width="50">Ver</th>


                                    </tr>
                                    </thead>
                                    <tbody>


                                    <?php


                                    foreach ($propuestas as $propuesta) {
                                        $ruta_carta = $propuesta['ruta_carta'];
                                        echo '<tr>
                                        
                                               
                                                <td>'.$propuesta['titulo'].'</td>
                                                <td>'.$propuesta['tipo'].'</td>
                                                 <td ><span class="label label-success pull-left">'.$propuesta['estado'].'</span></td>
                                                <td class="text-center"><a href="' . base_url('assets/docs/cartas') . '/' . $ruta_carta . '" download="" class="btn btn-primary btn-xs"><i class="fa fa-download">Descargar</i></a>
                                                <a href="javascript:verCartaRemision(' . $propuesta['codigo'] . ');" class="btn btn-success btn-xs"><i class="fa fa-eye">Ver</i></a></td>
                                                <td class="text-center"><a href="javascript:verPropuesta('.$propuesta['codigo'].');" class="fa fa-eye"></a></td>
                                                

                                            </tr>';

                                        //<td><a href="'.base_url('coordinador/descargarArchivo').'/'.$ruta_carta.'"><i class="fa fa-download" > Descargar</i></a></td>
                                        // <td><a href="'.base_url('assets/docs/cartas').'/'.$ruta_carta.'" download="" class="fa fa-download">Descargar</a></td>
                                        //<a href="javascript:verCartaRemision('.$propuesta['codigo'].');" class="fa fa-eye">Ver</a>
                                    }

                                    ?>



                                    </tbody>

                                </table>


                            </div>
                        </div>
                    </div>
                </div>
   <!--             <a href="<?/*= base_url('assets/docs/cartas/') */?>"></a>-->


            </div>
        </div>
        <!-- /page content -->

        <fieldset>

            <div class="modal fade modal-wide2" id="modal-ver-propuesta" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">


                                <i class="fa fa-eye"></i>

                                <b>Propuesta</b></h4>
                        </div>


                        <form id="form-mostrar-propuesta" class="formulario form-horizontal"  method="POST" action="<?=base_url('coordinador/ver_propuesta')?>">
                            <div class="modal-body">




                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="name">Código:</label>
                                    <div class="col-md-1">


                                        <input   readonly id="codigo" name="codigo" type="text"  class="form-control">



                                    </div>

                                    <label class="col-md-1 control-label" for="name">Fecha:</label>
                                    <div class="col-md-3">


                                        <input  disabled id="fecha" name="fecha" type="text"  class="form-control">



                                    </div>


                                    <label class="col-md-1 control-label" for="name">Tipo:</label>
                                    <div class="col-md-4">


                                        <input  disabled id="tipo" name="tipo" type="text"  class="form-control">



                                    </div>

                                </div>




                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="name">Título:</label>
                                    <div class="col-md-10">


                                        <textarea disabled class="form-control" name="" id="titulo-propuesta" cols="20" rows="5"></textarea>


                                    </div>
                                </div>


                                <hr>

                                <div class="form-group inv1">
                                    <label class="col-md-2 control-label" for="name">Investigador 1:</label>
                                    <div class="col-md-10">


                                        <input disabled id="investigador1" name="investigador1" type="text"  class="form-control">


                                    </div>
                                </div>



                                <div class="form-group  inv2">
                                    <label class="col-md-2 control-label" for="name">Investigador 2:</label>
                                    <div class="col-md-10">


                                        <input disabled id="investigador2" name="investigador2" type="text"  class="form-control">


                                    </div>
                                </div>


                                <div class="form-group inv3">
                                    <label class="col-md-2 control-label" for="name">Investigador 3:</label>
                                    <div class="col-md-10">


                                        <input disabled id="investigador3" name="investigador3" type="text"  class="form-control">


                                    </div>
                                </div>

                        </form>
                    </div>
                </div>


            </div>
        </fieldset>


        <!--Modal carta-->


        <fieldset>

            <div class="modal fade modal-wide2" id="ver-carta" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">


                                <i class="fa fa-eye"></i>

                                <b>Carta de Remisión</b></h4>
                        </div>


                        <div class="modal-body">

                            <div class="text-center">

                                <img id="carta-remision" src="" alt="" class="img-thumbnail img-responsive">

                            </div>


                            <div class="modal-footer">

                                <button class="btn btn-primary" onclick="cerrarModalId('ver-carta')">
                                    <i class="fa fa-close">Cerrar</i>
                                </button>

                                <button class="btn btn-success" onclick="descargarCarta()">
                                    <i class="fa fa-download"> Descargar</i>
                                </button>


                            </div>

                        </div>
                    </div>


                </div>
        </fieldset>

