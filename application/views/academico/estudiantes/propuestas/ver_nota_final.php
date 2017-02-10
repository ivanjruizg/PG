<!-- page content -->
<div class="right_col" role="main">
    <div class="">


        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Nota final y observaciones.</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">



                        <!-- start project list -->
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                              <th style="width: 75%" class="col-md-12">Título de la propuesta: <?=$observaciones[0]['titulo']?></th>
                            </tr>
                            <tr>
                                <th style="width: 15%">Evaluadores</th>
                                <th>Observaciones</th>

                                <th style="width: 30%">#Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php



                            foreach ($observaciones as $observacion)
                      echo '<tr>                              
                                <th style="width: 15%">'.$observacion['evaluador'].'</th>
                                <th>'.$observacion['observaciones'].'</th>
                                
                                <th style="width: 30%">#Edit</th>
                            </tr>';


                            ?>
                            </tbody>

                        </table>


                        <div class="btn btn-success">
                            <?=$nota[0]['nota']?>
                        </div>

                        <div class="btn btn-primary">
                            <?=$nota[0]['descripcion_nota']?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

