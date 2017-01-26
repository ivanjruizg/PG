<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Inscripcion_estudiante extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('inscripcion_model');


    }

   function registrar_docente(){


       $this->load->library("encriptar",array(10,false));


       $nombres =mb_strtoupper($this->input->post('nombres'));

       $primer_apellido = mb_strtoupper($this->input->post("primer-apellido"));
       $segundo_apellido= mb_strtoupper($this->input->post("segundo-apellido"));
       $correo = mb_strtoupper($this->input->post("email"));

       $clave = mb_strtoupper($this->input->post("clave"));


       $existe = $this->inscripcion_model->consultar_correo_docente($correo);

       //echo var_dump($existe);

       if($existe==0){


           $codigo_activacion = $this->generar_codigo_activacion();


           $datos=array(

               "nombres" => $nombres,
               "primer_apellido" => $primer_apellido,
               "segundo_apellido" => $segundo_apellido,
               "correo" => $correo,
               "clave" => $clave,
               "codigo_activacion" => $codigo_activacion

           );

           $filas= $this->inscripcion_model->registrar_docente($datos);

           if($filas!=-1){


               if ($this->enviar_correo_activacion_docente($correo,$codigo_activacion)){


                 //  redirect(base_url("registro-exitoso"));

                   echo base_url("registro-exitoso");

               }


           }


       }else{

           echo "correo-duplicado";
       }


   }


    function vista_registro_exitoso(){

        $datos['titulo'] = "DOCUMENTACIÓN";
        $datos['contenido'] = "inscripcion_estudiantes/registro_exitoso";

        $this->load->view('inicio/plantilla', $datos);

    }

   function  activar($codigo_activacion=""){

       $datos=null;

       $filas= $this->inscripcion_model->consultar($codigo_activacion);





       if (count($filas)>0) {

           foreach ($filas as $fila) {

               $datos = array(
                   "tipo" => 2,
                   "correo" => $fila['correo'],
                   "nombres" => $fila['nombres'],
                   "login" => TRUE
               );

               $resp= $this->inscripcion_model->activar($fila['correo']);

               if($resp>0){

                   $this->session->set_userdata($datos);

                   redirect('estudiante');

               }else{

                   redirect(base_url());

               }

           }

       }



   }

    function  activar_docente($codigo_activacion=""){

        $datos=null;

        $filas= $this->inscripcion_model->consultar_correo_docente($codigo_activacion);





        if (count($filas)>0) {

            foreach ($filas as $fila) {

                $datos = array(
                    "tipo" => 3,
                    "correo" => $fila['correo'],
                    "nombres" => $fila['nombres'],
                    "login" => TRUE
                );

                $resp= $this->inscripcion_model->activar($fila['correo']);

                if($resp>0){

                    $this->session->set_userdata($datos);

                    redirect('docente');

                }else{

                    redirect(base_url());

                }

            }

        }



    }


    function generar_codigo_activacion(){

        $this->load->library("generadorclave");
        $clave =$this->generadorclave->generar(50,true,true,true);

        return $clave;

    }


    function enviar_correo_activacion($correo, $codigo_activacion){


        $this->load->library('email','','correo');

        $this->correo->from('pruebasaydii@gmail.com', 'Tu Nombre'); // correo sin espacio
        $this->correo->to($correo); // correo sin espacio
        $this->correo->subject('Esto es una prueba');



        $cuerpo =  '          
                <!DOCTYPE >
                <html>
                
                <head>
                  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                  <title>A Simple Responsive HTML Email</title>
                 
                  <style type="text/css">
                   body {margin: 0; padding: 0; min-width: 100%!important;}
                  img {height: auto;}
                  .content {width: 100%; max-width: 600px;}
                  .header {padding: 40px 30px 20px 30px;}
                  .innerpadding {padding: 30px 30px 30px 30px;}
                  .borderbottom {border-bottom: 1px solid #f2eeed;}
                    .subhead {font-size: 15px; color: #ffffff; font-family: sans-serif; letter-spacing: 10px;}
                  .h1, .h2, .bodycopy {color: #153643; font-family: sans-serif;}
                .h1 {font-size: 33px; line-height: 38px; font-weight: bold;}
                  .h2 {padding: 0 0 15px 0; font-size: 24px; line-height: 28px; font-weight: bold;}
                  .bodycopy {font-size: 16px; line-height: 22px;}
                  .button {text-align: center; font-size: 18px; font-family: sans-serif; font-weight: bold; padding: 0 30px 0 30px;}
                  .button a {color: #ffffff; text-decoration: none;}
                    .footer {padding: 20px 30px 15px 30px;}
                  .footercopy {font-family: sans-serif; font-size: 14px; color: #ffffff;}
                  .footercopy a {color: #ffffff; text-decoration: underline;}

                            @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
                                body[yahoo] .hide {display: none!important;}
                  body[yahoo] .buttonwrapper {background-color: transparent!important;}
                  body[yahoo] .button {padding: 0px!important;}
                  body[yahoo] .button a {background-color: #e05443; padding: 15px 15px 13px!important;}
                  body[yahoo] .unsubscribe {display: block; margin-top: 20px; padding: 10px 50px; background: #2f3942; border-radius: 5px; text-decoration: none!important; font-weight: bold;}
                  }
                
     
                
                  </style>
                </head>
                
                <body yahoo bgcolor="#f6f8f1">
                <table width="100%" bgcolor="#f6f8f1" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td>

                    <table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td bgcolor="#c7d8a7" class="header">
                          <table width="70" align="center" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="70" style="padding: 0 20px 20px 0;">
                                <img class="fix" src="https://cecar.edu.co/images/email/2016/comunicado_v2/logo-cecar.png"  border="0" alt="" />
                              </td>
                            </tr>
                          </table>

                          <table class="col425" align="center" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 425px;">
                            <tr>
                              <td height="70">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>

                                  </tr>
                                  <tr>
                                    <td align="center" class="h2" style="padding: 5px 0 0 0;">
                                        FACULTAD DE CIENCIAS BÁSICAS, INGENIERIA Y ARQUTECTURA.
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>

                        </td>
                      </tr>
                      <tr>
                        <td class="innerpadding borderbottom">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td align="center" class="h2">
                                    REGISTRO EXISTOSO!
                              </td>
                            </tr>
                            <tr>
                              <td class="bodycopy">
                                    Te has registrado exitosamente... Da clic en el siguiente botón para activar tu cuenta:
                              </td>
                            </tr>
                            <tr>

                                <td align="center" style="padding: 20px 0 0 0;">
                                  <table class="buttonwrapper" bgcolor="#e05443" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td class="button" height="45">
                                       <a target="_blank" href="http://localhost/pg/inscripcion_estudiante/activar/'.$codigo_activacion.'">ACTIVA TU CUENTA!</a> 
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td class="footer" bgcolor="#44525f">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td align="center" class="footercopy">
                                &copy; Copyright, CECAR 2016<br/>
                                <a href="#" class="unsubscribe"><font color="#ffffff">Unsubscribe</font></a>
                                <span class="hide">from this newsletter instantly</span>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" style="padding: 20px 0 0 0;">
                                <table border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
                                      <a href="http://www.facebook.com/">
                                        <img src="images/facebook.png" width="37" height="37" alt="Facebook" border="0" />
                                      </a>
                                    </td>
                                    <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
                                      <a href="http://www.twitter.com/">
                                        <img src="images/twitter.png" width="37" height="37" alt="Twitter" border="0" />
                                      </a>
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                
                    </td>
                  </tr>
                </table>
                </body>
                </html>';

        $this->correo->message($cuerpo);



        return $this->correo->send();



    }


    function enviar_correo_activacion_docente($correo, $codigo_activacion){


        $this->load->library('email','','correo');

        $this->correo->from('pruebasaydii@gmail.com', 'Tu Nombre'); // correo sin espacio
        $this->correo->to($correo); // correo sin espacio
        $this->correo->subject('Esto es una prueba');



        $cuerpo =  '          
                <!DOCTYPE >
                <html>
                
                <head>
                  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                  <title>A Simple Responsive HTML Email</title>
                 
                  <style type="text/css">
                   body {margin: 0; padding: 0; min-width: 100%!important;}
                  img {height: auto;}
                  .content {width: 100%; max-width: 600px;}
                  .header {padding: 40px 30px 20px 30px;}
                  .innerpadding {padding: 30px 30px 30px 30px;}
                  .borderbottom {border-bottom: 1px solid #f2eeed;}
                    .subhead {font-size: 15px; color: #ffffff; font-family: sans-serif; letter-spacing: 10px;}
                  .h1, .h2, .bodycopy {color: #153643; font-family: sans-serif;}
                .h1 {font-size: 33px; line-height: 38px; font-weight: bold;}
                  .h2 {padding: 0 0 15px 0; font-size: 24px; line-height: 28px; font-weight: bold;}
                  .bodycopy {font-size: 16px; line-height: 22px;}
                  .button {text-align: center; font-size: 18px; font-family: sans-serif; font-weight: bold; padding: 0 30px 0 30px;}
                  .button a {color: #ffffff; text-decoration: none;}
                    .footer {padding: 20px 30px 15px 30px;}
                  .footercopy {font-family: sans-serif; font-size: 14px; color: #ffffff;}
                  .footercopy a {color: #ffffff; text-decoration: underline;}

                            @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
                                body[yahoo] .hide {display: none!important;}
                  body[yahoo] .buttonwrapper {background-color: transparent!important;}
                  body[yahoo] .button {padding: 0px!important;}
                  body[yahoo] .button a {background-color: #e05443; padding: 15px 15px 13px!important;}
                  body[yahoo] .unsubscribe {display: block; margin-top: 20px; padding: 10px 50px; background: #2f3942; border-radius: 5px; text-decoration: none!important; font-weight: bold;}
                  }
                
     
                
                  </style>
                </head>
                
                <body yahoo bgcolor="#f6f8f1">
                <table width="100%" bgcolor="#f6f8f1" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td>

                    <table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0">
                      <tr>
                        <td bgcolor="#c7d8a7" class="header">
                          <table width="70" align="center" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td height="70" style="padding: 0 20px 20px 0;">
                                <img class="fix" src="https://cecar.edu.co/images/email/2016/comunicado_v2/logo-cecar.png"  border="0" alt="" />
                              </td>
                            </tr>
                          </table>

                          <table class="col425" align="center" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 425px;">
                            <tr>
                              <td height="70">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>

                                  </tr>
                                  <tr>
                                    <td align="center" class="h2" style="padding: 5px 0 0 0;">
                                        FACULTAD DE CIENCIAS BÁSICAS, INGENIERIA Y ARQUTECTURA.
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>

                        </td>
                      </tr>
                      <tr>
                        <td class="innerpadding borderbottom">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td align="center" class="h2">
                                    REGISTRO EXISTOSO!
                              </td>
                            </tr>
                            <tr>
                              <td class="bodycopy">
                                    Te has registrado exitosamente... Da clic en el siguiente botón para activar tu cuenta:
                              </td>
                            </tr>
                            <tr>

                                <td align="center" style="padding: 20px 0 0 0;">
                                  <table class="buttonwrapper" bgcolor="#e05443" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td class="button" height="45">
                                       <a target="_blank" href="http://localhost/pg/inscripcion_estudiante/activar_docente/'.$codigo_activacion.'">ACTIVA TU CUENTA!</a> 
                                      </td>
                                    </tr>
                                  </table>
                                </td>
                
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td class="footer" bgcolor="#44525f">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td align="center" class="footercopy">
                                &copy; Copyright, CECAR 2016<br/>
                                <a href="#" class="unsubscribe"><font color="#ffffff">Unsubscribe</font></a>
                                <span class="hide">from this newsletter instantly</span>
                              </td>
                            </tr>
                            <tr>
                              <td align="center" style="padding: 20px 0 0 0;">
                                <table border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
                                      <a href="http://www.facebook.com/">
                                        <img src="images/facebook.png" width="37" height="37" alt="Facebook" border="0" />
                                      </a>
                                    </td>
                                    <td width="37" style="text-align: center; padding: 0 10px 0 10px;">
                                      <a href="http://www.twitter.com/">
                                        <img src="images/twitter.png" width="37" height="37" alt="Twitter" border="0" />
                                      </a>
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                
                    </td>
                  </tr>
                </table>
                </body>
                </html>';

        $this->correo->message($cuerpo);



        return $this->correo->send();



    }








}