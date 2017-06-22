<?php

/**
 * Created by PhpStorm.
 * User: Ivan Ruiz G
 * Date: 24/11/2016
 * Time: 2:04 PM
 */
class EnviarCorreos
{


    private  $CI;
    private $head;
    private $head2;
    private $head3;
    private $footer;


    private $config = ['protocol' => 'smtp',
                       'smtp_host' => 'ssl://smtp.googlemail.com',
                       'smtp_port' => 465,
                       'smtp_user' => 'pruebasaydii@gmail.com',
                       'smtp_pass' => 'fcbia1234',
                       'smtp_timeout' => '7',
                       'charset' => 'utf-8',
                       'newline' => "\r\n",
                       'mailtype' => 'html',
                       'validation' => false
    ];

    function __construct()
    {



        $this->head='
 <meta charset="utf-8" />

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
       <tbody><tr>
			<td align="center" bgcolor="#eee" style="border-bottom:40px solid rgb(238,238,238)">
				<img style="min-height:12px" width="100%" src="https://cecar.edu.co//images/email/2016/comunicado_v2/franja_up.jpg" alt="franja" class="CToWUd">
			</td>
		</tr>
		<tr>
			<td align="center" bgcolor="#fff" style="padding-top:15px;padding-bottom:15px;background-position:50% 50%">
				<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
				

					
					<tbody><tr>
						<td style="line-height:0px">
							<img style="max-width:250px;display:block;line-height:0px;font-size:0px;border:0px;text-align:center;margin:0px auto" src="https://cecar.edu.co/images/email/2016/comunicado_v2/logo-cecar.png" alt="logo" class="CToWUd">
						</td>
					</tr>


					

					
				</tbody></table>
			</td>
		</tr>
	</tbody></table>

	

	
	<table bgcolor="#eeeeee" align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">
		<tbody><tr>
			<td align="center">
				<table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
					<tbody><tr>
						<td height="50"></td>
					</tr>
					
                    
					
					<tr>
						<td align="center" style="font-family:&quot;open sans&quot;,arial,sans-serif;font-size:22px;color:rgb(59,59,59);line-height:28px;letter-spacing:2px;font-weight:bold;text-transform:uppercase">';


        $this->head2 = '
						
						
						
						
						</td>
					</tr>
					

					<tr>
						<td align="center">
							<table align="center" width="30" border="0" cellpadding="0" cellspacing="0">
								<tbody><tr>
									<td style="border-bottom:2px solid rgb(0,109,49)" height="10"></td>
								</tr>
							</tbody></table>
						</td>
					</tr>
                    
                    <tr>
						<td align="center" style="font-family:&quot;open sans&quot;,arial,sans-serif;font-size:20px;font-style:italic;color:rgb(0,109,49)">
						
						';



        $this->head3 =' 						
						</td>
					</tr>
					
					<tr>
						<td height="5"></td>
					</tr>
                    
				</tbody></table>
			</td>
		</tr>
	</tbody></table>
	

	
	<table bgcolor="#eeeeee" align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">
		
		<tbody><tr>
			<td align="center">
				<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
					<tbody><tr>
						<td height="20"></td>
					</tr>
					<tr>
						<td align="center">
							<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
								<tbody><tr align="center">
									<td>
										<table width="550" border="0" align="center" cellpadding="0" cellspacing="0">
											
											
											<tbody><tr>
												<td height="5"></td>
											</tr>

											
											
											<tr>';




        $this->footer='<p style="font-size:12px;color:rgb(0,109,49);font-weight:bold;padding-bottom:20px;padding-top:20px"><i>Cordialmente,</i></p>
                                                    <p style="font-size:12px;color:rgb(0,109,49);font-weight:bold;line-height:0px"><i>Angélica María Torregroza Espinoza</i></p>
                                                    <p>Coordinadora de investigación de la FCBIA</p>
												</td>
											</tr>
											
											
										</tbody></table>
									</td>
								</tr>
							</tbody></table>
						</td>
					</tr>
				</tbody></table>
			</td>
		</tr>
		

	</tbody></table>


	
	<table bgcolor="eeeeee" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
		<tbody><tr>
			<td height="50"></td>
		</tr>
		<tr>
			<td align="center" bgcolor="#066938">
				<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tbody><tr>
						<td height="15"></td>
					</tr>
					<tr>
						<td>
						
							

							
							<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
								<tbody>
								<tr>
									<td>
										<table border="0" align="center" cellpadding="0" cellspacing="0">
											<tbody><tr>
												<td align="center" style="line-height:0px">
													<a href="https://www.facebook.com/unicecar" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=es&amp;q=https://www.facebook.com/unicecar&amp;source=gmail&amp;ust=1487350718207000&amp;usg=AFQjCNFjz7PCX17tG9okSRCzukHtGJGoVg">
														<img style="display:block;line-height:0px;font-size:0px;border:0px" src="https://www.cecar.edu.co/images/email/2016/comunicado_v2/facebook.png" width="21" height="22" alt="" class="CToWUd">
													</a>
												</td>
												<td width="15"></td>
												<td align="center" style="line-height:0px">
													<a href="https://twitter.com/unicecar" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=es&amp;q=https://twitter.com/unicecar&amp;source=gmail&amp;ust=1487350718207000&amp;usg=AFQjCNGbv0bkkzuVTSv7cbHlDzfxvoznSQ">
														<img style="display:block;line-height:0px;font-size:0px;border:0px" src="https://www.cecar.edu.co/images/email/2016/comunicado_v2/twitter.png" width="22" height="22" alt="" class="CToWUd">
													</a>
												</td>
												<td width="15"></td>
												<td align="center" style="line-height:0px">
													<a href="http://tudebesleer.blogspot.com.co/" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=es&amp;q=http://tudebesleer.blogspot.com.co/&amp;source=gmail&amp;ust=1487350718207000&amp;usg=AFQjCNGcn6jlkjCVh_uWsbHZ8LeNuuSfKw">
														<img style="display:block;line-height:0px;font-size:0px;border:0px" src="https://www.cecar.edu.co/images/email/2016/comunicado_v2/blogger.png" width="22" height="22" alt="" class="CToWUd">
													</a>
												</td>
                                                <td width="15"></td>
												<td align="center" style="line-height:0px">
													<a href="http://www.instagram.com/unicecar" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=es&amp;q=http://www.instagram.com/unicecar&amp;source=gmail&amp;ust=1487350718207000&amp;usg=AFQjCNGJB4rcQbZJVJUSxGNp_52ebbU2kA">
														<img style="display:block;line-height:0px;font-size:0px;border:0px" src="https://www.cecar.edu.co/images/email/2016/comunicado_v2/instagram.png" width="22" height="22" alt="" class="CToWUd">
													</a>
												</td>
                                                <td width="15"></td>
												<td align="center" style="line-height:0px">
													<a href="https://www.youtube.com/user/corporacionuniversit" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=es&amp;q=https://www.youtube.com/user/corporacionuniversit&amp;source=gmail&amp;ust=1487350718207000&amp;usg=AFQjCNG6xgvNX8F_lO84RjVis_bcmDsq7A">
														<img style="display:block;line-height:0px;font-size:0px;border:0px" src="https://www.cecar.edu.co/images/email/2016/comunicado_v2/youtube.png" width="22" height="22" alt="" class="CToWUd">
													</a>
												</td>
												
											</tr>
										</tbody></table>
									</td>
								</tr>
							</tbody></table>
							

						</td>
					</tr>
					<tr>
						<td height="15"></td>
					</tr>
				</tbody></table>
			</td>
		</tr>
		<tr>
			<td bgcolor="#66a330" align="center">
				<span><font color="#888888">
					</font></span><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tbody><tr>
						<td height="5"></td>
					</tr>
					<tr>
						<td>
							

							<span><font color="#888888">
								</font></span><span><font color="#888888">
							</font></span><table style="max-width:600px" border="0" align="center" cellpadding="0" cellspacing="0">
								<tbody><tr>
                                  
                                    <td valign="middle" style="text-align:center;font-family:&quot;open sans&quot;,arial,sans-serif;font-size:13px;color:rgb(255,255,255);line-height:32px"><span><img style="display:inline" src="https://www.cecar.edu.co/images/email/2016/comunicado_v2/location.png" width="16" height="16" alt="" class="CToWUd"> CECAR - Oficina Comunicaciones, Bloque B1, Segundo Piso&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span><img style="display:inline" src="https://www.cecar.edu.co/images/email/2016/comunicado_v2/phone.png" width="16" height="16" alt="" class="CToWUd"> (57) (5) 279 89 00 - Ext. 1103</span>
</td></tr></tbody></table><span><font color="#888888"><span><font color="#888888">

							
							

							

						</font></span></font></span></td></tr>
					<tr>
						<td height="5"></td>
					</tr>
				</tbody></table></td>
            
            </tr>
        <tr>
			<td bgcolor="#fff" align="center">
				<span><font color="#888888">
					</font></span><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
					<tbody><tr>
						<td height="5"></td>
					</tr>
					<tr>
						<td>
							

							<span><font color="#888888">
								</font></span><span><font color="#888888">
							</font></span><table style="max-width:600px" border="0" align="center" cellpadding="0" cellspacing="0">
								<tbody><tr>
									<td valign="middle" style="text-align:center;font-family:&quot;open sans&quot;,arial,sans-serif;font-size:13px;color:rgb(102,102,102);line-height:28px">Copyright © 2016 CECAR
</td></tr></tbody></table><span><font color="#888888"><span><font color="#888888">

							
							

						
						</font></span></font></span></td></tr>
					<tr>
						<td height="5"></td>
					</tr>
				</tbody></table></td>
            
            </tr></tbody></table>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        
		<tbody><tr>
			<td align="center" bgcolor="#fff">
				<img style="min-height:12px" width="100%" src="https://cecar.edu.co//images/email/2016/comunicado_v2/franja_down.png" alt="franja" class="CToWUd">
			</td>
		</tr>
	</tbody></table>';



       $this->CI =& get_instance();
        $this->CI->load->library('email');


        /*
$configEmail = array(
    'mailtype' => 'html',
    'charset' => 'utf-8',
    'newline' => "\r\n"
);


*/



        //cargamos la configuración para enviar con yahoo
        $this->CI->email->initialize($this->config);


        $this->CI->email->from('pruebasaydii@gmail.com', 'Coord. de inv. FCBIA'); // correo sin espacio
    }


    function activacion_de_cuenta($comunicado,$correo,$estudiante ,$codigo_activacion){


        $this->CI->email->initialize($this->config);
        $this->CI->email->from('pruebasaydii@gmail.com', 'Coord. de inv. FCBIA'); // correo sin espacio





        $this->CI->email->to($correo); // correo sin espacio
        $this->CI->email->subject('Inscripción de estudiante');

        $contenido = '
												<td style="font-family:&quot;open sans&quot;,arial,sans-serif;font-size:13px;color:rgb(127,140,141);line-height:24px">
													<p align="justify">
													
														Te has registrado exitosamente... Haz clic en el siguiente botón para <a href="'.base_url('inscripcion_estudiante/activar/'.$codigo_activacion.'').'">aquí</a> activar tu cuenta													
														
														</p>
														
														<p align="justify"></p>
														
														
														
                                                    ';

        $html =  $this->head.$comunicado.$this->head2.$estudiante.$this->head3.$contenido.$this->footer;

        $this->CI->email->message($html);



        return $this->CI->email->send();

    }



    function asignacion_de_director($comunicado,$correo,$estudiante,$titulo_propuesta)
    {


        $this->CI->email->initialize($this->config);
        $this->CI->email->from('pruebasaydii@gmail.com', 'Coord. de inv. FCBIA'); // correo sin espacio

        $this->CI->email->to($correo); // correo sin espacio
        $this->CI->email->subject('Asignación de director(a)');

        $contenido = '
						<td style="font-family:&quot;open sans&quot;,arial,sans-serif;font-size:13px;color:rgb(127,140,141);line-height:24px">
						    <p align="justify">
													
							   											
							    Cordial saludo,


La presente tiene como objetivo además de saludarle, informarle que luego de la reunión del Comité de Investigación de la Facultad de Ciencias Básica, Ingeniería y Arquitectura celebrada el día Viernes 28 de agosto de 2015, se acordó solicitarle muy respetuosamente apelando a su amplia experiencia y alto sentido de pertinencia con el programa, oficie como director de la propuesta de  investigación titulada <b>“'.$titulo_propuesta.'”</b>   presentada por los estudiantes: KENETH AMELL AMELL Y LUIS MORENO MORENO.
											
							    											
														
						    </p>
														
						<p align="justify"></p>
														
														
														
                                                    ';

        $html =  $this->head.$comunicado.$this->head2.$estudiante.$this->head3.$contenido.$this->footer;

        $this->CI->email->message($html);

        return $this->CI->email->send();

    }



    function asignacion_de_codirector($comunicado,$correo,$estudiante,$titulo_propuesta)
    {


        $this->CI->email->initialize($this->config);
        $this->CI->email->from('pruebasaydii@gmail.com', 'Coord. de inv. FCBIA'); // correo sin espacio

        $this->CI->email->to($correo); // correo sin espacio
        $this->CI->email->subject('Asignación de codirector(a)');

        $contenido = '
						<td style="font-family:&quot;open sans&quot;,arial,sans-serif;font-size:13px;color:rgb(127,140,141);line-height:24px">
						    <p align="justify">
													
							   											
							    Cordial saludo,


La presente tiene como objetivo además de saludarle, informarle que luego de la reunión del Comité de Investigación de la Facultad de Ciencias Básica, Ingeniería y Arquitectura celebrada el día Viernes 28 de agosto de 2015, se acordó solicitarle muy respetuosamente apelando a su amplia experiencia y alto sentido de pertinencia con el programa, oficie como codirector de la propuesta de  investigación titulada <b>“'.$titulo_propuesta.'”</b> 
											
							    											
														
						    </p>
														
						<p align="justify"></p>
														
														
														
                                                    ';

        $html =  $this->head.$comunicado.$this->head2.$estudiante.$this->head3.$contenido.$this->footer;

        $this->CI->email->message($html);

        return $this->CI->email->send();

    }


    function asignacion_de_evaluador($comunicado,$correo,$estudiante,$titulo_propuesta)
    {


        $this->CI->email->initialize($this->config);
        $this->CI->email->from('pruebasaydii@gmail.com', 'Coord. de inv. FCBIA'); // correo sin espacio

        $this->CI->email->to($correo); // correo sin espacio
        $this->CI->email->subject('Asignación de codirector(a)');

        $contenido = '
						<td style="font-family:&quot;open sans&quot;,arial,sans-serif;font-size:13px;color:rgb(127,140,141);line-height:24px">
						    <p align="justify">
													
							   											
							    Cordial saludo,


La presente tiene como objetivo además de saludarle, informarle que oficie como evaluador de la propuesta de  investigación titulada <b>“'.$titulo_propuesta.'”</b> 
											
							    											
														
						    </p>
														
						<p align="justify"></p>
														
														
														
                                                    ';

        $html =  $this->head.$comunicado.$this->head2.$estudiante.$this->head3.$contenido.$this->footer;

        $this->CI->email->message($html);

        return $this->CI->email->send();

    }

    function asignacion_de_evaluador_estudiante($comunicado,$correo,$estudiante,$titulo_propuesta)
    {


        $this->CI->email->initialize($this->config);
        $this->CI->email->from('pruebasaydii@gmail.com', 'Coord. de inv. FCBIA'); // correo sin espacio

        $this->CI->email->to($correo); // correo sin espacio
        $this->CI->email->subject('Asignación de codirector(a)');

        $contenido = '
						<td style="font-family:&quot;open sans&quot;,arial,sans-serif;font-size:13px;color:rgb(127,140,141);line-height:24px">
						    <p align="justify">
													
							   											
							    Cordial saludo,


La presente tiene como objetivo además de saludarle, informarle que fuerón asiganados los evaluadores para tu propuesta de trabajo de grado titulada   <b>“'.$titulo_propuesta.'”</b> 
											
							    											
														
						    </p>
														
						<p align="justify"></p>
														
														
														
                                                    ';

        $html =  $this->head.$comunicado.$this->head2.$estudiante.$this->head3.$contenido.$this->footer;

        $this->CI->email->message($html);

        return $this->CI->email->send();

    }


    function publicacion_nota($comunicado,$correo,$estudiante,$titulo_propuesta)
    {


        $this->CI->email->initialize($this->config);
        $this->CI->email->from('pruebasaydii@gmail.com', 'Coord. de inv. FCBIA'); // correo sin espacio

        $this->CI->email->to($correo); // correo sin espacio
        $this->CI->email->subject('Publicacion de nota');

        $contenido = '
						<td style="font-family:&quot;open sans&quot;,arial,sans-serif;font-size:13px;color:rgb(127,140,141);line-height:24px">
						    <p align="justify">
													
							   											
							    Cordial saludo,


La presente tiene como objetivo además de saludarle, informarle  que ya fue publicada la nota de su propuesta de trabajo de grado titulada   <b>“'.$titulo_propuesta.'”</b>  
											
							    											
														
						    </p>
														
						<p align="justify"></p>
														
														
														
                                                    ';

        $html =  $this->head.$comunicado.$this->head2.$estudiante.$this->head3.$contenido.$this->footer;

        $this->CI->email->message($html);

        return $this->CI->email->send();

    }


    function asignacion_de_sustentacion_estudiante($comunicado,$correo,$estudiante,$titulo_propuesta,$fecha,$hora, $aula)
    {


        $this->CI->email->initialize($this->config);
        $this->CI->email->from('pruebasaydii@gmail.com', 'Coord. de inv. FCBIA'); // correo sin espacio

        $this->CI->email->to($correo); // correo sin espacio
        $this->CI->email->subject('Asignación de horario de sustentación');

        $contenido = '
						<td style="font-family:&quot;open sans&quot;,arial,sans-serif;font-size:13px;color:rgb(127,140,141);line-height:24px">
						    <p align="justify">
													
							   											
							    Cordial saludo,


La presente tiene como objetivo además de saludarle, informarle que la fecha de sustentación para su propuesta de trabajo de grado titulada   <b>“'.$titulo_propuesta.'”</b>  fue asiganada para el día '.$fecha.' a las '.$hora.'  en el aula '.$aula.'
											
							    											
														
						    </p>
														
						<p align="justify"></p>
														
														
														
                                                    ';

        $html =  $this->head.$comunicado.$this->head2.$estudiante.$this->head3.$contenido.$this->footer;

        $this->CI->email->message($html);

        return $this->CI->email->send();

    }


    function ver_plantilla($comunicado,$correo,$estudiante,$titulo_propuesta,$fecha,$hora, $aula)
    {


        $this->CI->email->initialize($this->config);
        $this->CI->email->from('pruebasaydii@gmail.com', 'Coord. de inv. FCBIA'); // correo sin espacio

        $this->CI->email->to($correo); // correo sin espacio
        $this->CI->email->subject('Asignación de horario de sustentación');

        $contenido = '
						<td style="font-family:&quot;open sans&quot;,arial,sans-serif;font-size:13px;color:rgb(127,140,141);line-height:24px">
						    <p align="justify">
													
							   											
							    Cordial saludo,


La presente tiene como objetivo además de saludarle, informarle que la fecha de sustentación para su propuesta de trabajo de grado titulada   <b>“'.$titulo_propuesta.'”</b>  fue asiganada para el día '.$fecha.' a las '.$hora.'  en el aula '.$aula.'
											
							    											
														
						    </p>
														
						<p align="justify"></p>
														
														
														
                                                    ';

        $html =  $this->head.$comunicado.$this->head2.$estudiante.$this->head3.$contenido.$this->footer;

        $this->CI->email->message($html);

        return $html;

    }

    function enviar_propuesta_revisada($comunicado,$correo,$estudiante, $estado,$observaciones)
    {



        if($estado==1){


            $estado = "AVALADA";
        }else{


            $estado = "RECHAZADA";

        }


        $this->CI->email->initialize($this->config);
        $this->CI->email->from('pruebasaydii@gmail.com', 'Coord. de inv. FCBIA'); // correo sin espacio


        $this->CI->email->to($correo); // correo sin espacio
        $this->CI->email->subject('Propuesta revisada');

        $contenido = '
						<td style="font-family:&quot;open sans&quot;,arial,sans-serif;font-size:13px;color:rgb(127,140,141);line-height:24px">
						    <p align="justify">
											
															
								La presente tiene como objetivo además de saludarle, informarle que luego de revisar la información de su propuesta se enceuntra '.$estado.' por la ser presentada como propuesta de trabajo de grado  '.$observaciones.'													
														
						    </p>
														
						<p align="justify"></p>
														
														
														
                                                    ';

        $html =  $this->head.$comunicado.$this->head2.$estudiante.$this->head3.$contenido.$this->footer;

        $this->CI->email->message($html);

        return $this->CI->email->send();

    }


    function asiganacion_estudiantes($comunicado,$correo,$estudiante,$titulo_propuesta)
    {




        //cargamos la configuración para enviar con yahoo
        $this->CI->email->initialize($this->config);
        $this->CI->email->from('pruebasaydii@gmail.com', 'Coord. de inv. FCBIA'); // correo sin espacio

        $this->CI->email->to($correo); // correo sin espacio
        $this->CI->email->subject('Propuesta asignada');

        $contenido = '
						<td style="font-family:&quot;open sans&quot;,arial,sans-serif;font-size:13px;color:rgb(127,140,141);line-height:24px">
						    <p align="justify">
											
															
								La presente tiene como objetivo además de saludarle, informarle que usted fue asiganado como integrante en la propuesta de grado títulada <b> '.$titulo_propuesta.' </b> 												
														
						    </p>
														
						<p align="justify"></p>
														
														
														
                                                    ';

        $html =  $this->head.$comunicado.$this->head2.$estudiante.$this->head3.$contenido.$this->footer;

        $this->CI->email->message($html);

        return $this->CI->email->send();

    }



}