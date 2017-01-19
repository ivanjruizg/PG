<div class="login-bg">
    <div class="container">


        <div class="row">

            <div class="col-md-6 col-lg-6 col-xs-12 col-sm-6 div-login">

                <div class="form-wrapper">
                    <form id="form-inscripcion-estudiante" class="form-inscripcion wow fadeInUp" action="<?= base_url('inscripcion_estudiante/registrar') ?>" method="POST" onsubmit="return registroEstudiante() ;">
                        <h2 class="form-signin-heading">FORMULARIO DE INSCRIPCIÓN</h2>
                        <div class="login-wrap">


                            <input type="text" required oninvalid="setCustomValidity('Introduzca los nombres')" name="nombres" id="nombre" class="form-control mayus" placeholder="Nombres" >
                            <input type="text" required oninvalid="setCustomValidity('Introduzca el primer apellido')" name="primer-apellido" id="primer-apellido" class="form-control mayus" placeholder="Primer Apellido">
                            <input type="text"  name="segundo-apellido" id="segundo-apellido" class="form-control mayus" placeholder="Segundo Apellido">


                            <select name="programa" id="carrera" class="form-control select" required>

                                <option value="">Seleccione programa académico :</option>

                                <?php


                                foreach ($programas as $programa){

                                    echo  '<option value="'.$programa['codigo'].'">'.$programa['nombre'].'</option>';





                                }

                                ?>


                            </select>


                            <select name="grupo-investigacion" id="programa" class="form-control select mayus" required>

                                <option value="">Seleccione  grupo de investigación :</option>

                                <?php


                                foreach ($grupos as $grupo){

                                    echo  '<option value="'.$grupo['codigo'].'">'.$grupo['nombre'].'</option>';





                                }

                                ?>


                            </select>


                            <!--pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" -->

                            <input type="email" required oninvalid="setCustomValidity('Introduzca su correo institucional \n' +
                             'Ejemplo: nombre.apellido@cecar.edu.co')" name="email" id="email" class="form-control mayus"   placeholder="Correo Electrónico Institucional" >


                            <input type="password" required name="clave" id="clave" class="form-control mayus" placeholder="Contraseña" onkeyup="comprobarClavesRegistro()">
                            <input type="password" required name="clave-confirmada" id="clave-confirmada" class="form-control mayus" placeholder="confirmar contraseña" onkeyup="comprobarClavesRegistro()">


                            <div id="mensaje">

                            </div>


                            <br>

                            <input type="submit" class="btn btn-lg btn-login btn-block" value="REGISTRAR">





                        </div>


                    </form>
                </div>



            </div>

            <br>

            <br>

            <div class="col-lg-6 col-sm-6 col-xs-12 wow fadeInRight">
                <h1>
                    Pasos de inscripción
                </h1>
                <hr>
                <p>
                    <i class="fa fa-check fa-lg pr-10 chulos">
                    </i>
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ablic jiener. natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ablic jiener. natus error sit voluptatem accusantiu.
                </p>
                <p>
                    <i class="fa fa-check fa-lg pr-10 chulos">
                    </i>
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ablic jiener. natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ablic jiener. natus error sit voluptatem accusantiu.
                </p>
                <p>
                    <i class="fa fa-check fa-lg pr-10 chulos">
                    </i>
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ablic jiener. <a target="_blank" href="https://accounts.google.com/ServiceLogin?continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ltmpl=default&hd=cecar.edu.co&service=mail&sacu=1&rip=1#identifier"><span>Aquí</span></a>
                </p>

                <a target="_blank" href="http://mail.google.com/a/cecar.edu.co" class="btn btn-purchase">


                    <i class="fa fa-envelope"></i> Ir al correo institucional

                </a>

            </div>



            <br>
            <br>
            <br>

        </div>  <!--row end-->


    </div>


</div>

