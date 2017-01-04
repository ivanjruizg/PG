<?php
$this->load->helper('html');
$this->load->view("academico/inc/start_head");
$this->load->view("academico/inc/css");
?>
<?php
if(isset($css)){
    foreach ($css as $estilo) {
        if ($estilo != '') {
            echo link_tag('assets/css/' . $estilo);
        }
    }
}
?>
    <link href="<?= base_url('assets/css/responsive.bootstrap.css')?>" rel="stylesheet">

<?php
$this->load->view("academico/inc/end_head");
$this->load->view("academico/inc/sidebar-coordinador");
$this->load->view("academico/inc/nav");
$this->load->view("academico/coordinadores_investigacion/".$contenido);
$this->load->view("academico/inc/start_footer");
$this->load->view("academico/inc/js");
?>

<?php
if(isset($js)) {
    foreach ($js as $script) {
        if ($script != '') {
            echo script_tag('assets/js/' . $script);
        }
    }
}
?>

<?php
$this->load->view("academico/inc/end_footer");
?>