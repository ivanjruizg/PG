<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiante extends CI_Controller
{


    function __construct()
    {
        parent::__construct();

        $this->load->model('estudiantes_model');
        $this->load->model('propuestas_model');
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


        $propuesta=$this->estudiantes_model->descripcion_propuesta();



        $datos['titulo'] = "Estudiante";
        $datos['contenido'] = 'propuestas/ver_estado_propuesta';
        $datos['js'] = array("jquery.smartWizard.js");
        $datos['propuestas']=$propuesta;

        $datos['investigadores']=$this->propuestas_model->consultar_estudiantes($propuesta[0]['codigo']);


        $this->load->view("academico/estudiantes/plantilla", $datos);


    }

    function vista_cambiar_clave_de_acceso()
    {

        $datos['titulo'] = "Estudiante";
        $datos['contenido'] = 'cambiar_clave/cambiar_clave_de_acceso';
        $datos['js'] = array("mis-scripts/cambiarClave.js");
        $this->load->view("academico/estudiantes/plantilla", $datos);


    }

    function cambiar_clave_de_acceso()
    {


        $clave_antigua = $this->input->post('clave-actual');
        $clave_nueva = $this->input->post('clave-nueva');
        $clave_nueva_confirmada = $this->input->post('clave-nueva-confirmada');


        if (strcmp($clave_nueva, $clave_nueva_confirmada) == 0) {

            $datos = array(

                "clave" => $clave_nueva

            );

            $result = $this->estudiantes_model->cambiar_clave_de_acceso($clave_antigua, $datos);

            echo $result;

        }


    }


    function xx()
    {

        echo var_dump($this->estudiantes_model->consultar_mis_propuestas($this->session->userdata('correo')));


    }

    function vista_nueva_propuesta()
    {

        $this->load->model('propuestas_model');
        $result = $this->propuestas_model->calendario_recepcion_abierto();

        if (is_null($result)) {

            $datos['css'] = array('flipclock.css');
            $datos['js'] = array('temporizador/flipclock.min.js', 'temporizador/temporizador.js');
            $datos['titulo'] = "Plataforma cerrada!";
            $datos['contenido'] = 'propuestas/plataforma_cerrada';
            $this->load->view("academico/estudiantes/plantilla", $datos);

        } else {


            $mis_propuestas = $this->estudiantes_model->consultar_mis_propuestas($this->session->userdata('correo'));


            if (count($mis_propuestas) > 0) {


                $datos['css'] = array();
                $datos['js'] = array();
                $datos['titulo_propuesta'] = $mis_propuestas;
                $datos['titulo'] = "Nueva Propuesta";
                $datos['contenido'] = 'propuestas/plataforma_deshalitada';
                $this->load->view("academico/estudiantes/plantilla", $datos);


            } else {


                $datos['tipos'] = $this->propuestas_model->listar_tipos_propuestas();
                $datos['css'] = array('jquery-ui.css', 'jquery.tagsinput.css');
                $datos['js'] = array('jquery-ui.js', 'mis-scripts/estudiante/nuevaPropuesta.js', 'jquery.tagsinput.js');
                $datos['titulo'] = "Nueva Propuesta";
                $datos['contenido'] = 'propuestas/nueva_propuesta';
                $this->load->view("academico/estudiantes/plantilla", $datos);
            }


        }

    }

    function consultar()
    {


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


        $periodo_recepcion = $this->propuestas_model->calendario_recepcion_abierto();


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


        $codigo_propuesta = $this->estudiantes_model->registrar_propuestas($datos_propuesta);


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

        $titulo = utf8_decode(mb_strtoupper($this->input->post('titulo')));

        $palabras_claves = mb_strtoupper($this->input->post('palabras-clave'));


        $resumen = $this->input->post('resumen');

        $investigador2 = $this->input->post('investigador2');
        $investigador3 = $this->input->post('investigador3');

        $tipo = $this->input->post('tipo');

        $this->load->library("subir_documentos");

        $ruta_propuesta = $this->subir_documentos->subir_propuesta('./assets/docs/propuestas', $titulo, "No se ha podido subir la propuesta");

        $ruta_carta = $this->subir_documentos->subir_carta('./assets/docs/cartas', $titulo, "");


        $periodo_recepcion = $this->propuestas_model->calendario_recepcion_abierto();


        $datos_propuesta = array(
            "titulo" => utf8_encode($titulo),
            "tipo" => $tipo,
            "ruta_propuesta" => utf8_encode($ruta_propuesta),
            "ruta_carta" => utf8_encode($ruta_carta),
            "resumen" => $resumen,
            "palabras_claves" => $palabras_claves,
            "periodo_recepcion" => $periodo_recepcion

        );


        $codigo_propuesta = $this->estudiantes_model->registrar_propuestas($datos_propuesta);


        if ($codigo_propuesta > 0) {


            $datos_investigador1 = array(

                "codigo_propuesta" => $codigo_propuesta,
                "correo_estudiante" => $this->session->userdata('correo')


            );


            if ($this->estudiantes_model->registrar_investigadores($datos_investigador1) > 0) {


                if (!empty($investigador2[0])) {


                    $datos_investigador2 = array(

                        "codigo_propuesta" => $codigo_propuesta,
                        "correo_estudiante" => $investigador2,


                    );

                    if ($this->estudiantes_model->registrar_investigadores($datos_investigador2) > 0) {


                        if (!empty($investigador3[0])) {

                            $datos_investigador3 = array(

                                "codigo_propuesta" => $codigo_propuesta,
                                "correo_estudiante" => $investigador3,


                            );

                            if ($this->estudiantes_model->registrar_investigadores($datos_investigador3) > 0) {


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


        redirect(base_url('estudiante/nueva-propuesta'));


    }


    function reloj()
    {


        $result = $this->estudiantes_model->reloj();

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


    function vista_ver_nota_final($codigo_propuesta){




        $observaciones=$this->propuestas_model->observaciones_propuestas_evaluadas($codigo_propuesta);
        $nota=$this->propuestas_model->nota_final_propuesta($codigo_propuesta);


        $datos['titulo'] = "Estudiante-Nota Final";
        $datos['contenido'] = 'propuestas/ver_nota_final';
        $datos['observaciones']=$observaciones;
        $datos['nota']=$nota;


        $this->load->view("academico/estudiantes/plantilla", $datos);





    }


    function ver($codigo_propuesta){

        $result=$this->propuestas_model->nota_final_propuesta($codigo_propuesta);

            echo var_dump($result);

    }

}