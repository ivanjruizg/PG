<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Ivan Ruiz G
 * Date: 23/11/2016
 * Time: 11:35 AM
 */
class File extends CI_Model
{

    public function Upload_Imagen($ruta_imagen= '', $mensaje = '')
    {

        $config2['upload_path'] = $ruta_imagen;
        $config2['allowed_types'] = 'jpg|png|jpeg';



        $this->upload->initialize($config2);



        if ( ! $this->upload->do_upload('carta')){
            $error = $this->upload->display_errors();
            echo $this->html($error);
            if($mensaje == ''){ //cierre de php ?>
                <script type="text/javascript" charset="utf-8">
                    alert("Error al subir la carta de remision");
                </script> <?php
            }else{ 		  ?>
                <script type="text/javascript" charset="utf-8">
                    alert("<?= $mensaje ?>");
                </script> <?php
            }
            return null;
        }
        else{
            $file_data = $this->upload->data();


            return $file_data['file_name'];
        }
    }


    public function Upload_Propuesta($ruta_propuesta= '', $mensaje = '')
    {


        $config['upload_path'] = $ruta_propuesta;
        $config['allowed_types'] = 'doc|docx|pdf';

        $this->load->library('upload', $config);



        if ( ! $this->upload->do_upload('propuesta')){
            $error = $this->upload->display_errors();
            echo $this->html($error);
            if($mensaje == ''){ //cierre de php ?>
                <script type="text/javascript" charset="utf-8">
                    alert("Error al subir la propuesta");
                </script> <?php
            }else{ 		  ?>
                <script type="text/javascript" charset="utf-8">
                    alert("<?= $mensaje ?>");
                </script> <?php
            }
            return null;
        }
        else{
            $file_data = $this->upload->data();
            return $file_data['file_name'];
        }
    }









    public function html($value='')
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