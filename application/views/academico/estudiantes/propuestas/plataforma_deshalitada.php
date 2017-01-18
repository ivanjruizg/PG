<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Inicio</h3>
            </div>


        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Plataforma deshabilitada</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">




                        <div>
                            <br>
                        </div>




                <h4 class="text-center">

                            Estimado <?php echo $this->session->userdata('nombres') ?>, en el posee una  propuestas por evaluar llamda


                        </h4>




                        <h4>

                            <?= $titulo_propuesta[0]['titulo'] ?>      <a class="color" href="<?=base_url('assets/docs/propuestas/'.$titulo_propuesta[0]['ruta_propuesta'])?>">Descargar aquí</a>

                        </h4>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

