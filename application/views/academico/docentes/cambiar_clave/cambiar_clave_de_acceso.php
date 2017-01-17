<!-- page content -->



<div class="right_col" role="main">
    <div class="">


        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Cambiar clave</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu"></ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <form id="cambiar-clave" class="form-horizontal form-label-left" method="post" action="<?=base_url('docente/cambiar_clave_de_acceso')?>" onsubmit="return cambiarClave();">


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Clave de acceso actual :</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="password" class="form-control" value="" name="clave-actual" id="clave_actual">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nueva clave de acceso :</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="password" class="form-control" name="clave-nueva" minlength="8" id="clave_nueva" value="" onkeyup="comprobarClaves()">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Confirmar nueva clave de acceso :</label>
                                <div class="col-md-9 col-sm-9 col-xs-12" id="c">
                                    <input type="password" name="clave-nueva-confirmada" minlength="8"  class="form-control" id="clave_confirmada" value="" onkeyup="comprobarClaves()">
                                </div>
                            </div>

                            <div class="form-group ">

                                <div id="mensaje" class="col-md-offset-3 col-md-9">



                                </div>


                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">

                                    <input type="reset"  class="btn btn-primary" value="Cancelar">

                                    <input type="submit" disabled  class="btn btn-success" value="Cambiar clave">

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


