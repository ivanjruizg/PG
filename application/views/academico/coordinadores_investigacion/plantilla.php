<?php


$this->load->view("academico/inc/start_head");
$this->load->view("academico/inc/css");

?>

<!--    <link href="--><?//= base_url('assets/css/dataTables.bootstrap.css')?><!--" rel="stylesheet">-->
    <link href="<?= base_url('assets/css/responsive.bootstrap.css')?>" rel="stylesheet">


<?php


$this->load->view("academico/inc/end_head");
$this->load->view("academico/inc/sidebar-coordinador");
$this->load->view("academico/inc/nav");
$this->load->view("academico/coordinadores_investigacion/".$contenido);

$this->load->view("academico/inc/start_footer");
$this->load->view("academico/inc/js");



?>

<?php  foreach($js as $script):?>
<script src="<?=base_url();?>assets/js/<?=$script?>"></script>
<?php endforeach;?>






    <script >


        $(document).ready(function () {


            $(".inv1").hide();
            $(".inv2").hide();
            $(".inv3").hide();




            $('#director').typeahead({

                remote: '<?=base_url('coordinador/consultarDocentes?nombres=%QUERY')?>'

            });


            $('#co-director').typeahead({

                remote: '<?=base_url('coordinador/consultarDocentes?nombres=%QUERY')?>'

            });

            $('#director').typeahead({

                remote: '<?=base_url('coordinador/consultarDocentes?nombres=%QUERY')?>'

            });


            $('#evaluador1').typeahead({

                remote: '<?=base_url('coordinador/consultarDocentes?nombres=%QUERY')?>'

            });

            $('#evaluador2').typeahead({

                remote: '<?=base_url('coordinador/consultarDocentes?nombres=%QUERY')?>'

            });



    </script>



<?php

$this->load->view("academico/inc/end_footer");

?>