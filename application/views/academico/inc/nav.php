<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="<?=base_url()?>assets/img/img.jpg" alt=""><?php echo $this->session->userdata('nombres')?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="javascript:;"> Perfil</a></li>
                        <li>

                            <?php


                             $tipo=$this->session->userdata('tipo');


                            $tipo2="";

                            if ($tipo == ESTUDIANTES) {

                                $tipo2="estudiante";

                            } else if ($tipo == COORDINADORES) {

                                $tipo2="coordinador";

                            }else if ($tipo == DOCENTES) {

                                $tipo2="docente";
                            }

                            echo ' <a href="'.base_url($tipo2.'/cambiar-clave-de-acceso').'">'

                            ?>




                           <!--     <span class="badge bg-red pull-right">50%</span>-->
                                <span>Cambiar clave de acceso</span>
                            </a>
                        </li>
                        <li><a href="javascript:;">Ayuda</a></li>
                        <li><a href="<?=base_url('sesion/cerrar')?>"><i class="fa fa-sign-out pull-right"></i> Cerrar sesión</a></li>
                    </ul>
                </li>

         <!--       <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">6</span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <li>
                            <a>
                                <span class="image"><img src="<?/*=base_url() */?>assets/img/img.jpg" alt="Profile Image" /></span>
                                <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="image"><img src="<?/*=base_url() */?>assets/img/img.jpg" alt="Profile Image" /></span>
                                <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="image"><img src="<?/*=base_url() */?>assets/img/img.jpg" alt="Profile Image" /></span>
                                <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="image"><img src="<?/*=base_url()*/?>assets/img/img.jpg" alt="Profile Image" /></span>
                                <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                            </a>
                        </li>
                        <li>
                            <div class="text-center">
                                <a>
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>-->
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->
