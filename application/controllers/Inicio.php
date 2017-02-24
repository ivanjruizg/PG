<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller
{

    public function index()
    {


        /*
            $datos['titulo'] = "INICIO";
            $datos['contenido'] = "index/inicio";

            $this->load->view('inicio/plantilla', $datos);


        */

        $this->vista_iniciar_sesion();

    }

    function vista_documentacion(){

        $datos['titulo'] = "DOCUMENTACIÓN";
        $datos['contenido'] = "documentacion/documentacion";

        $this->load->view('inicio/plantilla', $datos);

    }


    function vista_registro_exitoso(){

        $datos['titulo'] = "DOCUMENTACIÓN";
        $datos['contenido'] = "inscripcion_estudiantes/registro_exitoso";

        $this->load->view('inicio/plantilla', $datos);

    }


    function vista_iniciar_sesion(){


        if ($this->session->userdata('login')) {


            $tipo_usuario = $this->session->userdata('tipo');

            if ($tipo_usuario == COORDINADORES) {

                redirect(base_url('coordinador'));

            } else if ($tipo_usuario == ESTUDIANTES) {

                redirect(base_url('estudiante'));

            } else if ($tipo_usuario == DOCENTES) {


                redirect(base_url('docente'));


            }


        }else{

        $datos['titulo'] = "INICIO";
        $datos['contenido'] = "index/inicio_sesion";

        $this->load->view('inicio/plantilla', $datos);

        }
    }

    function vista_registro_estudiante()
    {

        $datos['titulo'] = "REGISTRO DE ESTUDIANTES";

        $datos['contenido'] = "inscripcion_estudiantes/inscripcion_estudiantes";
        $this->load->model('inscripcion_model');
        $datos['programas'] = $this->inscripcion_model->listar_carreras();

        $datos['grupos'] = $this->inscripcion_model->listar_grupos_de_investigacion();

        $this->load->view('inicio/plantilla', $datos);


    }


    function vista_registro_docente()
    {

        $datos['titulo'] = "REGISTRO DE DOCENTES";

        $datos['contenido'] = "inscripcion_docentes/inscripcion_docente";
        $this->load->model('inscripcion_model');

        $this->load->view('inicio/plantilla', $datos);


    }

}
