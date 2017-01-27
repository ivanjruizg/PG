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
                                    <button type="button" class="btn btn-success btn-xs" onclick="">' . $propuesta['descripcion'] . '</button>
                                </td>
                             </tr>';

                                }
                                if ($propuesta['estado'] == 2) {
                                    echo '<td>
                                    <button type="button" class="btn btn-success btn-xs" onclick="verDirectoresPropuesta(' . $propuesta['codigo'] . ')">' . $propuesta['descripcion'] . '</button>
                                </td>
                             </tr>';

                                }
                                if ($propuesta['estado'] == 3) {
                                    echo '<td>
                                    <a type="button" class="btn btn-success btn-xs" onclick="verEvaluadoresAsignados(' . $propuesta['codigo'] . ')">' . $propuesta['descripcion'] . '</a>
                                </td>
                             </tr>';

                                }
                                if ($propuesta['estado'] == 4) {
                                    echo '<td>
                                    <a type="button" class="btn btn-success btn-xs" onclick="verSustentacionAsignada(' . $propuesta['codigo'] . ')">' . $propuesta['descripcion'] . '</a>
                                </td>
                             </tr>';

                                }
                                if ($propuesta['estado'] == 5) {
                                    echo '<td>
                                    <a type="button" class="btn btn-success btn-xs" onclick="verNotaFinal(' . $propuesta['codigo'] . ')">' . $propuesta['descripcion'] . '</a>
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

<!---MODAL CON INFORMACION ACERCA DE LOS DIRECTORES Y CO-DIRECTORES ASIGNADOS--->


<fieldset>


    <div class="modal fade modal-wide2" id="modal-ver-directores-asignados" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">

                        <i class="fa fa-bars"></i>
                        <b>Directores Asignados</b>


                    </h4>
                </div>


                <div class="modal-body">
                    <div>

                        <h4><b>Estimado <?= $this->session->userdata('nombres') ?>, Se han asignado de forma oficial los
                                directores de su propuesta:</b></h4>


                        <br>
                        <label class="h5"><b id="titulo-propuesta"></b></label>
                        <br>
                        <label class="h5"><b id="directores-asignados"></b></label>
                        <br>
                        <label><b id="co-directores-asignados"></b></label>


                    </div>


                </div>
                <div class="modal-footer">
                    <input type="submit" value="Cerrar" class="btn btn-primary"
                           onclick="cerrarModalId('modal-ver-directores-asignados')"/>

                </div>

            </div>
        </div>
    </div>


</fieldset>

<fieldset>

    <div class="modal fade modal-wide2" id="modal-ver-directores-asignados-1" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">


                        <i class="fa fa-bars"></i>

                        <b>Directores Asignados</b></h4>
                </div>

                <!--onsubmit="return asignarDirectores();"

-->


                <div class="form-group">
                    <div class="col-md-12 h3">


                        Se han Asignado oficialmente los directores de su propuesta


                    </div>

                    <form id="form-mostrar-propuesta-directores" class="formulario form-horizontal" method="POST"
                          action="<?= base_url('estudiante/ver_propuesta') ?>">
                        <div class="modal-body">


                            <div class="form-group">
                                <label class="col-md-2 control-label" for="name">Código:</label>
                                <div class="col-md-2">


                                    <input readonly id="codigo" name="codigo" type="text" class="form-control">


                                </div>

                                <label class="col-md-1 control-label" for="name">Fecha:</label>
                                <div class="col-md-2">


                                    <input disabled id="fecha" name="fecha" type="text" class="form-control">


                                </div>


                                <label class="col-md-1 control-label" for="name">Tipo:</label>
                                <div class="col-md-4">


                                    <input disabled id="tipo" name="tipo" type="text" class="form-control">


                                </div>

                            </div>


                            <div class="form-group">
                                <label class="col-md-2 control-label" for="name">Título:</label>
                                <div class="col-md-10">


                                <textarea disabled class="form-control" name="" id="titulo-propuesta" cols="20"
                                          rows="5"></textarea>


                                </div>
                            </div>


                            <hr>

                            <div class="form-group inv1">
                                <label class="col-md-2 control-label" for="name">Investigador 1:</label>
                                <div class="col-md-10">


                                    <input disabled id="investigador1" type="text" class="form-control">


                                </div>
                            </div>


                            <div class="form-group  inv2">
                                <label class="col-md-2 control-label" for="name">Investigador 2 : </label>
                                <div class="col-md-10">


                                    <input disabled id="investigador2" type="text" class="form-control">


                                </div>
                            </div>


                            <div class="form-group inv3">
                                <label class="col-md-2 control-label" for="name">Investigador 3:</label>
                                <div class="col-md-10">


                                    <input disabled id="investigador3" type="text" class="form-control">


                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-2 control-label" for="name">Director :</label>
                                <div class="col-md-10">


                                    <input disabled id="director" name="director" type="text" class="form-control">


                                </div>
                            </div>


                            <div class="form-group">
                                <label id="label-codirector" class="col-md-2 control-label" for="name">Codirector
                                    :</label>
                                <div class="col-md-10">


                                    <input disabled id="co-director" name="co-director" type="text"
                                           class="form-control">


                                </div>
                            </div>

                            <div class="form-group ">

                                <div id="mensaje-director" class="col-md-offset-3 col-md-6">


                                </div>


                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-8">
                                    <!--                                <button class="btn btn-danger" onclick="cerrarModalId('modal-asignar-directores')">Cerrar</button>-->

                                    <button type="button" onclick="cerrarModalId('modal-ver-directores-asignados')"
                                            class="btn btn-primary pull-right">Cerrar
                                    </button>


                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
</fieldset>


<!---MODAL CON INFORMACION ACERCA DE LOS EVALUADORES ASIGNADOS--->
<fieldset>

    <div class="modal fade modal-wide2" id="modal-ver-evaluadores-asignados" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">


                        <i class="fa fa-bars"></i>

                        <b>Evaluadores Asignados</b></h4>
                </div>

                <!--onsubmit="return asignarDirectores();"

-->
                <!-- <form id="form-mostrar-evaluadores-asignados" class="formulario form-horizontal" method="POST"
                      action="<? /*= base_url('estudiante/ver_propuesta_con_evaluadores') */ ?>">
                    <div class="modal-body">


                        <div class="form-group">
                            <label class="col-md-1 control-label" for="name">Código:</label>
                            <div class="col-md-1">


                                <input readonly id="codigo-e" name="codigo" type="text" class="form-control">


                            </div>

                            <label class="col-md-3 control-label text-center" for="name">Fecha de asignacion de evaluadores:</label>
                            <div class="col-md-2">


                                <input disabled id="fecha-e" name="fecha" type="text" class="form-control">


                            </div>


                            <label class="col-md-1 control-label" for="name">Tipo:</label>
                            <div class="col-md-4">


                                <input disabled id="tipo-e" name="tipo" type="text" class="form-control">


                            </div>

                        </div>


                        <div class="form-group">
                            <label class="col-md-2 control-label" for="name">Título:</label>
                            <div class="col-md-10">


                                <textarea disabled class="form-control" name="" id="titulo-propuesta-e" cols="20"
                                          rows="5"></textarea>


                            </div>
                        </div>


                        <hr>

                        <div class="form-group inv1">
                            <label class="col-md-2 control-label" for="name">Investigador 1:</label>
                            <div class="col-md-10">


                                <input disabled id="investigador1-e" type="text" class="form-control">


                            </div>
                        </div>


                        <div class="form-group  inv2">
                            <label class="col-md-2 control-label" for="name">Investigador 2 : </label>
                            <div class="col-md-10">


                                <input disabled id="investigador2-e" type="text" class="form-control">


                            </div>
                        </div>


                        <div class="form-group inv3">
                            <label class="col-md-2 control-label" for="name">Investigador 3:</label>
                            <div class="col-md-10">


                                <input disabled id="investigador3-e" type="text" class="form-control">


                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="name">Director :</label>
                            <div class="col-md-10">


                                <input disabled id="director-e" name="director" type="text" class="form-control">


                            </div>
                        </div>


                        <div class="form-group">
                            <label id="label-codirector-e" class="col-md-2 control-label" for="name">Codirector :</label>
                            <div class="col-md-10">


                                <input disabled id="co-director-e" name="co-director" type="text" class="form-control">


                            </div>
                        </div>-->

                <div class="modal-body">
                    <div>
                        <h4><b>Estimado <?= $this->session->userdata('nombres') ?>, Han sido asignados los evaluadores
                                su propuesta:</b></h4>


                        <br>
                        <!--  <label class="h4"><b id="titulo-propuesta-e"></b></label>-->
                        <label id="evaluador1" class="h4 btn btn-success"><b></b></label>
                        <br>
                        <label id="evaluador2" class="h4 btn btn-success"><b></b></label>

                    </div>


                </div>


                <div class="modal-footer">
                    <div class="col-md-4 col-md-offset-8">
                        <!--                                <button class="btn btn-danger" onclick="cerrarModalId('modal-asignar-directores')">Cerrar</button>-->

                        <button type="button" onclick="cerrarModalId('modal-ver-evaluadores-asignados')"
                                class="btn btn-primary pull-right">Cerrar
                        </button>


                    </div>
                </div>

                </form>
            </div>
        </div>


    </div>
</fieldset>


<!---MODAL CON INFORMACION ACERCA DE LA FECHA Y HORA DE SUSTENTACION Y AULAS ASIGNADOS--->
<fieldset>

    <div class="modal fade modal-wide2" id="modal-ver-sustentacion-asignados" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">


                        <i class="fa fa-bars"></i>

                        <b>Sustentacion Asignada</b></h4>
                </div>

                <!--onsubmit="return asignarDirectores();"

-->
                <!--<form id="form-mostrar-sustentacion-asignados" class="formulario form-horizontal" method="POST"
                      action="<? /*= base_url('estudiante/ver_sustentacion_asignada') */ ?>">
                    <div class="modal-body">


                        <div class="form-group">
                            <label class="col-md-1 control-label" for="name">Código:</label>
                            <div class="col-md-1">


                                <input readonly id="codigo-s" name="codigo" type="text" class="form-control">


                            </div>

                            <label class="col-md-3 control-label text-center" for="name">Fecha de asignacion de evaluadores:</label>
                            <div class="col-md-2">


                                <input disabled id="fecha-s" name="fecha" type="text" class="form-control">


                            </div>


                            <label class="col-md-1 control-label" for="name">Tipo:</label>
                            <div class="col-md-4">


                                <input disabled id="tipo-s" name="tipo" type="text" class="form-control">


                            </div>

                        </div>


                        <div class="form-group">
                            <label class="col-md-2 control-label" for="name">Título:</label>
                            <div class="col-md-10">


                                <textarea disabled class="form-control" name="" id="titulo-propuesta-s" cols="20"
                                          rows="5"></textarea>


                            </div>
                        </div>


                        <hr>

                        <div class="form-group inv1">
                            <label class="col-md-2 control-label" for="name">Investigador 1:</label>
                            <div class="col-md-10">


                                <input disabled id="investigador1-s" type="text" class="form-control">


                            </div>
                        </div>


                        <div class="form-group  inv2">
                            <label class="col-md-2 control-label" for="name">Investigador 2 : </label>
                            <div class="col-md-10">


                                <input disabled id="investigador2-s" type="text" class="form-control">


                            </div>
                        </div>


                        <div class="form-group inv3">
                            <label class="col-md-2 control-label" for="name">Investigador 3:</label>
                            <div class="col-md-10">


                                <input disabled id="investigador3-s" type="text" class="form-control">


                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="name">Director :</label>
                            <div class="col-md-10">


                                <input disabled id="director-s" name="director" type="text" class="form-control">


                            </div>
                        </div>


                        <div class="form-group">
                            <label id="label-codirector-s" class="col-md-2 control-label" for="name">Codirector :</label>
                            <div class="col-md-10">


                                <input disabled id="co-director-s" name="co-director" type="text" class="form-control">


                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="name">Evaluador 1 :</label>
                            <div class="col-md-10">


                                <input disabled id="evaluador1-s" name="evaluador1" type="text"
                                       class="form-control ">


                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-2 control-label" for="name">Evaluador 2 :</label>
                            <div class="col-md-10">


                                <input disabled id="evaluador2-s" name="evaluador2-s" type="text"
                                       class="form-control">


                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="name">Aula:</label>
                            <div class="col-md-4">


                                <input disabled id="aula" name="aula" type="text"
                                       class="form-control">


                            </div>
                            <label class="col-md-4 control-label" for="name">Fecha de Sustentación:</label>
                            <div class="col-md-2">


                                <input disabled id="fecha-sustentacion" name="fecha" type="text"
                                       class="form-control ">


                            </div>


                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="name">Hora:</label>
                            <div class="col-md-2">


                                <input disabled id="hora" name="hora" type="text"
                                       class="form-control">


                            </div>
                        </div>

-->

                <div class="modal-body">
                    <div>
                        <h4><b>Estimado <?= $this->session->userdata('nombres') ?>, Se ha asignado la fecha, hora y aula de sustentación de su propuesta</b></h4>


                        <br>
                        <!--  <label class="h4"><b id="titulo-propuesta-e"></b></label>-->
                        <label id="evaluador1-s" class="h4"><b></b></label>
                        <br>
                        <label id="evaluador2-s" class="h4"><b></b></label>
                        <br>
                        <label  class="h4"><b id="aula"></b></label>
                        <br>
                        <label  class="h4"><b id="fecha-sustentacion"></b></label>
                        <br>
                        <label class="h4"><b id="hora"></b></label>


                    </div>


                </div>


                <div class="modal-footer">
                    <div class="col-md-4 col-md-offset-8">
                        <!--                                <button class="btn btn-danger" onclick="cerrarModalId('modal-asignar-directores')">Cerrar</button>-->

                        <button type="button" onclick="cerrarModalId('modal-ver-sustentacion-asignados')"
                                class="btn btn-primary pull-right">Cerrar
                        </button>


                    </div>
                </div>
            </div>
            </form>

        </div>
    </div>
</fieldset>


<fieldset>


    <div class="modal fade modal-wide2" id="modal-ver-nota-sustentaciones" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">

                        <i class="fa fa-bars"></i>
                        <b>Nota final y observaciones de los evaluadores</b>


                    </h4>
                </div>


                <div class="modal-body">


                    <div id="observaciones">


                    </div>


                </div>
                <div class="modal-footer">
                    <input type="submit" value="Cerrar" class="btn btn-primary"
                           onclick="cerrarModalId('modal-ver-nota-sustentaciones')"/>

                </div>

            </div>
        </div>
    </div>


</fieldset>


<!-- /page content -->
