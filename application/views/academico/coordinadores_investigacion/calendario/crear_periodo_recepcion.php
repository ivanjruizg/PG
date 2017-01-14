
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">


                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Calendario de recepción de trabajos de grado para el <?= date("Y")?> </h2>
                                <ul class="nav navbar-right panel_toolbox">

                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">


                                <form id="crear-periodo-recpcion" method="post" class="form-horizontal form-label-left"  action="<?=base_url('coordinador/crear_periodo')?>" onsubmit="return crearPeriodoRecepcion();">


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Año <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input name="anio" class="form-control col-md-7 col-xs-12"  required readonly type="text" value="<?= date('Y'); ?>">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Mes <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">

                                            <select name="mes" required class="form-control" id="">
                                                <option value="">SELECCIONE</option>
                                                <option value="01">ENERO</option>
                                                <option value="02">FEBRERO</option>
                                                <option value="03">MARZO</option>
                                                <option value="04">ABRIL</option>
                                                <option value="05">MAYO</option>
                                                <option value="06">JUNIO</option>
                                                <option value="07">JULIO</option>
                                                <option value="08">AGOSTO</option>
                                                <option value="09">SEPTIEMBRE</option>
                                                <option value="10">OCTUBRRE</option>
                                                <option value="11">NOVIEMBRE</option>
                                                <option value="12">DICIEMBRE</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Fecha de recepción <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">


                                            <input  class="form-control col-md-7 col-xs-12" name="fecha-recepcion" required="required" type="date">


                                        </div>
                                    </div>


                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Fecha de sustentación <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">


                                            <input id="name" class="form-control col-md-7 col-xs-12"  name="fecha-sustentacion" required="required" type="date">


                                        </div>
                                    </div>


                                    <div class="form-group ">

                                        <div id="mensaje" class="col-md-offset-3 col-md-6">


                                        </div>


                                    </div>





                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-4 col-md-offset-5">
                                            <button type="reset" class="btn btn-primary">Cancelar</button>
                                            <button id="send" type="submit" class="btn btn-success">Aceptar</button>
                                        </div>
                                    </div>
                                </form>




                            </div>


                        </div>
                    </div>
                </div>



            </div>
        </div>
        <!-- /page content -->
