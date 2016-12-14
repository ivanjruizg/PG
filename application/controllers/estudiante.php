<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiante extends CI_Controller
{


    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('tipo') != ESTUDIANTES) {

            redirect(base_url());

        }


    }


    function index()
    {


        $this->vista_consultar_propuesta();


    }

    function vista_consultar_propuesta()
    {

        $datos['titulo'] = "Estudiante";
        $datos['contenido'] = 'propuestas/ver_estado_propuesta';
        $datos['css'] = array("");
        $datos['js'] = array("jquery.smartWizard.js");
        $this->load->view("academico/estudiantes/plantilla", $datos);


    }

    function vista_cambiar_clave_de_acceso()
    {

        $datos['titulo'] = "Estudiante";
        $datos['contenido'] = 'cambiar_clave/cambiar_clave_de_acceso';
        $datos['css'] = array("");
        $datos['js'] = array("scripts/cambiarClave.js");
        $this->load->view("academico/estudiantes/plantilla", $datos);


    }

    function cambiar_clave_de_acceso(){


        $clave_antigua = $this->input->post('clave-actual');
        $clave_nueva = $this->input->post('clave-nueva');
        $clave_nueva_confirmada = $this->input->post('clave-nueva-confirmada');


        if(strcmp($clave_nueva,$clave_nueva_confirmada)==0){





            $this->load->model('estudiantes_model');

            $datos = array(

                "clave"=>$clave_nueva

            );

            $result= $this->estudiantes_model->cambiar_clave_de_acceso($clave_antigua,$datos);

            echo $result;

        }



    }

    function vista_nueva_propuesta()
    {

        $this->load->model('propuestas_model');
        $result = $this->propuestas_model->calendario_abierto();


        if (count($result) != 1) {

            $datos['css'] = array("flipclock.css");
            $datos['js'] = array("temporizador/flipclock.min.js", "temporizador/temporizador.js");
            $datos['titulo'] = "Plataforma cerrada!";
            $datos['contenido'] = 'propuestas/plataforma_cerrada';
            $this->load->view("academico/estudiantes/plantilla", $datos);

        } else {

            $this->load->model('tipo_propuestas_model');
            $datos['tipos'] = $this->tipo_propuestas_model->listar();
            $datos['css'] = array("jquery-ui.css");
            $datos['js'] = array("jquery-ui.js","scripts/nuevaPropuesta.js");
            $datos['titulo'] = "Nueva Propuesta";
            $datos['contenido'] = 'propuestas/nueva_propuesta';
            $this->load->view("academico/estudiantes/plantilla", $datos);

        }

    }

    function consultar()
    {

        $this->load->model('estudiantes_model');

        if (isset($_GET['term'])) {

            $nombres = $_GET['term'];

            $nombres = strtolower($nombres);
            $valores = $this->estudiantes_model->consultar($nombres);


            echo json_encode($valores);


        }


    }


    function subir2()
    {


        $titulo = $this->input->post('titulo');

        echo $titulo;

        $palabras_clave = $this->input->post('palabras-clave');
        $resumen = $this->input->post('resumen');

        $investigador2 = $this->input->post('investigador2');
        $investigador3 = $this->input->post('investigador3');


        $tipo = $this->input->post('tipo');


        $propuesta = 'propuesta';

        $config['file_name'] = $propuesta . "-" . $titulo;
        $config['allowed_types'] = "doc|docx";
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";

        $config['upload_path'] = './assets/docs/propuestas';

        $this->load->library('upload', $config);


        if (!$this->upload->do_upload($propuesta)) {
            //*** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors() . "           1";
            return;
        }

        $data['uploadSuccess'] = $this->upload->data();

        $ruta_propuesta = $this->upload->file_name;

        $carta = 'carta';

        $config2['file_name'] = $carta . "-" . $titulo;
        $config2['allowed_types'] = "png|jpeg|jpg|gif";
        $config2['max_size'] = "50000";
        $config2['max_width'] = "2000";
        $config2['max_height'] = "2000";

        $config2['upload_path'] = './assets/docs/cartas';


        $this->upload->initialize($config2);

        if (!$this->upload->do_upload($carta)) {
            //*** ocurrio un error
            $data2['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors() . "    2";
            return;
        }


        $data2['uploadSuccess'] = $this->upload->data();

        $ruta_carta = $this->upload->file_name;

        $this->load->model('propuestas_model');


        $periodo_recepcion = $this->propuestas_model->calendario_abierto();


        echo var_dump($periodo_recepcion);


        foreach ($periodo_recepcion as $p) {

            $periodo = $p['periodo'];
        }


        $datos_propuesta = array(
            "titulo" => $titulo,
            "tipo" => $tipo,
            "ruta_propuesta" => $ruta_propuesta,
            "ruta_carta" => $ruta_carta,
            "resumen" => $resumen,
            "periodo_recepcion" => $periodo

        );


        $codigo_propuesta = $this->propuestas_model->registrar_propuestas($datos_propuesta);


        if ($codigo_propuesta > 0) {


            $datos_investigador1 = array(

                "codigo_propuesta" => $codigo_propuesta,
                "correo_estudiante" => $this->session->userdata('correo')


            );


            if ($this->propuestas_model->registrar_investigadores($datos_investigador1) > 0) {


                echo "Ivestigador 1";

                if (!empty($investigador2)) {


                    $datos_investigador2 = array(

                        "codigo_propuesta" => $codigo_propuesta,
                        "correo_estudiante" => $investigador2,


                    );

                    if ($this->propuestas_model->registrar_investigadores($datos_investigador2) > 0) {

                        echo "Ivestigador 2";


                        if (!empty($investigador3)) {

                            $datos_investigador3 = array(

                                "codigo_propuesta" => $codigo_propuesta,
                                "correo_estudiante" => $investigador3,


                            );

                            if ($this->propuestas_model->registrar_investigadores($datos_investigador3) > 0) {

                                echo "Ivestigador 3";


                            }


                        }

                    }

                }


            } else {

                echo "No";


            }


        } else {

            echo "No propuesta";

        }
    }


    function subir()
    {

        $this->load->model('propuestas_model');

        $titulo = $this->input->post('titulo');

        $palabras_clave = $this->input->post('palabras-clave');
        $resumen = $this->input->post('resumen');

        $investigador2 = explode(" - ", $this->input->post('investigador2'));
        $investigador3 = explode(" - ", $this->input->post('investigador3'));

        $tipo = $this->input->post('tipo');


        /* $this->load->model('file');

         $ruta_propuesta=$this->file->Upload_Propuesta('./assets/docs/propuestas',"No se ha podido subir la propuesta");

         $ruta_carta=$this->file->Upload_Imagen('./assets/docs/cartas', "");*/


        $this->load->library("subir_documentos");

        $ruta_propuesta = $this->subir_documentos->Subir_Propuesta('./assets/docs/propuestas', "No se ha podido subir la propuesta");

        $ruta_carta = $this->subir_documentos->Subir_Carta('./assets/docs/cartas', "");


        $periodo_recepcion = $this->propuestas_model->calendario_abierto();


        echo var_dump($periodo_recepcion);


        foreach ($periodo_recepcion as $p) {

            $periodo = $p['periodo'];
        }


        $datos_propuesta = array(
            "titulo" => $titulo,
            "tipo" => $tipo,
            "ruta_propuesta" => $ruta_propuesta,
            "ruta_carta" => $ruta_carta,
            "resumen" => $resumen,
            "periodo_recepcion" => $periodo

        );


        $codigo_propuesta = $this->propuestas_model->registrar_propuestas($datos_propuesta);


        if ($codigo_propuesta > 0) {


            $datos_investigador1 = array(

                "codigo_propuesta" => $codigo_propuesta,
                "correo_estudiante" => $this->session->userdata('correo')


            );


            if ($this->propuestas_model->registrar_investigadores($datos_investigador1) > 0) {


                if (!empty($investigador2[0])) {


                    $datos_investigador2 = array(

                        "codigo_propuesta" => $codigo_propuesta,
                        "correo_estudiante" => $investigador2[1],


                    );

                    if ($this->propuestas_model->registrar_investigadores($datos_investigador2) > 0) {


                        if (!empty($investigador3[0])) {

                            $datos_investigador3 = array(

                                "codigo_propuesta" => $codigo_propuesta,
                                "correo_estudiante" => $investigador3[1],


                            );

                            if ($this->propuestas_model->registrar_investigadores($datos_investigador3) > 0) {


                            }


                        }

                    }

                }


            } else {

                echo "No";


            }


        } else {

            echo "No propuesta";

        }


        redirect(base_url());


    }


    function reloj()
    {

        $this->load->model('propuestas_model');
        $result = $this->propuestas_model->reloj();

        if ($result != FALSE) {

            $vector = array();

            foreach ($result as $segundos) {

                $vector = array('segundos' => $segundos['segundos']);
            }

            echo $vector['segundos'];

        } else {

            echo 0;

        }

    }


}