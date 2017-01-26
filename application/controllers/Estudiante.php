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


        //$this->vista_consultar_propuesta();
        $this->vista_inicio();


    }


    function vista_inicio(){


        $datos['titulo'] = "Bienvenido!!!";
        $datos['contenido'] = 'propuestas/inicio_estudiante';
        $this->load->view("academico/estudiantes/plantilla", $datos);

    }



    function vista_consultar_propuesta()

    {


        $propuesta=$this->estudiantes_model->descripcion_propuesta();

        if(count($propuesta)>0) {

            $datos['titulo'] = "Estudiante";
            $datos['contenido'] = 'propuestas/ver_estado_propuesta';
            $datos['js'] = array("jquery.smartWizard.js","mis-scripts/modalBootstrap.js","mis-scripts/estudiante/estadosPropuesta.js");
            $datos['propuestas'] = $propuesta;
            $datos['investigadores'] = $this->propuestas_model->consultar_estudiantes($propuesta[0]['codigo']);
            $this->load->view("academico/estudiantes/plantilla", $datos);
        }

        else{

            $datos['titulo'] = "Bienvenido!!!";
            $datos['contenido'] = 'propuestas/no_propuesta';
            $this->load->view("academico/estudiantes/plantilla", $datos);


        }

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


    function ver_nota_final(){


        $codigo_propuesta=$this->input->post('codigo');

        $observaciones=$this->propuestas_model->observaciones_propuestas_evaluadas($codigo_propuesta);


        $nota=$this->propuestas_model->nota_final_propuesta($codigo_propuesta);

        echo '<table class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                        <thead>
                             <tr>
                                <th colspan="2">'.$observaciones[0]['titulo'].'</th>
                             </tr>
                             <tr>
                                <th width="5">Evaluadores</th>
                                <th width="5">Observaciones</th>
                             </tr>
                        </thead>
                        <tbody>
                        ';


        foreach ($observaciones as $observacion){


            echo '<tr>                              
                    <th style="width: 15%">' . $observacion['evaluador'] . '</th>
                    <th>' . $observacion['observaciones'] . '</th>
                  </tr>';



    }

     echo ' </tbody>
         
         </table>

        <div class="row">            
                 <label class="col-md-2">Nota Final: '.$nota[0]['nota'].'</label>
                 <strong>'.$nota[0]['descripcion_nota'].'</strong>
        </div>';




       // $this->load->view("academico/estudiantes/plantilla", $datos);





    }


    function ver($codigo_propuesta){

        $result=$this->propuestas_model->nota_final_propuesta($codigo_propuesta);

            echo var_dump($result);

    }


    function estado_propuesta($codigo_propuesta){





    }



    function ver_propuesta()
    {

        $codigo = $this->input->post('codigo');
        $result = $this->propuestas_model->listar_propuesta($codigo);

        $datos = array();

        foreach ($result as $propuesta) {

            $datos[] = array('codigo' => $propuesta['codigo'], 'titulo' => $propuesta['titulo'], 'estudiante' => $propuesta['estudiante'], 'tipo_propuesta' => $propuesta['tipo'], 'fecha_recepcion' => substr($propuesta['fecha_hora_subida'], 0, 10), 'director' => $propuesta['correo_director'], 'co_director' => $propuesta['correo_codirector']);

        }


        echo json_encode($datos);

    }


    function ver_sustentacion_asignada()
    {


        $codigo = $this->input->post('codigo');
        $sustentacion=$this->propuestas_model->horarios_de_sustentacion_propuesta($codigo);
        $result1 = $this->propuestas_model->listar_propuesta($codigo);

        $result2 = $this->propuestas_model->consultar_evaluadores($codigo);

        if(count($result2)==0){

            $result2[0]= array(
                "correo_evaluador"=>null
            );


            $result2[1]= array(
                "correo_evaluador"=>null
            );

        }



        $datos = array();

        foreach ($result1 as $propuesta) {

            $datos[] = array('codigo' => $propuesta['codigo'], 'titulo' => $propuesta['titulo'], 'estudiante' => $propuesta['estudiante'], 'tipo_propuesta' => $propuesta['tipo'], 'fecha_recepcion' => substr($propuesta['fecha_hora_subida'], 0, 10), 'director' => $propuesta['correo_director'], 'co_director' => $propuesta['correo_codirector'], 'evaluador1' => $result2[0]['correo_evaluador'], 'evaluador2' => $result2[1]['correo_evaluador'],'hora_sustentacion'=>$sustentacion[0]['hora'],'fecha_sustentacion'=>$sustentacion[0]['fecha'],'aula_sustentacion'=>$sustentacion[0]['aula']);

        }


        echo json_encode($datos);

    }


    function ver_propuesta_con_evaluadores(){

        $codigo = $this->input->post('codigo');
        $result1 = $this->propuestas_model->listar_propuesta($codigo);

        $result2 = $this->propuestas_model->consultar_evaluadores($codigo);

        if(count($result2)==0){

            $result2[0]= array(
                "correo_evaluador"=>null
            );


            $result2[1]= array(
                "correo_evaluador"=>null
            );

        }



        $datos = array();

        foreach ($result1 as $propuesta) {

            $datos[] = array('codigo' => $propuesta['codigo'], 'titulo' => $propuesta['titulo'], 'estudiante' => $propuesta['estudiante'], 'tipo_propuesta' => $propuesta['tipo'], 'fecha_recepcion' => substr($propuesta['fecha_hora_subida'], 0, 10), 'director' => $propuesta['correo_director'], 'co_director' => $propuesta['correo_codirector'], 'evaluador1' => $result2[0]['correo_evaluador'], 'evaluador2' => $result2[1]['correo_evaluador']);

        }


        echo json_encode($datos);


    }






}