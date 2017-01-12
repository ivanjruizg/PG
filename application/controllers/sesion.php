<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sesion extends CI_Controller
{


    function iniciar() {

        $this->load->model('Login_model');

        $email = $this->input->post("email");
        $password = $this->input->post("password");
        $resp = $this->Login_model->login($email, $password);

        if ($resp==-1) {

            echo "error";

        }elseif ($resp ==0 ){

            echo "estudiante inactivo";

        }else{

            if ($resp['tipo'] == ESTUDIANTES) {

                $this->session->set_userdata($resp);
                echo base_url('estudiante');

            } else if ($resp['tipo'] == COORDINADORES) {

                $this->session->set_userdata($resp);
                echo base_url('coordinador');


            }else if ($resp['tipo'] == DOCENTES) {

                $this->session->set_userdata($resp);
                echo base_url('docente');


            }


        }


    }


    function validar() {


        if ($this->session->userdata('login')) {


            if ($this->session->userdata('tipo') == 1) {

                redirect(base_url('coordinador'));

            } else {

                redirect(base_url('estudiante'));
            }


        } else {

            redirect(base_url());


        }


    }

    function cerrar() {

        $this->session->sess_destroy();
        redirect(base_url());
    }


}
