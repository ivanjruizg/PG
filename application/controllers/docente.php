<?php

/**
 * Created by PhpStorm.
 * User: Ing. José Ríos
 * Date: 31/10/2016
 * Time: 4:19 PM
 */
class Docente extends  CI_Controller {



    function __construct()
    {
        parent::__construct();
        $this->load->model('propuestas_model');

        if ($this->session->userdata('tipo') != DOCENTES) {

            redirect(base_url());

        }


    }


    function index()
    {

        $this->vista_propuestas_por_evaluar1();

    }

    function vista_propuestas_por_evaluar1()
    {

        $datos['titulo'] = "Docentes";
        $datos['contenido'] = 'propuestas/ver_propuestas_por_evaluar';

        $datos['js'] = array('');

        $correo_docente=$this->session->userdata('correo');

        $datos['propuestas']= $this->propuestas_model->propuestas_por_evaluar1($correo_docente);

        $this->load->view("academico/docentes/plantilla", $datos);


    }

    function vista_propuestas_disponibles_por_evaluar()
    {

        $datos['titulo'] = "Docentes";
        $datos['contenido'] = 'propuestas/ver_propuestas_disponibles_evaluar';

        $datos['js'] = array('');

        $correo_docente=$this->session->userdata('correo');

        $datos['propuestas']= $this->propuestas_model->propuestas_por_evaluar_abiertas($correo_docente);
        $datos['preguntas']= $this->propuestas_model->listar_preguntas();

        $this->load->view("academico/docentes/plantilla", $datos);


    }

    function ver_correo(){

        echo $this->session->userdata('correo');

    }

    function vista_propuestas_dirigidas()
    {

        $datos['titulo'] = "Docentes";
        $datos['contenido'] = 'propuestas/ver_propuestas_dirigidas';


        $correo_docente=$this->session->userdata('correo');
        $datos['js'] = array('');

        $datos['propuestas']= $this->propuestas_model->propuestas_dirigidas($correo_docente);

        $this->load->view("academico/docentes/plantilla", $datos);


    }


    function propuestas_dirigidas2()
    {


        $correo_docente=$this->session->userdata('correo');

        $propuestas= $this->propuestas_model->propuestas_dirigidas($correo_docente);



    foreach ($propuestas as $propuesta){


                $titulo = "'".$propuesta['titulo']."'";

            echo'<tr>

                    <td>'.$propuesta['titulo'].'</td>
                    <td>'.$propuesta['tipo'].'</td>
                    <td class="text-center"><a href="javascript:selecionarPropuestaParaSubirInforme('.$propuesta['codigo'].','.$titulo.');" class="fa fa-check fa-2x"></a></td>
                </tr>';

        }


    }

    function vista_propuestas_co_dirigidas()
    {

        $datos['titulo'] = "Docentes";
        $datos['contenido'] = 'propuestas/ver_propuestas_co_dirigidas';


        $correo_docente=$this->session->userdata('correo');
        $datos['js'] = array('');

        $datos['propuestas']= $this->propuestas_model->propuestas_co_dirigidas($correo_docente);

        $this->load->view("academico/docentes/plantilla", $datos);


    }




    function consultar(){

        $this->load->model('docentes_model');

        if (isset($_GET['nombres'])){



            $nombres = strtolower($_GET['nombres']);
            $valores = $this->docentes_model->consultar($nombres);




            echo json_encode($valores);
        }
    }

    function  vista_subir_informe_final(){


        $datos['titulo'] = "Docentes";
        $datos['contenido'] = 'informes-finales/subir_informe';
        $datos['js'] = array('mis-scripts/docente/subirInforme.js');
        $correo_docente=$this->session->userdata('correo');


        $datos['propuestas']= $this->propuestas_model->propuestas_dirigidas($correo_docente);

        $this->load->view("academico/docentes/plantilla", $datos);



    }




    function subir_informe_final()
    {




        $codigo_propuesta = $this->input->post('codigo-propuesta');
        $titulo = $this->input->post('titulo');


        $propuesta = 'informe';

        $config['file_name'] = $propuesta."-".$titulo;
        $config['allowed_types'] = "doc|docx";
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";

        $config['upload_path'] = './assets/docs/informes-finales';

        $this->load->library('upload', $config);


        if (!$this->upload->do_upload($propuesta)) {
            //*** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors() . "           1";
            return;
        }

        $data['uploadSuccess'] = $this->upload->data();

        $ruta_informe = $this->upload->file_name;



        echo $ruta_informe;



        $datos_informe = array(
            "codigo_propuesta" => $codigo_propuesta,


        );

        $datos_propuesta = array(

            "ruta_informe_final" => $ruta_informe,

        );




        $codigo_propuesta = $this->propuestas_model->registrar_informe($codigo_propuesta,$datos_informe,$datos_propuesta);


        if ($codigo_propuesta > 0) {

            echo "Yes...";

        }


    }

    function vista_evaluar_propuesta(){


        $datos['titulo'] = "Docentes";
        $datos['contenido'] = 'propuestas/ver_propuestas_sustentadas';

        $datos['js'] = array('');
        $correo_docente=$this->session->userdata('correo');

        $datos['propuestas']= $this->propuestas_model->propuestas_por_evaluar($correo_docente);

        $this->load->view("academico/docentes/plantilla", $datos);

    }



    function p($correo){

        echo var_dump($this->propuestas_model->propuestas_por_evaluar_abiertas($correo));

    }


}