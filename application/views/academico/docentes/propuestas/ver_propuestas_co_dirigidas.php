<!-- page content -->
<div class="right_col" role="main">
    <div class="">


        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Listado de propuestas codirigidas</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                                <th width="50">Descargar</th>


                            </tr>
                            </thead>
                            <tbody>


                            <?php


                            foreach ($propuestas as $propuesta) {

                                echo '<tr>
                                        
                                               
                                                <td>' . $propuesta['titulo'] . '</td>
                                                <td>' . $propuesta['tipo'] . '</td>
                                                <td class="text-center"><a  href="' . base_url('assets/docs/propuestas/' . $propuesta['ruta_propuesta']) . '" class="fa fa-download"></a></td>
                                                

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

