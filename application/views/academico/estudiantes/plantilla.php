<?php
$this->load->view("academico/inc/start_head");
$this->load->view("academico/inc/css");
?>

<?php  foreach($css as $script):?>
<link rel="stylesheet" href="<?=base_url();?>assets/css/<?=$script?>">
<?php endforeach;?>

<?php
$this->load->view("academico/inc/end_head");
$this->load->view("academico/inc/sidebar-estudiante");
$this->load->view("academico/inc/nav");
$this->load->view("academico/estudiantes/".$contenido);
$this->load->view("academico/inc/start_footer");
$this->load->view("academico/inc/js");
?>



<?php  foreach($js as $script):?>
<script src="<?=base_url();?>assets/js/<?=$script?>"></script>
<?php endforeach;?>

<?php

$this->load->view("academico/inc/end_footer");

?>





