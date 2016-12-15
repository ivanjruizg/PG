<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coordinador extends CI_Controller {


    function __construct()
    {
        parent::__construct();
        $this->load->model('propuestas_model');

        if ($this->session->userdata('tipo')!=COORDINADORES) {

            redirect(base_url());

        }

    }

    function index(){


        $datos['titulo']="Coordinador de investigación";
        $datos['contenido']="contenido";
        $datos['propuestas']= $this->propuestas_model->listar();
        $datos['css']= array("");
        $datos['js']= array("scripts/coordinadorIndex.js");
        $this->load->view("academico/coordinadores_investigacion/plantilla",$datos);

    }

    function vista_asignar_directores()
    {

        $datos['titulo']="Coordinador de investigación";
        $datos['contenido']="propuestas/asignar_directores";
        $datos['propuestas']= $this->propuestas_model->listar();
        $datos['css']= array("");
        $datos['js'] = array("coordinador.js",'scripts/asignarDirectores.js','datatables/jquery.dataTables.min.js','datatables/dataTables.bootstrap.min.js','datatables/dataTables.responsive.min.js');
        $this->load->view("academico/coordinadores_investigacion/plantilla",$datos);

    }

    function vista_asignar_evaluadores()
    {


        $datos['titulo']="Coordinador de investigación";
        $datos['contenido']="propuestas/asignar_evaluadores";
        $datos['css']= array("");
        $datos['js'] = array('coordinador.js','scripts/asignarEvaluadores.js');

        $datos['propuestas']= $this->propuestas_model->listar();

        $this->load->view("academico/coordinadores_investigacion/plantilla",$datos);

    }


    function asignar_director()
    {




        $codigo_propuesta = $this->input->post('codigo');
        $director = explode(" - ", $this->input->post('director'));

        $co_director = explode(" - ", $this->input->post('co-director'));


        $datos1 = array(

            "correo_director" => $director[1]

        );

        $datos2 = array(

            "correo_codirector" => $co_director[1]

        );

       $op  = $this->propuestas_model->asignar_director($codigo_propuesta,$datos1);


        if($op>0){

            echo "SI director";
            if(isset($co_director)){

                $this->propuestas_model->asignar_codirector($codigo_propuesta,$datos2);

            }

        }

        echo "Si co-director";


    }



    function asignar_evaluador()
    {


        $codigo_propuesta = $this->input->post('codigo');
        $evaluador1 = explode(" - ", $this->input->post('evaluador1'));

        $evaluador2 = explode(" - ", $this->input->post('evaluador2'));


        $datos = array(

            "correo_evaluador1" => $evaluador1[1],
            "correo_evaluador2" => $evaluador2[1]

        );




         $this->propuestas_model->asignar_evaluador($codigo_propuesta,$datos);




        echo "SI evaluador 2";

    }


    function vista_calendario_recepcion_propuestas()
    {

        $datos['titulo']="Coordinador de investigación";
        $datos['contenido']="calendario/tabla_calendario";
        $datos['calendario'] = $this->propuestas_model->ver_calendario_de_trabajos_de_grado();
        $datos['css']= array("");
        $datos['js'] = array('coordinador.js','scripts/tablaCalendario.js');
        $this->load->view("academico/coordinadores_investigacion/plantilla",$datos);


    }


    function vista_crear_periodo_recepcion()
    {

        $datos['titulo']="Coordinador de investigación";
        $datos['contenido']="calendario/crear_periodo_recepcion";
        $datos['calendario'] = $this->propuestas_model->ver_calendario_de_trabajos_de_grado();
        $datos['css']= array("");
        $datos['js'] = array('coordinador.js','scripts/crearPeriodoRecepcion.js');
        $this->load->view("academico/coordinadores_investigacion/plantilla",$datos);

    }



    function cambiar_fechas_periodos(){


        $periodo = $this->input->post('periodo');
        $fecha_inicio_recepcion = $this->input->post('fecha-inicio');
        $fecha_fin_recepcion = $this->input->post('fecha-limite');
        $fecha_sustentacion = $this->input->post('fecha-sustentacion');



        $cambios = $this->propuestas_model->cambiar_fechas_periodos($periodo,$fecha_inicio_recepcion,$fecha_fin_recepcion, $fecha_sustentacion);


        redirect("coordinador/calendario");


    }


    function consultarDocentes(){

        $this->load->model('docentes_model');

        if (isset($_GET['nombres'])){



            $nombres = strtolower($_GET['nombres']);
            $valores = $this->docentes_model->consultar($nombres);




            echo json_encode($valores);
        }
    }

    function crear_periodo(){


        $anio = $this->input->post('anio');
        $mes = $this->input->post('mes');

        $fecha_recepcion = $this->input->post('fecha-recepcion');
        $fecha_sustentacion = $this->input->post('fecha-sustentacion');


        $this->propuestas_model->crear_periodo($anio,$mes,$fecha_recepcion, $fecha_sustentacion);


        echo '<div class="alert alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Registro completado con exito!</strong></div>';


    }

    function ver_propuesta(){

        $codigo = $this->input->post('codigo');
        $result = $this->propuestas_model->listar_propuesta($codigo);

        $datos=array();

        foreach ($result as $propuesta){

            $datos[] = array('codigo' => $propuesta['codigo'], 'titulo' => $propuesta['titulo'], 'estudiante' => $propuesta['estudiante'], 'tipo_propuesta' => $propuesta['tipo'], 'fecha_recepcion'=> substr($propuesta['fecha_hora_subida'],0,10));

        }


        echo json_encode( $datos);

    }


    function verCartaRemision()
    {


        $codigo = $this->input->post('codigo');
        $result = $this->propuestas_model->buscarCarta($codigo);

        /*        $datos=array();

                foreach ($result as $propuesta){

                    $datos[] = array('ruta_carta' => $propuesta['ruta_carta']);

                }*/


        echo json_encode($result);


    }


    function descargarArchivo($ruta_imagen)
    {

        $this->load->helper('download');
        //Get the file from whatever the user uploaded (NOTE: Users needs to upload first), @See http://localhost/CI/index.php/upload
        $data = file_get_contents("./assets/docs/cartas/" . $ruta_imagen);
        //Read the file's contents
        $name = $ruta_imagen;

        //use this function to force the session/browser to download the file uploaded by the user
        force_download($name, $data);

    }


}
