<div class="right_col" role="main">
    <div class="">


                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Subir informe final</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <form class="form-horizontal form-label-left" action="<?=base_url('docente/subir_informe_final') ?>"   method="post" enctype="multipart/form-data" novalidate >





                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Propuesta<span disabled>*</span></label>

                                        <div class="col-sm-6">

                                            <div class="input-group">
                                                <input type="text" id="codigo-propuesta" name="codigo-propuesta" readonly class="form-control">
                                                <span class="input-group-btn">
                                              <button type="button" onclick="abrirModalPropuetasParaSubirInforme();" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                          </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Titulo
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea id="titulo" name="titulo" readonly  class="form-control col-md-7 col-xs-12 texareaAlto mayus"></textarea>
                                        </div>
                                    </div>


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12 " id="" for="name">Documento propuesta<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">

                                            <input id="informe" accept=".doc,.docx,.pdf" class="form-control col-md-3 col-xs-12 input-typehead" name="informe" placeholder="Documento del informe final" required="required" type="file">
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-4 col-md-offset-5">
                                            <button type="reset" class="btn btn-primary">Cancelar</button>


                                            <input type="submit" class="btn btn-success" value="Subir informe">

                                        </div>
                                    </div>



                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>



<div class="modal fade modal-wide2" id="modal-busca-propuesta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><b>Propuestas dirigidas</b></h4>
            </div>



                <div class="modal-body">


                        <table id="datatable-calendario" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">


                            <thead>
                            <tr>

                                <th>Titulo</th>
                                <th width="50">Tipo </th>
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


</div>


