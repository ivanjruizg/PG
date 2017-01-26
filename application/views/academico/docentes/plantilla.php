<?php
$this->load->helper('html');

$this->load->view("academico/inc/start_head");
$this->load->view("academico/inc/css");
$this->load->view("academico/inc/end_head");
$this->load->view("academico/inc/sidebar-docente");
$this->load->view("academico/inc/nav");
$this->load->view("academico/docentes/".$contenido);
$this->load->view("academico/inc/start_footer");
$this->load->view("academico/inc/js");
?>

<?php

if(isset($js)) {
    foreach ($js as $script) {
        //echo script_tag('assets/js/'.$script);
        ?>
        <script src="<?=base_url('assets/js').'/'.$script?>"></script>
        <?php
    }
}

?>

<?php

$this->load->view("academico/inc/end_footer");

?>





