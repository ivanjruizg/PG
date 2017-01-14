<?php

/**
 * Created by PhpStorm.
 * User: Ivan Ruiz G
 * Date: 09/11/2016
 * Time: 1:42 PM
 */
class Error extends CI_Controller{




    function error404(){


        $datos['titulo'] = "Página no encontrada!!!";

        $this->load->view('inicio/inc/header', $datos);
        $this->load->view('errors/error_404');
        $this->load->view('inicio/inc/footer');


    }

    function no_script(){


        $datos['titulo'] = "JS!!!";

        $this->load->view('inicio/inc/header', $datos);
        $this->load->view('errors/error_no_script');
        $this->load->view('inicio/inc/footer');


    }






}