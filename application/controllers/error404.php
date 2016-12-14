<?php

/**
 * Created by PhpStorm.
 * User: Ivan Ruiz G
 * Date: 09/11/2016
 * Time: 1:42 PM
 */
class Error404 extends CI_Controller{




    function index(){


        $datos['titulo'] = "Página no encontrada!!!";

        $this->load->view('inicio/inc/header', $datos);
        $this->load->view('errors/error_404');
        $this->load->view('inicio/inc/footer');


    }






}