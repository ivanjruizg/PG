<?php


$this->load->view("academico/inc/start_head");
$this->load->view("academico/inc/css");

?>
<?php  foreach($css as $estilo):?>

    <link href="<?=base_url();?>assets/css/<?=$estilo?>" rel="stylesheet">

<?php endforeach;?>

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


<?php

$this->load->view("academico/inc/end_footer");

?>