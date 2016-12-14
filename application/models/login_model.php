<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    /**
     * @param $email
     * @param $password
     * @return array|bool|null
     */
    function login($email, $password) {

        $datos=null;

        $this->db->select("correo,nombres,CONCAT(primer_apellido,' ',segundo_apellido) AS apellidos, activo",FAlSE);
        $this->db->where("correo", $email);
        $this->db->where("clave", $password);
        $result = $this->db->get("estudiantes");

        $filas=$result->result();


        if (count($filas)>0) {

            foreach ($filas as $fila) {

                if ($fila->activo==1){

                    $datos =  array(
                        "correo" => $fila->correo,
                        "apellidos" => $fila->apellidos,
                        "nombres" => $fila->nombres,
                        "tipo" => ESTUDIANTES,
                        "login" => TRUE


                    );


                    return $datos;

                }else{

                    return 0;

                }

            }

        }elseif (count($filas)<=0){

            $this->db->select("nombres,CONCAT(primer_apellido,' ',segundo_apellido) AS apellidos,correo",FALSE);
            $this->db->where("correo", $email);
            $this->db->where("clave", $password);
            $this->db->from("coordinadores_investigacion");

            $result = $this->db->get();

            $filas=$result->result();

            if (count($filas)>0) {


                foreach ($filas as $fila) {

                    $datos = array(
                        "correo" => $fila->correo,
                        "tipo" => COORDINADORES,
                        "apellidos" => $fila->apellidos,
                        "nombres" => $fila->nombres,
                        "login" => TRUE
                    );

                }

                return $datos;


            }else {

                $this->db->select("nombres,CONCAT(primer_apellido,' ',segundo_apellido) AS apellidos,correo",FALSE);
                $this->db->where("correo", $email);
                $this->db->where("clave", $password);
                $this->db->from("docentes");

                $result = $this->db->get();

                $filas=$result->result();

                if (count($filas)>0) {


                    foreach ($filas as $fila) {

                        $datos = array(
                            "correo" => $fila->correo,
                            "tipo" => DOCENTES,
                            "apellidos" => $fila->apellidos,
                            "nombres" => $fila->nombres,
                            "login" => TRUE
                        );

                    }

                    return $datos;
                }
            }

            return -1;


        }
    }
}