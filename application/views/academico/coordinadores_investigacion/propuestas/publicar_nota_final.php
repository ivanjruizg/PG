<!-- page content -->
<div class="right_col" role="main">
    <div class="">


        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Nota final</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table id="datatable-asignar-directores" class="table table-striped table-bordered dt-responsive"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>

                                <th>Título</th>
                                <th width="50">Tipo</th>
                                <th width="50">Ver</th>

                            </tr>
                            </thead>
                            <tbody>


                            <?php


                            foreach ($propuestas as $propuesta) {

                                echo '<tr>
                                        
                                               
                                                <td>' . $propuesta['titulo'] . '</td>
                                                <td>' . $propuesta['tipo'] . '</td>
                                                <td class="text-center"><a href="javascript:verModalEvaluacion(' . $propuesta['codigo'] . ');" class="fa fa-edit"></a></td>
                                                

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

    <div class="modal fade modal-wide2" id="modal-asignar-directores" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">


                        <i class="fa fa-bars"></i>

                        <b>Evaluación de la propuesta </b></h4>
                </div>

                <!--onsubmit="return asignarDirectores();"

-->
                <form id="form-publicar-nota-final" class="formulario form-horizontal" method="POST"
                      action="<?= base_url('coordinador/publicar_nota_final') ?>" >
                    <div class="modal-body">


                        <div class="form-group">
                            <label class="col-md-2 control-label" for="name">Código:</label>
                            <div class="col-md-2">


                                <input readonly id="codigo" name="codigo-propuesta" type="text" class="form-control">


                            </div>

                            <label class="col-md-1 control-label" for="name">Fecha:</label>
                            <div class="col-md-2">


                                <input disabled id="fecha" name="fecha" type="text" class="form-control">


                            </div>


                            <label class="col-md-1 control-label" for="name">Tipo:</label>
                            <div class="col-md-4">


                                <input disabled id="tipo" name="tipo" type="text" class="form-control">


                            </div>

                        </div>


                        <div class="form-group">
                            <label class="col-md-2 control-label" for="name">Título:</label>
                            <div class="col-md-10">


                                <textarea disabled class="form-control" name="" id="titulo-propuesta" cols="20"
                                          rows="5"></textarea>


                            </div>
                        </div>


                        <hr>



                        <div class="form-group  inv1">
                            <label class="col-md-2 control-label" for="name">Evaluador 1 : </label>
                            <div class="col-md-6">


                                <input disabled id="evaluador1" type="text" class="form-control">


                            </div>

                            <label class="col-md-2 control-label" for="name">Nota : </label>

                            <div class="col-md-2">


                                <input readonly required id="nota-evaluador1" name="nota-evaluador1" type="text" class="form-control">


                            </div>

                        </div>


                        <div class="form-group inv2">
                            <label class="col-md-2 control-label" for="name">Evaluador 2:</label>
                            <div class="col-md-6">


                                <input disabled id="evaluador2" type="text" class="form-control">


                            </div>

                            <label class="col-md-2 control-label" for="name">Nota : </label>
                            <div class="col-md-2">


                                <input readonly required id="nota-evaluador2" name="nota-evaluador2" type="text" class="form-control">


                            </div>

                        </div>

                        <div class="form-group inv2">


                            <label class="col-md-2 control-label" for="name">Estado : </label>
                            <div class="col-md-6">


                                <input readonly required id="desc" name="" type="text" class="form-control">


                            </div>


                            <label class="col-md-2 control-label" for="name">Nota final: </label>
                            <div class="col-md-2">


                                <input disabled required id="nota-final"  type="text" class="form-control">


                            </div>

                        </div>



                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-8">
<!--                                <button class="btn btn-danger" onclick="cerrarModalId('modal-asignar-directores')">Cerrar</button>-->

                                <input  type="submit"    id="publicar-nota-final" class="btn btn-success pull-right" value="Publicar nota">
                                <button type="button" onclick="cerrarModalId('modal-asignar-directores')" class="btn btn-primary pull-right">Cancelar</button>


                            </div>
                        </div>

                </form>
            </div>
        </div>


    </div>
</fieldset>


