<?php

/**
 * Função para gerar senhas aleatórias
 *
 * @author    Thiago Belem <contato@thiagobelem.net>
 *
 * @param integer $tamanho Tamanho da senha a ser gerada
 * @param boolean $maiusculas Se terá letras maiúsculas
 * @param boolean $numeros Se terá números
 * @param boolean $simbolos Se terá símbolos
 *
 * @return string A senha gerada
 */
 class  Password_aleatorias
{

     public function __construct() {

     }


     function generar($longitud = 8, $mayus = TRUE, $numeros = TRUE, $simbolos = FALSE)
    {

        $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $num = '1234567890';
        $simb = '~.:_*!-';
        $retorno = '';
        $caracteres = '';

        if ($mayus) $caracteres .= $lmai;
        if ($numeros) $caracteres .= $num;
        if ($simbolos) $caracteres .= $simb;

        $len = strlen($caracteres);

        for ($n = 1; $n <= $longitud; $n++) {
            $rand = mt_rand(1, $len);
            $retorno .= $caracteres[$rand - 1];
        }
        return $retorno;
    }

}