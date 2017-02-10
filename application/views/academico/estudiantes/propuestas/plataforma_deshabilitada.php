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

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">




                        <div>
                            <br>
                        </div>




                <h4 class="text-center">

                            Estimado <?php echo $this->session->userdata('nombres') ?>, ya se ha inscrito una propuesta en la que usted participa titulada:


                        </h4>




                        <h4>

                            <?= $titulo_propuesta[0]['titulo']?>      <a class="btn btn-success" href="<?=base_url('assets/docs/propuestas/'.$titulo_propuesta[0]['ruta_propuesta'])?>">Descargar aquí</a>

                        </h4>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

