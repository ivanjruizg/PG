<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://smtp.googlemail.com';
$config['smtp_port'] = 465;
$config['smtp_user'] = 'pruebasaydii@gmail.com'; // correo sin espacio
$config['smtp_pass'] = 'fcbia1234';
$config['smtp_timeout'] = '7';
$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";
$config['mailtype'] = 'html'; // or html
$config['validation'] = false; // bool whether to validate email or not