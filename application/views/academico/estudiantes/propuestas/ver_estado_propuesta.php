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
                                echo '<td>
                                    <button type="button" class="btn btn-success btn-xs">'.$propuesta['descripcion'].'</button>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                    <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                </td>
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

