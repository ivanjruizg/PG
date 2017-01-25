<!-- page content -->
<div class="right_col" role="main">
    <div class="">


        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Estado de la propuesta</h2>
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



                        <!-- start project list -->
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th style="width: 1%">#</th>
                                <th style="width: 50%">Título de la propuesta</th>
                                <th style="width: 15%">Estudiantes</th>
                                <th>Estado</th>

                                <th style="width: 30%">#Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                          foreach ($propuestas as $propuesta) {
                              echo '<tr>
                                
                                
                                <td>#</td>
                                <td>
                                    <a>' . $propuesta['titulo'] . '</a>
                                    <br />
                                    <small>Subida el ' . $propuesta['fecha_hora_subida'] . '</small>
                                </td>';

                          }

                            echo '<td>
                                    <ul class="list-inline">';

                          foreach ($investigadores as $investigador) {

                                  echo '<li>
                                            <img src=' . base_url("assets/img/user.png") . ' class="avatar" alt="Avatar" title=' . $investigador['nombre'] . '>
                                        </li>';

                          }

                                echo '</ul>
                                </td>';

                            foreach ($propuestas as $propuesta) {
                                if ($propuesta['estado'] == 1) {
                                    echo '<td>
                                    <a type="button" class="btn btn-success btn-xs" onclick="">' . $propuesta['descripcion'] . '</a>
                                </td>
                             </tr>';

                                }
                                if ($propuesta['estado'] == 2) {
                                    echo '<td>
                                    <a type="button" class="btn btn-success btn-xs" onclick="">' . $propuesta['descripcion'] . '</a>
                                </td>
                             </tr>';

                                }
                                if ($propuesta['estado'] == 3) {
                                    echo '<td>
                                    <a type="button" class="btn btn-success btn-xs" onclick="">' . $propuesta['descripcion'] . '</a>
                                </td>
                             </tr>';

                                }
                                if ($propuesta['estado'] == 4) {
                                    echo '<td>
                                    <a type="button" class="btn btn-success btn-xs" onclick="">' . $propuesta['descripcion'] . '</a>
                                </td>
                             </tr>';

                                }
                                if ($propuesta['estado'] == 5) {
                                    echo '<td>
                                    <a type="button" class="btn btn-success btn-xs" onclick="" href=' . base_url('estudiante/vista_ver_nota_final/' . $propuesta['codigo']) . '>' . $propuesta['descripcion'] . '</a>
                                </td>
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

<fieldset>

    <div class="modal fade modal-wide2" id="modal-ver-propuesta-directores" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">


                        <i class="fa fa-eye"></i>

                        <b>Propuesta</b></h4>
                </div>


                <form id="form-mostrar-propuesta" class="formulario form-horizontal"  method="POST" action="<?=base_url('coordinador/ver_propuesta')?>">
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


                                <input disabled id="investigador3" name="investigador3" type="text"  class="form-control">


                            </div>
                        </div>

                </form>
            </div>
        </div>


    </div>
</fieldset>


<!-- /page content -->
<!--
<script>


    function verInformacionPropuesta() {


        $.ajax({


            url: baseUrl+"/estudiante/",
            type: $("#cambiar-clave").attr("method"),
            data: $("#cambiar-clave").serialize(),

            success: function (resp) {

                var resps= parseInt(resp);

                if(resps==0){

                    var mensaje = '<div class="alert alert-danger"><strong>Error!</strong> Debe escribir la clave de acceso actual correctamente</div>';

                    $('#mensaje').html(mensaje).show(200).delay(4000).hide(200);
                    //    $('#mensaje').html(mensaje).show(200).delay(2000).hide(200);


                }else {

                    var mensaje = '<div class="alert alert-info"><strong>Exito!</strong> Se ha cambiado su clave de acceso correctamente</div>';

                    $("#cambiar-clave")[0].reset();
                    $('#mensaje').html(mensaje).show(200).delay(4000).hide(200);

                }


            }, error: function () {

                alert("Error");
            }
        });

        return false;

    }




</script>-->