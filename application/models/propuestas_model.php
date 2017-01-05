<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Propuestas_model extends CI_Model
{

    function registrar_propuestas($datos_propuesta)
    {

        $this->db->insert("propuestas", $datos_propuesta);
       $codigo_propuesta=  $this->db->insert_id();


        $propuestas_asigandas = array(

            "codigo_propuesta"=>$codigo_propuesta

        );
        $this->db->insert("propuestas_asignadas",$propuestas_asigandas);


        return $codigo_propuesta;
    }




    function registrar_investigadores($datos_investigador)
    {

        $this->db->insert("investigadores", $datos_investigador);
        return $this->db->affected_rows();
    }

    function listar()
    {

        $this->db->select("p.codigo, p.titulo, p.ruta_carta, tp.convencion AS tipo,   DATE_FORMAT( p.fecha_hora_subida,'%d %b %y') AS fecha");
        $this->db->from('propuestas p');
        $this->db->join('tipos_propuesta tp', 'p.tipo = tp.codigo');
        $result = $this->db->get();

        return $result->result_array();

    }



    function listar_propuestas_a_evaluar(){

        $this->db->select("p.titulo,p.codigo,pa.correo_evaluador1,pa.correo_evaluador2", FALSE);
        $this->db->from('propuestas p');
        $this->db->join('propuestas_asignadas pa', 'pa.codigo_propuesta = p.codigo');
        $this->db->where('pa.correo_evaluador1 !=',null) ;
        $result = $this->db->get();
        return $result->result_array();



    }


    function listar_propuestas_sin_asignar_fecha_de_sustentacion()
    {

        /*
        $this->db->select("p.codigo, p.titulo, tp.convencion AS tipo,   DATE_FORMAT( p.fecha_hora_subida,'%d %b %y') AS fecha");
        $this->db->from('propuestas p');
        $this->db->join('tipos_propuesta tp', 'p.tipo = tp.codigo');
        $result = $this->db->get();

        */

        $result=  $this->db->query("SELECT p.codigo, p.titulo, tp.convencion AS tipo FROM propuestas p, tipos_propuesta tp
 
WHERE NOT (p.codigo IN(SELECT s.codigo_propuesta FROM sustentaciones s)) 
AND tp.codigo = p.tipo
");

        return $result->result_array();

    }


    function ver_calendario_de_trabajos_de_grado()
    {

        $this->db->select("periodo, fecha_inicio_recepcion,fecha_limite_recepcion, fecha_sustentacion");
        $this->db->from('calendario_trabajos_de_grado');
        $this->db->where("LEFT(periodo,4)", date('Y'));
        $result = $this->db->get();

        return $result->result_array();

    }


    function cambiar_fechas_periodos($periodo, $fecha_inicio_recepcion, $fecha_limite_recepcion, $fecha_sustentacion)
    {

        $datos = array(

            "fecha_inicio_recepcion" => $fecha_inicio_recepcion,
            "fecha_limite_recepcion" => $fecha_limite_recepcion,
            "fecha_sustentacion" => $fecha_sustentacion

        );


        $this->db->where("periodo", $periodo);

        $this->db->update("calendario_trabajos_de_grado", $datos);

        return $this->db->affected_rows();

    }


    function asignar_codirector($codigo_propuesta, $datos)
    {

        $this->db->where("codigo_propuesta", $codigo_propuesta);

        $this->db->update("investigadores", $datos);

        return $this->db->affected_rows();

    }


    function asignar_director($codigo_propuesta, $datos)
    {

        $this->db->where("codigo_propuesta", $codigo_propuesta);

        $this->db->update("investigadores", $datos);

        return $this->db->affected_rows();

    }

    function asignar_evaluadores($codigo_propuesta, $datos)
    {


        $this->db->where("codigo_propuesta", $codigo_propuesta);

        $this->db->update("propuestas_asignadas", $datos);

        return $this->db->affected_rows();



    }







    function crear_periodo($anio, $mes, $fecha_recepcion, $fecha_sustentacion)
    {





        $fecha_inicio_recepcion = date_sub(date_create($fecha_recepcion), date_interval_create_from_date_string("5 days"));

        $datos = array(

            "periodo" => $anio . "-" . $mes,
            "fecha_inicio_recepcion" => date_format($fecha_inicio_recepcion, "Y-m-d"),
            "fecha_limite_recepcion" => $fecha_recepcion,
            "fecha_sustentacion" => $fecha_sustentacion

        );

        return $this->db->insert("calendario_trabajos_de_grado", $datos);

    }


    function listar_propuesta($codigo)
    {


        $this->db->select("p.codigo, p.titulo,p.fecha_hora_subida , t.nombre AS tipo, CONCAT(e.nombres,' ',e.primer_apellido) AS estudiante,i.correo_director,i.correo_codirector", FALSE);
        $this->db->from('propuestas p');
        $this->db->where('p.codigo', $codigo);
        $this->db->join('investigadores i', 'p.codigo = i.codigo_propuesta');
        $this->db->join('tipos_propuesta t', ' p.tipo = t.codigo');
        $this->db->join('estudiantes e', 'i.correo_estudiante = e.correo');


        $result = $this->db->get();

        return $result->result_array();


    }


    function buscarCarta($codigo)
    {
        $this->db->select("p.ruta_carta");
        $this->db->from('propuestas p');
        $this->db->where('p.codigo', $codigo);

        $result = $this->db->get();

        return $result->result_array();

    }


    function calendario_abierto(){


        /*
         *
         *  Select fecha_inicio_recepcion
            from calendario_trabajos_de_grado
            where CURDATE() >= fecha_inicio_recepcion and CURDATE() <= fecha_limite_recepcion
         *
         *
         *
         *
         */



        $this->db->select('c.fecha_inicio_recepcion AS calendario_abierto,periodo');
        $this->db->from('calendario_trabajos_de_grado c');
        $this->db->where('CURDATE() >=c.fecha_inicio_recepcion');
        $this->db->where('CURDATE() <= c.fecha_limite_recepcion');
        $result =$this->db->get();

        return $result->result_array();

    }


    function fecha_recepcion_abierta(){


        //Select * from calendario_trabajos_de_grado c where NOW() <= c.fecha_inicio_recepcion limit 1




        $this->db->select(' c.fecha_inicio_recepcion AS calendario_abierto');
        $this->db->from('calendario_trabajos_de_grado c');
        $this->db->where('NOW() <= c.fecha_inicio_recepcion');
        $this->db->limit(1);
        $result =$this->db->get();

        return $result->result_array();




    }




    function reloj(){



        $fecha_calendario=$this->fecha_recepcion_abierta();


        if(count($fecha_calendario)>0){





            $datos= array();

            foreach ($fecha_calendario as $calendario){

                $datos = array('calendario_abierto' => $calendario['calendario_abierto']);

            }


            $fecha_calendario=$datos['calendario_abierto'];

            $this->db->select("TIMESTAMPDIFF(SECOND,NOW(),'$fecha_calendario') AS segundos");
            $this->db->from('calendario_trabajos_de_grado c');
            $result=$this->db->get();
            $segundos=$result->result_array();

            return $segundos;
        }else {

            return FALSE;

        }

    }

    function propuestas_por_evaluar($correo_docente){

        $this->db->select("p.codigo, p.titulo, tp.convencion AS tipo,ruta_propuesta");
        $this->db->from('propuestas p');
        $this->db->join('tipos_propuesta tp', 'p.tipo = tp.codigo');

        $this->db->join('propuestas_asignadas i', 'p.codigo = i.codigo_propuesta');

        $this->db->where('i.correo_evaluador1', $correo_docente);
        $this->db->or_where('i.correo_evaluador2', $correo_docente);


        $result = $this->db->get();

        return $result->result_array();


    }

    function propuestas_dirigidas($correo_docente)
    {

        $this->db->select("p.codigo, p.titulo, tp.convencion AS tipo,ruta_propuesta");
        $this->db->from('propuestas p');
        $this->db->join('tipos_propuesta tp', 'p.tipo = tp.codigo');

        $this->db->join('investigadores i', 'p.codigo = i.codigo_propuesta');
        $this->db->join('tipos_propuesta t', ' p.tipo = t.codigo');
        $this->db->join('docentes e', 'i.correo_director = e.correo');
        $this->db->where('i.correo_director', $correo_docente);
        $this->db->group_by('p.codigo');

        $result = $this->db->get();

        return $result->result_array();

    }

    function propuestas_co_dirigidas($correo_docente){

        $this->db->select("p.codigo, p.titulo, tp.convencion AS tipo,ruta_propuesta");
        $this->db->from('propuestas p');
        $this->db->join('tipos_propuesta tp', 'p.tipo = tp.codigo');

        $this->db->join('investigadores i', 'p.codigo = i.codigo_propuesta');
        $this->db->join('tipos_propuesta t', ' p.tipo = t.codigo');
        $this->db->join('docentes e', 'i.correo_director = e.correo');
        $this->db->where('i.correo_codirector', $correo_docente);
        $this->db->group_by('p.codigo');

        $result = $this->db->get();

        return $result->result_array();


    }


    function registrar_informe($codigo_propuesta,$datos_informe,$datos_propuesta)
    {




        $this->db->where("codigo", $codigo_propuesta);
        $this->db->update("propuestas", $datos_propuesta);



        $this->db->insert("informes_finales", $datos_informe);

        return $this->db->affected_rows();



    }

    function registrar_sustentaciones($codigo_propuesta,$aula,$fecha,$hora){


        $datos = array(

            "codigo_propuesta" => $codigo_propuesta,
            "aula" => $aula,
            "fecha" => $fecha,
            "hora" => $hora
        );


        $this->db->insert("sustentaciones", $datos);


    }

}