<!-- page content -->
<div class="right_col" role="main">
    <div class="">


        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Listado de propuestas a evaluar</h2>
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
                                <th width="50">Código</th>
                                <th>Título</th>
                                <th width="50">Evaluar</th>


                            </tr>
                            </thead>
                            <tbody>


                            <?php


                            foreach ($propuestas as $propuesta) {

                                echo '<tr>
                                        
                                               
                                                <td>' . $propuesta['codigo'] . '</td>
                                                <td>' . $propuesta['titulo'] . '</td>
                                                <td class="text-center"><a  href="javascript:abrirFormatoDeEvaluacion('.$propuesta['codigo'].')" class="fa fa-edit"></a></td>
                                                

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




<div class="modal fade modal-wide2" id="modal-formato-evaluacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><b>Propuestas dirigidas</b></h4>
            </div>



            <div class="modal-body">


                <form action="" class="form-horizontal">



                    <div class="item form-group">
                        <label  class=" col-md-3 col-sm-3 col-xs-12" for="name">Título de la
                            propuesta <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-6 col-xs-12">

                                    <textarea rows="1" disabled id="titulo" required="required" name="titulo"
                                              class="form-control col-md-7 col-xs-12 mayus"></textarea>

                        </div>



                    </div>

                    <div class="ln_solid"></div>



                    <?php



                        foreach ($preguntas as $pregunta){



                        echo '<div id="" class="item form-group">
                        <label class="col-md-10 col-sm-10 col-xs-12" for="name">'.$pregunta['pregunta'].' (valor: '.($pregunta['valor_pregunta']*100).'%)'.'<span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">


                            <input name="'.$pregunta['codigo'].'"
                                   class=" item form-control col-md-7 col-xs-12 mayus"  required="required" type="text">


                        </div>
                    </div>';



                        }


                    ?>

                    <div class="ln_solid"></div>
                        <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button type="submit" class="btn btn-primary">Cancel</button>


                            <input type="submit" class="btn btn-success" value="Subir">

                        </div>
                    </div>





                </form>

            </div>


            <div class="modal-footer">
                <input type="submit" value="Cerrar" class="btn btn-primary" onclick="cerrarModalId('modal-busca-propuesta')" id="reg"/>

            </div>

        </div>
    </div>
</div>


<script !src="">
    
    function abrirFormatoDeEvaluacion(codigo) {

        $('#modal-formato-evaluacion').modal({
            show: true,
            backdrop: 'static'
        });



    }
    
</script>

<!-- /page content -->

