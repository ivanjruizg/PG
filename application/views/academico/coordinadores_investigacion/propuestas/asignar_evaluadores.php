<!-- page content -->
<div class="right_col" role="main">
    <div class="">


        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Asignar directores</h2>
                        <ul class="nav navbar-right panel_toolbox">

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">


                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>

                                <th>Título</th>
                                <th width="50">Tipo</th>
                                <th width="50">Asignar</th>


                            </tr>
                            </thead>
                            <tbody>


                            <?php


                            foreach ($propuestas as $propuesta) {

                                echo '<tr>
                                        
                                               
                                                <td>'.$propuesta['titulo'].'</td>
                                                <td>'.$propuesta['tipo'].'</td>
                                                <td class="text-center"><a href="javascript:verModalAsignarEvaluadores(' . $propuesta['codigo'] . ');" class="fa fa-edit"></a></td>
                                                

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

    <div class="modal fade modal-wide2" id="modal-asignar-evaluadores" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">


                        <i class="fa fa-eye"></i>

                        <b>Propuesta</b></h4>
                </div>

                <form id="form-asignar-evaluadores" class="formulario form-horizontal" method="POST"
                      action="<?= base_url('coordinador/asignar_evaluador') ?>" onsubmit="return asignarEvaluadores();">
                    <div class="modal-body">


                        <div class="form-group">
                            <label class="col-md-2 control-label" for="name">Código:</label>
                            <div class="col-md-2">


                                <input readonly id="codigo" name="codigo" type="text" class="form-control">


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

                        <div class="form-group inv1">
                            <label class="col-md-2 control-label" for="name">Investigador 1:</label>
                            <div class="col-md-10">


                                <input disabled id="investigador1" name="investigador1" type="text"
                                       class="form-control">


                            </div>
                        </div>


                        <div class="form-group  inv2">
                            <label class="col-md-2 control-label" for="name">Investigador 2:</label>
                            <div class="col-md-10">


                                <input disabled id="investigador2" name="investigador2" type="text"
                                       class="form-control">


                            </div>
                        </div>


                        <div class="form-group inv3">
                            <label class="col-md-2 control-label" for="name">Investigador 3:</label>
                            <div class="col-md-10">


                                <input disabled id="investigador2" name="investigador3" type="text"
                                       class="form-control">


                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="name">Evaluador 1 :</label>
                            <div class="col-md-10">


                                <input required id="evaluador1" name="evaluador1" type="text"
                                       class="form-control input-typehead">


                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-2 control-label" for="name">Evaluador 2 :</label>
                            <div class="col-md-10">


                                <input id="evaluador2" name="evaluador2" type="text"
                                       class="form-control input-typehead">


                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-5">
                                <button type="reset" class="btn btn-primary">Cancelar</button>
                                <input type="submit" class="btn btn-success">
                            </div>
                        </div>

                </form>
            </div>
        </div>


    </div>
</fieldset>

