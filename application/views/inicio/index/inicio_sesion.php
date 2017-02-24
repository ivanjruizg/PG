<div class="login-bg">
    <div class="container">


        <div class="row">

            <div class="col-md-5 col-lg-5 col-xs-12 col-sm-6 div-login">

                <div class="form-wrapper">
                    <form id="login" class="form-signin wow fadeInUp" action="<?= base_url('sesion/iniciar') ?>" method="POST" onsubmit="return iniciarSesion();">
                        <h2 class="form-signin-heading">INICIO DE SESIÓN</h2>
                        <div class="login-wrap">

                            <input type="email" required name="email" id="email" class="form-control mayus"
                                   placeholder="Correo Electrónico" autocomplete autofocus>
                            <input type="password" required name="password" id="password" class="form-control mayus"
                                   placeholder="Contraseña">


                            <div id="error-login">

                            </div>


                            <a data-toggle="modal" href="#myModal" class="pull-right">¿Has Olvidado Tu Contraseña?</a>
                            <br>

                            <br>



                            <button  type="submit" class="btn btn-lg btn-login btn-block">


                                <i id="loading" class="">

                                </i>Acceder

                            </button>


                            <div class="registration">
                                ¿No tienes Cuenta Aún?
                                <a class="registro" href="<?=base_url('registrar-estudiante')?>">
                                    Crea una cuenta aquí
                                </a>
                            </div>

                        </div>


                    </form>
                </div>

            </div>


            <div class="col-md-6 col-sm-6  hidden-xs">

                <br>


                <h2 class="titulo text-center">BIENVENIDOS AL PORTAL DE GESTIÓN DE PROYECTOS DE GRADO</h2>

                <img src="<?php echo base_url(); ?>assets/img/inicio.png" alt="" class="img-responsive"/>

            </div>


        </div>  <!--row end-->


    </div>
</div>
