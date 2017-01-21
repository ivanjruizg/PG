<!-- page content -->
<div class="right_col" role="main">
    <div class="">


        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Asignar fechas de sustentaciones</h2>
                        <ul class="nav navbar-right panel_toolbox">

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">




                        <form id="crear-periodo-recpcion" method="post" class="form-horizontal form-label-left"  action="<?=base_url('coordinador/crear_fechas_sustentacion')?>" >


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Periodo <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="periodo" class="form-control col-md-7 col-xs-12"   readonly type="text" value="<?= $periodo ?>">
                                </div>
                            </div>



                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Fecha de sustentación <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">


                                    <input  class="form-control col-md-7 col-xs-12" name="fecha" required="required" type="date" min="<?php         $fecha = new DateTime('tomorrow');

                                    echo $fecha->format('Y-m-d'); ?>" value="<?php         $fecha = new DateTime('tomorrow');
                                    echo $fecha->format('Y-m-d'); ?>" >


                                </div>
                            </div>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Aula <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">


                                    <input id="name" class="form-control col-md-7 col-xs-12 mayus"  name="aula" required type="text">


                                </div>
                            </div>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Jornada <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select name="jornada" required class="form-control" id="">
                                        <option value="">SELECCIONE</option>
                                        <option value="1">MAÑANA</option>
                                        <option value="2">TARDE</option>
                                        <option value="12">MAÑANA-TARDE</option>


                                    </select>

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

                                    <input type="submit" class="btn btn-success" value="Crear">

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


