<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">

            <li><a href="<?=base_url('coordinador')?>"><i class="fa fa-home"></i> Inicio </a> </li>

            <li><a><i class="fa fa-edit"></i> Propuestas <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?=base_url('coordinador/asignar-directores')?>">Asignar directores</a></li>
                    <li><a href="<?=base_url('coordinador/asignar-evaluadores')?>">Asignar evaluadores</a></li>

                </ul>
            </li>


            <li><a><i class="fa fa-calendar"></i>Periodos de recepción <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?=base_url('coordinador/calendario-recepcion-propuestas')?>">Calendario <?= date("Y"); ?> </a></li>
                    <li><a href="<?=base_url('coordinador/nuevo-periodo-recepcion')?>">Crear periodos de recepción</a></li>

                </ul>
            </li>


            <li><a><i class="fa fa-table"></i> Informes <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="tables.html">Tables</a></li>
                    <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-bar-chart-o"></i> Estadísticas <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="chartjs.html">Chart JS</a></li>
                    <li><a href="chartjs2.html">Chart JS2</a></li>
                    <li><a href="morisjs.html">Moris JS</a></li>
                    <li><a href="echarts.html">ECharts</a></li>
                    <li><a href="other_charts.html">Other Charts</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-users"></i>Sustentaciones<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                    <li><a href="fixed_footer.html">Fixed Footer</a></li>
                </ul>
            </li>
        </ul>
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
