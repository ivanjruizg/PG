<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coordinador extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('propuestas_model');




        if ($this->session->userdata('tipo') != COORDINADORES) {

            redirect(base_url());

        }

    }

    function index()
    {


        $datos['titulo'] = "Coordinador de investigación";
        $datos['contenido'] = "contenido";
        $datos['propuestas'] = $this->propuestas_model->listar();
        $datos['css'] = array('');
        $datos['js'] = array("mis-scripts/coordinador/coordinadorIndex.js");
        $this->load->view("academico/coordinadores_investigacion/plantilla", $datos);

    }

    function vista_asignar_directores()
    {

        $datos['titulo'] = "Coordinador de investigación";
        $datos['contenido'] = "propuestas/asignar_directores";
        $datos['propuestas'] = $this->propuestas_model->listar();
        $datos['css'] = array('jquery-ui.css');
        $datos['js'] = array('jquery-ui.js', 'mis-scripts/coordinador/asignarDirectores.js', 'datatables/jquery.dataTables.min.js', 'datatables/dataTables.bootstrap.min.js', 'datatables/dataTables.responsive.min.js');
        $this->load->view("academico/coordinadores_investigacion/plantilla", $datos);

    }

    function vista_asignar_evaluadores()
    {


        $datos['titulo'] = "Coordinador de investigación";
        $datos['contenido'] = "propuestas/asignar_evaluadores";
        $datos['css'] = array('jquery-ui.css');
        $datos['js'] = array('jquery-ui.js', 'mis-scripts/coordinador/asignarEvaluadores.js');

        $datos['propuestas'] = $this->propuestas_model->listar();

        $this->load->view("academico/coordinadores_investigacion/plantilla", $datos);

    }


    function asignar_director()
    {


        $codigo_propuesta = $this->input->post('codigo');
        $director = $this->input->post('director');

        $co_director = $this->input->post('co-director');


        $datos1 = array(

            "correo_director" => $director

        );

        $datos2 = array(

            "correo_codirector" => $co_director

        );

        $op = $this->propuestas_model->asignar_director($codigo_propuesta, $datos1);


        if ($op > 0) {

            echo "SI director";
            if (isset($co_director)) {

                $this->propuestas_model->asignar_codirector($codigo_propuesta, $datos2);

            }

        }

        echo "Si co-director";


    }


    function vista_asignar_sustentaciones()
    {

        $datos['titulo'] = "Coordinador de investigación";
        $datos['contenido'] = "sustentaciones/asignar_sustentaciones";
        //$datos['propuestas'] = $this->propuestas_model->listar_propuestas_a_evaluar();
        $datos['horarios']= $this->propuestas_model->horarios_de_sustentaciones2();
        $datos['css'] = array('dataTables.bootstrap.css');
        $datos['js'] = array('mis-scripts/coordinador/asignarSustentaciones.js','mis-scripts/cerrarModal.js', 'datatables/jquery.dataTables.min.js', 'datatables/dataTables.bootstrap.min.js', 'datatables/dataTables.responsive.min.js');

        $this->load->view("academico/coordinadores_investigacion/plantilla", $datos);


    }


    function  p(){

        echo  var_dump($this->propuestas_model->consultar_propuestas_a_sustentar());
    }



    function  consultar_titulo_propuesta($codigo){

         $this->propuestas_model->consultar_titulo($codigo);

    }

    function quitar_propuesta_horario_sustentacion(){


        $codigo = $this->input->post("codigo");


        $this->propuestas_model->quitar_propuesta_horario_sustentacion($codigo);



    }

    function vista_crear_fechas_sustentaciones()
    {

        $datos['titulo'] = "Coordinador de investigación";
        $datos['contenido'] = "sustentaciones/crear_fechas_sustentaciones";
        $datos['periodo'] = $this->propuestas_model->calendario_abierto();
        //  $datos['css']= array('jquery-ui.css');
        $datos['js'] = array('mis-scripts/cerrarModal.js');
        $this->load->view("academico/coordinadores_investigacion/plantilla", $datos);


    }


    function asignar_sustentaciones()
    {


        $codigosPropuesta = $this->input->post("propuestasSeleccionadas");


        $arrays = explode(",", $codigosPropuesta);

        $pos = $this->input->post("pos");


        $propuestas = $this->propuestas_model->listar_propuestas_a_evaluar($arrays);


        foreach ($propuestas as $propuesta) {

            $titulo = "'" . $propuesta['titulo'] . "'";


            echo '<tr>

                    <td>' . $propuesta['codigo'] . '</td>
                    <td>' . $propuesta['titulo'] . '</td>
                    <td>' . $propuesta['correo_evaluador1'] . ' - ' . $propuesta['correo_evaluador2'] . '</td>
                    <td class="text-center"><a href="javascript:selecionarPropuestaParaAsignarSustentacion(' . $pos . ',' . $propuesta['codigo'] . ',' . $titulo . ');" class="fa fa-check fa-2x"></a></td>
                </tr>';

        }


    }


    function crear_sustentaciones()
    {


        $propuestas = $this->input->post("propuestas");



        echo var_dump($propuestas);


        foreach ($propuestas as &$propuesta) {

            list($codigo_propuestas, $codigo_sustentacion) = explode(",", $propuesta);
            //echo $codigo."----".$hora;
            $this->propuestas_model->registrar_sustentaciones($codigo_propuestas, $codigo_sustentacion);


        }


    }


    function asignar_evaluador()
    {


        $codigo_propuesta = $this->input->post('codigo');
        $evaluador1 = $this->input->post('evaluador1');

        $evaluador2 = $this->input->post('evaluador2');


        $datos = array(

            "correo_evaluador1" => $evaluador1,
            "correo_evaluador2" => $evaluador2

        );


        $this->propuestas_model->asignar_evaluadores($codigo_propuesta, $datos);


        echo "SI evaluador 2";

    }


    function vista_calendario_recepcion_propuestas()
    {

        $datos['titulo'] = "Coordinador de investigación";
        $datos['contenido'] = "calendario/tabla_calendario";
        $datos['calendario'] = $this->propuestas_model->ver_calendario_de_trabajos_de_grado();
        $datos['css'] = array();
        $datos['js'] = array('mis-scripts/coordinador/tablaCalendario.js');
        $this->load->view("academico/coordinadores_investigacion/plantilla", $datos);


    }


    function vista_crear_periodo_recepcion()
    {

        $datos['titulo'] = "Coordinador de investigación";
        $datos['contenido'] = "calendario/crear_periodo_recepcion";
        $datos['calendario'] = $this->propuestas_model->ver_calendario_de_trabajos_de_grado();
        $datos['css'] = array('');
        $datos['js'] = array('mis-scripts/coordinador/crearPeriodoRecepcion.js');
        $this->load->view("academico/coordinadores_investigacion/plantilla", $datos);

    }


    function crear_fechas_sustentacion()
    {


        $periodo = $this->input->post('periodo');
        $aula = $this->input->post('aula');
        $fecha = $this->input->post('fecha');
        $jornada = $this->input->post('jornada');

        $horasManana = array('08:00','08:30','09:00','09:30','10:00','10:30','11:00');
        $horasTarde = array('14:00','14:30','15:00','15:30','16:00','16:30','17:00');




        if($jornada==1){



            foreach ($horasManana as $hora){


                $this->propuestas_model->crear_horario_sustentaciones($periodo, $aula,$fecha,$hora);


            }




        }else   if($jornada==2){


            foreach ($horasTarde as $hora){


                $this->propuestas_model->crear_horario_sustentaciones($periodo, $aula,$fecha,$hora);



            }



        }else{

            foreach ($horasManana as $hora){


                $this->propuestas_model->crear_horario_sustentaciones($periodo, $aula,$fecha,$hora);

            }

            foreach ($horasTarde as $hora){


                $this->propuestas_model->crear_horario_sustentaciones($periodo, $aula,$fecha,$hora);

            }



        }

    }


    function cambiar_fechas_periodos()
    {


        $periodo = $this->input->post('periodo');
        $fecha_inicio_recepcion = $this->input->post('fecha-inicio');
        $fecha_fin_recepcion = $this->input->post('fecha-limite');
        $fecha_sustentacion = $this->input->post('fecha-sustentacion');


        $cambios = $this->propuestas_model->cambiar_fechas_periodos($periodo, $fecha_inicio_recepcion, $fecha_fin_recepcion, $fecha_sustentacion);


        redirect("coordinador/calendario-recepcion-propuestas");


    }


    function consultar_docentes()
    {

        $this->load->model('docentes_model');

        if (isset($_GET['term'])) {


            $nombres = strtolower($_GET['term']);
            $valores = $this->docentes_model->consultar($nombres);


            echo json_encode($valores);
        }
    }


    function crear_periodo()
    {


        $anio = $this->input->post('anio');
        $mes = $this->input->post('mes');

        $fecha_recepcion = $this->input->post('fecha-recepcion');
        $fecha_sustentacion = $this->input->post('fecha-sustentacion');


        $this->propuestas_model->crear_periodo($anio, $mes, $fecha_recepcion, $fecha_sustentacion);


        echo '<div class="alert alert-info alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Registro completado con exito!</strong></div>';


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
