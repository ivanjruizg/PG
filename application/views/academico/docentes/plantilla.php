<?php

$this->load->view("academico/inc/start_head");
$this->load->view("academico/inc/css");
$this->load->view("academico/inc/end_head");
$this->load->view("academico/inc/sidebar-docente");
$this->load->view("academico/inc/nav");
$this->load->view("academico/docentes/".$contenido);
$this->load->view("academico/inc/start_footer");
$this->load->view("academico/inc/js");


?>

<?php  foreach($js as $script):?>
    <script src="<?=base_url();?>assets/js/<?=$script?>"></script>
<?php endforeach;?>




<script src="<?php echo base_url();?>assets/js/typeahead.js"></script>

<script >

    $(document).ready(function($){



        $('#investigador2').typeahead({

            remote: '<?=base_url('estudiante/consultar?nombres=%QUERY')?>'

        });

        $('#investigador3').typeahead({

            remote: '<?=base_url('estudiante/consultar?nombres=%QUERY')?>'

        });




    });


</script>


<?php

$this->load->view("academico/inc/end_footer");

?>





