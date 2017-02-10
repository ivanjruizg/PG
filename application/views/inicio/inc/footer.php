<!--footer start-->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-12 address wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">

                <div class="text-footer">

                <h1>Información de Contacto</h1>
                <address>
                    <p><i class="fa fa-home pr-10"></i>Dirección: Carretera Troncal de Occidente KM.1 Vía Corozal</p>
                    <p><i class="fa fa-globe pr-10"></i>Sincelejo, Sucre</p>
                    <p><i class="fa fa-mobile pr-10"></i>Teléfono Movil : (+57) 456-7890</p>
                    <p><i class="fa fa-phone pr-10"></i>Teléfono Fijo : (123) 456-7890</p>
                    <p><i class="fa fa-envelope pr-10"></i>Correo : <a>coordinacioninvestigacionfcbia@cecar.edu.co</a></p>
                </address>
            </div>
            </div>

            <div class="col-lg-5 col-sm-12 col-md-5 wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">
                <div class="text-footer">
                    <h1>
                        FACULTAD DE CIENCIAS BÁSICAS, INGENIERÍA Y ARQUITECTURA
                    </h1>
                    <ul class="page-footer-list">
                        <li>
                            <i class="fa fa-angle-right"></i>
                            <a href="about.html">Ingeniería Industrial</a>
                        </li>
                        <li>
                            <i class="fa fa-angle-right"></i>
                            <a href="faq.html">Ingeniería de sistemas</a>
                        </li>
                        <li>
                            <i class="fa fa-angle-right"></i>
                            <a href="service.html">Arquitectura</a>
                        </li>


                    </ul>
                </div>
            </div>


            <div class="col-lg-2 col-sm-12 col-md-2 wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">

                <div class="text-footer">
                    <h1>BIENVENIDO</h1>
                    <p class="text-justify">

                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.

                    </p>
                </div>
            </div>

        </div>

    </div>
</footer>
<!-- footer end -->
<!--small footer start -->
<footer class="footer-small">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-6 pull-right">
                <ul class="social-link-footer list-unstyled">
                    <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".1s"><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".2s"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".5s"><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".8s"><a href="#"><i class="fa fa-youtube"></i></a></li>
                </ul>
            </div>



            <div class="col-md-4">
                <div class="copyright">
                    <p>&copy; Copyright - CECAR <?php echo date('Y') ?>.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--small footer end-->

<!-- js placed at the end of the document so the pages load faster -->
<script src="<?= base_url('assets/js/jquery-1.11.3.min.js');?>"></script>
<script src="<?= base_url('assets/js/mis-scripts/inicioSesion.js');?>"></script>
<script src="<?= base_url('assets/js/mis-scripts/registroEstudiante.js');?>"></script>
<script src="<?= base_url('assets/js/mis-scripts/registroDocentes.js');?>"></script>
<script src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>

<script  src="<?=base_url('assets/js/jquery.parallax-1.1.3.js')?>"></script>

<script src="<?=base_url('assets/js/parallax-slider/jquery.cslider.js')?>"></script>

<noscript>

    <meta http-equiv="Refresh" content="60;URL=<?=base_url('error/no_script')?>">

</noscript>

<script>
    window.oncontextmenu = function() {
        return true;
    }
</script>

<script type="text/javascript">
    $(function() {

        $('#da-slider').cslider({
            autoplay    : true,
            bgincrement : 100
        });

    });
</script>




<script src="<?php echo base_url();?>assets/js/wow.min.js"></script>
<script>
    wow = new WOW(
        {
            boxClass:     'wow',      // default
            animateClass: 'animated', // default
            offset:       0          // default
        }
    )
    wow.init();


    $(window).scroll(function() {
            $('#skillz').each(function(){
                    var imagePos = $(this).offset().top;
                    var viewportheight = window.innerHeight;

                    var topOfWindow = $(window).scrollTop();
                    if (imagePos < topOfWindow+viewportheight) {
                        $('.skill_bar').fadeIn('slow');
                        $('.skill_one').animate({
                                width:'50%'}
                            , 2000);

                        $('.skill_bar_progress p').fadeIn('slow',function(){

                            }
                        );
                    }
                }
            );
        }
    );



</script>

</body>
</html>
