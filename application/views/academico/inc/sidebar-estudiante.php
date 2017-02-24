<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">

            <li><a><i class="fa fa-home"></i> Inicio </a> </li>

            <li><a><i class="fa fa-edit"></i> Propuestas <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">


                    <?php


                    $mis_propuestas = $this->estudiantes_model->consultar_mis_propuestas($this->session->userdata('correo'));


                    if (count($mis_propuestas) == 0) {

                        ?>

                        <li><a href="<?= base_url('estudiante/nueva-propuesta') ?>">Presentar</a></li>


                        <?php


                    }

                    ?>


                    <li><a href="<?=base_url('estudiante/consultar-estado-propuesta')?>">Consultar estado</a></li>



                </ul>
            </li>

    </div>



</div>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Cerrar sesión" href="<?=base_url('sesion/cerrar')?>">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
</div>
<!-- /menu footer buttons -->
</div>
</div>
