
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">


                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Plain Page</h2>
                                <ul class="nav navbar-right panel_toolbox">

                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <!--
                                                                <p class="text-muted font-13 m-b-30">
                                                                    Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
                                                                </p>
                                                                -->
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"  >
                                    <thead>
                                    <tr>

                                        <th>Título</th>
                                        <th width="50">Tipo</th>
                                        <th width="50">Carta de remisión</th>
                                        <th width="50">Ver</th>


                                    </tr>
                                    </thead>
                                    <tbody>


                                    <?php


                                    foreach ($propuestas as $propuesta) {
                                        $ruta_carta = $propuesta['ruta_carta'];

                                        echo '<tr>
                                        
                                               
                                                <td>'.$propuesta['titulo'].'</td>
                                                <td>'.$propuesta['tipo'].'</td>
                                                <td class="text-center"><a href="' . base_url('assets/docs/cartas') . '/' . $ruta_carta . '" download="" class="fa fa-download">Descargar</a>
                                                <a href="javascript:verCartaRemision(' . $propuesta['codigo'] . ');" class="fa fa-eye">Ver</a></td>
                                                <td><a href="javascript:verPropuesta('.$propuesta['codigo'].');" class="fa fa-eye"></a></td>
                                                

                                            </tr>';

                                        //<td><a href="'.base_url('coordinador/descargarArchivo').'/'.$ruta_carta.'"><i class="fa fa-download" > Descargar</i></a></td>
                                        // <td><a href="'.base_url('assets/docs/cartas').'/'.$ruta_carta.'" download="" class="fa fa-download">Descargar</a></td>
                                        //<a href="javascript:verCartaRemision('.$propuesta['codigo'].');" class="fa fa-eye">Ver</a>
                                    }

                                    ?>


                                    </tbody>

                                </table>


                            </div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('assets/docs/cartas/') ?>"></a>


            </div>
        </div>
        <!-- /page content -->

        <fieldset>

            <div class="modal fade modal-wide2" id="modal-ver-propuesta" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">


                                <i class="fa fa-eye"></i>

                                <b>Propuesta</b></h4>
                        </div>


                        <form id="mostrar-propuesta" class="formulario form-horizontal"  method="POST">
                            <div class="modal-body">




                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="name">Código:</label>
                                    <div class="col-md-1">


                                        <input   readonly id="codigo" name="codigo" type="text"  class="form-control">



                                    </div>

                                    <label class="col-md-1 control-label" for="name">Fecha:</label>
                                    <div class="col-md-3">


                                        <input  disabled id="fecha" name="fecha" type="text"  class="form-control">



                                    </div>


                                    <label class="col-md-1 control-label" for="name">Tipo:</label>
                                    <div class="col-md-4">


                                        <input  disabled id="tipo" name="tipo" type="text"  class="form-control">



                                    </div>

                                </div>




                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="name">Título:</label>
                                    <div class="col-md-10">


                                        <textarea disabled class="form-control" name="" id="titulo-propuesta" cols="20" rows="5"></textarea>


                                    </div>
                                </div>


                                <hr>

                                <div class="form-group inv1">
                                    <label class="col-md-2 control-label" for="name">Investigador 1:</label>
                                    <div class="col-md-10">


                                        <input disabled id="investigador1" name="investigador1" type="text"  class="form-control">


                                    </div>
                                </div>



                                <div class="form-group  inv2">
                                    <label class="col-md-2 control-label" for="name">Investigador 2:</label>
                                    <div class="col-md-10">


                                        <input disabled id="investigador2" name="investigador2" type="text"  class="form-control">


                                    </div>
                                </div>


                                <div class="form-group inv3">
                                    <label class="col-md-2 control-label" for="name">Investigador 3:</label>
                                    <div class="col-md-10">


                                        <input disabled id="investigador2" name="investigador3" type="text"  class="form-control">


                                    </div>
                                </div>

                        </form>
                    </div>
                </div>


            </div>
        </fieldset>


        <!--Modal carta-->


        <fieldset>

            <div class="modal fade modal-wide2" id="ver-carta" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">


                                <i class="fa fa-eye"></i>

                                <b>Carta de Remisión</b></h4>
                        </div>


                        <div class="modal-body">

                            <div class="text-center">

                                <img id="carta-remision" src="" alt="" class="img-thumbnail img-responsive">

                            </div>


                            <div class="modal-footer">

                                <button class="btn btn-primary">
                                    <i class="fa fa-close">Cerrar</i>
                                </button>

                                <button class="btn btn-success">
                                    <i class="fa fa-download"> Descargar</i>
                                </button>


                            </div>

                        </div>
                    </div>


                </div>
        </fieldset>





        <script src="<?php echo base_url();?>assets/js/typeahead.js"></script>


        <script >


            $('#director').typeahead({

                remote: '<?=base_url('docentes/consultar?nombres=%QUERY')?>'

            });


            $('#co-director').typeahead({

                remote: '<?=base_url('docentes/consultar?nombres=%QUERY')?>'

            });


            function verCartaRemision(codigo) {


                $.ajax({
                    url: "<?=base_url('coordinador/verCartaRemision')?>",
                    type: "POST",
                    data: {codigo: codigo},
                    success: function (resp) {


                        valores = eval(resp);

                        console.log(valores);

                        //$("#carta-remision").attr("src","");
                        $("#carta-remision").attr("src", "./assets/docs/cartas/" + valores[0].ruta_carta);
//                        $("#carta-remision").attr("src","assets/docs/cartas/"+valores.ruta_carta);


                        $('#ver-carta').modal({
                            show: true,
                            backdrop: 'static'
                        });

                    }, error: function () {

                        alert("Error");

                    }
                });
                return false;

            }


            /*    function verPropuesta(codigo) {



                $.ajax({
             url: "",
                    type: "POST",
                    data: {codigo:codigo},
                    success: function (resp) {



                        valores = eval(resp);

                        for (var i = 0; i<valores.length;i++){


                            $("#codigo").val(codigo);
                            $("#titulo-propuesta").val(valores[i].titulo);
                            $("#fecha").val(valores[i].fecha_recepcion);
                            $("#tipo").val(valores[i].tipo_propuesta);


                            $("#investigador"+(i+1)).val(valores[i].estudiante);

                            $(".inv"+(i+1)).show();


                        }




                        $('#ver-propuesta').modal({
                            show: true,
                            backdrop: 'static'
                        });

                        $('#codigo').val(codigo);


                    },error: function () {

                        alert("Error");

                    }
                });
                return false;

            }
             */
            </script>