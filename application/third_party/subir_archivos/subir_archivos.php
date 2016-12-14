<?php

/**
 * Created by PhpStorm.
 * User: Ivan Ruiz G
 * Date: 30/11/2016
 * Time: 4:41 PM
 */
class Subir_archivos
{


    function __construct()
    {


    }

    public function Subir_Carta($ruta_imagen = '', $mensaje = '')
    {

        $config2['upload_path'] = $ruta_imagen;
        $config2['allowed_types'] = 'jpg|png|jpeg';

        $CI =& get_instance();


        $CI->upload->initialize($config2);


        if (!$CI->upload->do_upload('carta')) {
            $error = $CI->upload->display_errors();
            echo $this->html($error);
            if ($mensaje == '') { //cierre de php
                ?>
                <script type="text/javascript" charset="utf-8">
                    alert("Error al subir la carta de remision");
                </script> <?php
            } else { ?>
                <script type="text/javascript" charset="utf-8">
                    alert("<?= $mensaje ?>");
                </script> <?php
            }
            return null;
        } else {
            $file_data = $CI->upload->data();


            return $file_data['file_name'];
        }
    }


    public function Subir_Propuesta($ruta_propuesta = '', $mensaje = '')
    {


        $config['upload_path'] = $ruta_propuesta;
        $config['allowed_types'] = 'doc|docx|pdf';

        $CI =& get_instance();


        $CI->load->library('upload', $config);


        if (!$CI->upload->do_upload('propuesta')) {
            $error = $CI->upload->display_errors();
            echo $this->html($error);
            if ($mensaje == '') { //cierre de php
                ?>
                <script type="text/javascript" charset="utf-8">
                    alert("Error al subir la propuesta");
                </script> <?php
            } else { ?>
                <script type="text/javascript" charset="utf-8">
                    alert("<?= $mensaje ?>");
                </script> <?php
            }
            return null;
        } else {
            $file_data = $CI->upload->data();
            return $file_data['file_name'];
        }
    }


    public function html($value = '')
    {
        return "
		<html>
		<head>
			<title> Upload Error </title>
		</head>
		<body>
		
		</body>
		</html>";
    }


}