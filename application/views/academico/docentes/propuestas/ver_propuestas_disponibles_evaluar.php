<!-- page content -->
<div class="right_col" role="main">
    <div class="">


        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Propuestas por calificar 2</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </ul>
                        <div class="clearfix"></div>
                    </div>



                    <div class="x_content">


                           <?php



                            if(count($propuestas)==0) {

                                echo '<h4 class="text-center">

                                            Estimado '.$this->session->userdata('nombres').', en el momento no tienes propuestas por evaluar
                    
                                            
                                    </h4>';


                                      echo  '<h1 class="text-center">  <i onclick="javascrip:location.reload(true)" class="fa fa-refresh fa-3x" aria-hidden="true"></i></h1>';


                            }

                            else{

                              echo  '<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th width="50">Código</th>
                                <th>Título</th>
                                <th width="50">Evaluar</th>


                            </tr>
                            </thead>
                            <tbody>';

                                foreach ($propuestas as $propuesta) {


                                    $titulo2 = "'" . $propuesta['titulo'] . "'";


                                    echo '<tr>

                                        
                                               
                                                <td>' . $propuesta['codigo'] . '</td>
                                                <td>' . $propuesta['titulo'] . '</td>
                                                <td class="text-center"><a  href="javascript:abrirModalFormatoDeEvaluacion(' . $propuesta['codigo'] . ',' . $titulo2 . ')" class="fa fa-edit"></a></td>
                                                

                                            </tr>';

                                }


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




<div class="modal fade modal-wide3" id="modal-formato-evaluacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">


                    <i class="fa fa-bars"></i>
                    <b class="text-center ">Evaluación de la propuesta de trabajo grado: </b>
                    <br>

                </h4>
            </div>



            <div class="modal-body">

                <form id="formu" class="form-horizontal" method="post" action="<?=base_url('docente/evaluar_propuesta')?>">


                    <input type="hidden" name="codigo-propuesta" id="codigo-propuesta">



                    <table id="datatable-propuestas-recibidas-periodo-actual" class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%"  >
                        <thead>
                        <tr>




                            <th colspan="4" class="text-center"><h4><strong id="titulo"></strong></h4> </th>

                        </tr>
                        <tr>


                            <th>EVALUACIÓN CUANTITATIVA</th>
                            <th width="50" class="text-center">Valor</th>
                            <th width="70" class="text-center">0-5</th>



                        </tr>
                        </thead>


                        <tbody>









                    <?php



                        foreach ($preguntas as $pregunta){


                        echo '<tr>



                            <td><label class="col-md-11 col-sm-10 col-xs-12" for="name">'.$pregunta['pregunta'].'<span class="required">*</span>
                        </label><input type="hidden" name="p'.$pregunta['codigo'].'" value="'.$pregunta['codigo'].'"></td>
                            
                            <td>'.($pregunta['valor_pregunta']*100).'%'.'</td>
                            <td ><input name="nota-p'.$pregunta['codigo'].'"
                                   class=" item form-control col-md-7 col-xs-12 decimal-2-places-positive numberBox" max="5" min="0" required="required" type="text"></td>
                            


                        </tr>';

                       /* echo '<div id="" class="item form-group">




                        <div class="col-md-1 col-sm-6 col-xs-12">





                            <input name="nota-p'.$pregunta['codigo'].'"
                                   class=" item form-control col-md-7 col-xs-12 decimal-2-places-positive numberBox" max="5" min="0" required="required" type="text">


                        </div>
                    </div>';*/



                        }


                    ?>

                        </tbody>

                    </table>

                    <div class="item form-group">

                        <div class="ln_solid"></div>

                        <h2 class="text-center mayus">Observaciones y comentarios</h2>
                            <div class="col-md-12 col-sm-6 col-xs-12">

                                    <textarea rows="10" cols="3"   name="observaciones"
                                              class="form-control mayus"></textarea>

                            </div>


                    </div>


            </div>




            <div class="modal-footer">




                <input type="button" value="Cerrar" class="btn btn-primary" onclick="cerrarModalId('modal-formato-evaluacion')" id="reg"/>


                <input type="submit" class="btn btn-success" value="Evaluar">

            </div>

            </form>
        </div>
    </div>
</div>




<script !src="">
    


</script>

<!-- /page content -->

