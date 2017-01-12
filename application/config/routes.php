<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'inicio';
$route['404_override'] = 'error404';
$route['translate_uri_dashes'] = FALSE;


$route['documentacion'] = 'inicio/vista_documentacion';
$route['iniciar-sesion'] = 'inicio/vista_iniciar_sesion';
$route['registrar-estudiante'] = 'inicio/vista_registro_estudiante';
$route['registro-exitoso'] = 'inscripcion_estudiante/vista_registro_exitoso';

$route['coordinador/nuevo-periodo-recepcion'] = 'coordinador/vista_crear_periodo_recepcion';
$route['coordinador/asignar-directores'] = 'coordinador/vista_asignar_directores';
$route['coordinador/asignar-evaluadores'] = 'coordinador/vista_asignar_evaluadores';
$route['coordinador/calendario-recepcion-propuestas'] = 'coordinador/vista_calendario_recepcion_propuestas';
$route['coordinador/asignar-sustentaciones'] = 'coordinador/vista_asignar_sustentaciones';
$route['coordinador/crear-fechas-sustentaciones'] = 'coordinador/vista_crear_fechas_sustentaciones';
$route['coordinador/cambiar-clave-de-acceso'] = 'coordinador/vista_cambiar_clave_de_acceso';


$route['docente/subir-informe-final'] = 'docente/vista_subir_informe_final';
$route['docente/propuestas-dirigidas'] = 'docente/vista_propuestas_dirigidas';
$route['docente/propuestas-codirigidas'] = 'docente/vista_propuestas_co_dirigidas';
$route['docente/propuestas-por-revisar'] = 'docente/vista_propuestas_por_revisar';
$route['docente/propuestas-por-evaluar'] = 'docente/vista_propuestas_disponibles_por_evaluar';
$route['docente/cambiar-clave-de-acceso'] = 'docente/vista_cambiar_clave_de_acceso';


$route['estudiante/nueva-propuesta'] = 'estudiante/vista_nueva_propuesta';
$route['estudiante/consultar-estado-propuesta'] = 'estudiante/vista_consultar_propuesta';
$route['estudiante/cambiar-clave-de-acceso'] = 'estudiante/vista_cambiar_clave_de_acceso';

