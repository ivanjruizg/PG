<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">

            <li><a><i class="fa fa-home"></i> Inicio </a> </li>

            <li><a><i class="fa fa-edit"></i> Propuestas <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">


                    <li><a href="<?=base_url('docente/propuestas-dirigidas')?>">Dirigidas</a></li>
                    <li><a href="<?=base_url('docente/propuestas-codirigidas')?>"">Codirigidas</a></li>
                    <li><a href="<?=base_url('docente/propuestas-por-evaluar')?>">Por evaluar</a></li>
                    <li><a href="<?=base_url('docente/')?>">Evaluadas</a></li>

                </ul>
            </li>

            <li><a><i class="fa fa-file-word-o"></i> Informe final <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?=base_url('docente/subir-informe-final')?>">Subir documento</a></li>
                    <li><a href="#<?=base_url('docente/')?>">Ver informe subidos</a></li>
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
    <a data-toggle="tooltip" data-placement="top" title="Cerrar sesión" href="<?=base_url('login/cerrar')?>">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
</div>
<!-- /menu footer buttons -->
</div>
</div>
