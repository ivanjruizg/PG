<!-- page content -->
<div class="right_col" role="main">
    <div class="">


        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Propuestas por calificar</h2>
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


                    <i class="fa fa-eye"></i>
                    <b>Evaluación de la propuesta de trabajo grado</b>
                </h4>
            </div>



            <div class="modal-body">




                <form  class="form-horizontal" method="post" action="<?=base_url('docente/evaluar_propuesta')?>">


                    <input type="hidden" name="codigo-propuesta" id="codigo-propuesta">

                    <div class="item form-group">
                        <label  class="control-label col-md-2 col-sm-3 col-xs-12" for="name">Título de la
                            propuesta <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12">

                                    <textarea rows="1" disabled id="titulo" required="required" name="titulo"
                                              class="form-control col-md-7 col-xs-12 mayus"></textarea>

                        </div>



                    </div>

                    <div class="ln_solid"></div>



                    <?php



                        foreach ($preguntas as $pregunta){



                        echo '<div id="" class="item form-group">



                        <label class="col-md-11 col-sm-10 col-xs-12" for="name">'.$pregunta['pregunta'].' (VALOR : '.($pregunta['valor_pregunta']*100).'%)'.'<span class="required">*</span>
                        </label>
                        <div class="col-md-1 col-sm-6 col-xs-12">


                            <input type="hidden" name="p'.$pregunta['codigo'].'" value="'.$pregunta['codigo'].'">


                            <input name="nota-p'.$pregunta['codigo'].'"
                                   class=" item form-control col-md-7 col-xs-12 mayus" min="0" max="5" required="required" type="number">


                        </div>
                    </div>';



                        }


                    ?>



                    <div class="item form-group">

                        <div class="ln_solid"></div>

                        <h2 class="text-center">Observaciones y comentarios</h2>
                            <div class="col-md-10 col-sm-6 col-xs-12 col-lg-offset-1">

                                    <textarea rows="10" cols="3"  required="required" name="observaciones"
                                              class="form-control mayus"></textarea>

                            </div>


                    </div>


            </div>




            <div class="modal-footer">






                <input type="submit" class="btn btn-success" value="Evaluar">
                <input type="button" value="Cerrar" class="btn btn-primary" onclick="cerrarModalId('modal-formato-evaluacion')" id="reg"/>

            </div>

            </form>
        </div>
    </div>
</div>


<script !src="">
    
    function abrirModalFormatoDeEvaluacion(codigo,titulo) {

        abrirModalId("modal-formato-evaluacion");

        $('#codigo-propuesta').val(codigo);
        $('#titulo').val(titulo);

    }

    
</script>

<!-- /page content -->

