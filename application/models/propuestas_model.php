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
        $this->db->limit('1');
        $result = $this->db->get();

        return $result->result_array()[0]['periodo'];

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


    function listar_propuesta_por_evaluar($codigo)
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

    function horarios_de_sustentaciones2($fecha){


        $sql ="SELECT s.* FROM sustentaciones s, propuestas p
                WHERE p.codigo = s.codigo_propuesta AND fecha='$fecha'
                UNION
                SELECT * FROM sustentaciones WHERE fecha='$fecha' 
                ORDER BY fecha,hora
                      ";

        $result= $this->db->query($sql);



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