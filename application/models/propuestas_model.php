<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Propuestas_model extends CI_Model
{


    function calendario_recepcion_abierto()
    {


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
        $result = $this->db->get();

        return $result->result_array()[0]['periodo'];

    }



    function listar_propuestas_periodo($periodo_recepcion=null)
    {

        $this->db->select("p.codigo, p.titulo, p.ruta_carta, tp.convencion AS tipo,   DATE_FORMAT( p.fecha_hora_subida,'%d %b %y') AS fecha");
        $this->db->from('propuestas p');
        $this->db->join('tipos_propuesta tp', 'p.tipo = tp.codigo');


        if($periodo_recepcion!=null){

            $this->db->where("periodo_recepcion",$periodo_recepcion);
        }



        $result = $this->db->get();

        return $result->result_array();

    }




    function consultar_propuestas_a_sustentar(){

        $result =  $this->db->query("SELECT s.codigo_propuesta FROM sustentaciones s
                                        WHERE s.codigo_propuesta  IS NOT NULL");



         $codigos = array("-1");

        foreach ($result->result_array() as $a){

            array_push($codigos,$a['codigo_propuesta']);

        }


        return $codigos;



    }

    function listar_propuestas_sin_asignar_fecha_de_sustentacion()
    {

        /*
        $this->db->select("p.codigo, p.titulo, tp.convencion AS tipo,   DATE_FORMAT( p.fecha_hora_subida,'%d %b %y') AS fecha");
        $this->db->from('propuestas p');
        $this->db->join('tipos_propuesta tp', 'p.tipo = tp.codigo');
        $result = $this->db->get();

        */

        $result = $this->db->query("SELECT p.codigo, p.titulo, tp.convencion AS tipo FROM propuestas p, tipos_propuesta tp
 
WHERE NOT (p.codigo IN(SELECT s.codigo_propuesta FROM sustentaciones s)) 
AND tp.codigo = p.tipo
");

        return $result->result_array();

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













    function registrar_informe($codigo_propuesta, $datos_informe, $datos_propuesta)
    {


        $this->db->where("codigo", $codigo_propuesta);
        $this->db->update("propuestas", $datos_propuesta);


        $this->db->insert("informes_finales", $datos_informe);

        return $this->db->affected_rows();


    }

    function registrar_sustentaciones($codigo_propuesta, $codigo_sustentacion)
    {


        $datos = array(

            "codigo_propuesta" => $codigo_propuesta,

        );


        $this->db->where("codigo",$codigo_sustentacion);
        $this->db->update("sustentaciones", $datos);


    }


    function crear_horario_sustentaciones($periodo,$aula, $fecha,$hora)
    {


        $datos = array(

            "periodo_recepcion" => $periodo,
            "aula" => $aula,
            "fecha" => $fecha,
            "hora" => $hora

        );


        $this->db->insert("sustentaciones", $datos);


    }

    function horarios_de_sustentaciones(){


        $this->db->select("s.hora, p.titulo");
        $this->db->from('sustentaciones s');
        $this->db->join('propuestas p','s.codigo_propuesta = p.codigo');
        $result = $this->db->get();

        return $result->result_array();



    }

    function horarios_de_sustentaciones2(){


        $result= $this->db->query("SELECT s.* FROM sustentaciones s, propuestas p
                            WHERE p.codigo = s.codigo_propuesta 
                           
                            UNION
                            
                            SELECT * FROM sustentaciones
                            ORDER BY fecha,hora
                            ");



        return $result->result_array();

    }


    function consultar_titulo($codigo)
    {

        if(isset($codigo)) {
            $this->db->select("p.titulo");
            $this->db->from('propuestas p');
            $this->db->where("p.codigo", $codigo);

            $result = $this->db->get();

            return $result->result_array()[0]['titulo'];
        }
        return "";

    }


    function ver_calendario_de_trabajos_de_grado()
    {

        $this->db->select("periodo, fecha_inicio_recepcion,fecha_limite_recepcion, fecha_sustentacion");
        $this->db->from('calendario_trabajos_de_grado');
        $this->db->where("LEFT(periodo,4)", date('Y'));
        $result = $this->db->get();

        return $result->result_array();

    }



    function listar_tipos_propuestas(){


        $this->db->select('codigo,nombre');
        $this->db->from('tipos_propuesta');
        $reslt = $this->db->get();

        return $reslt->result_array();

    }


}