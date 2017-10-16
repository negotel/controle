<?php

function aleatoriaCodigo($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false) {
    // Caracteres de cada tipo
    $lmin = 'abcdefghijklmnopqrstuvwxyz';
    $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $num = '1234567890';
    $simb = '!@#$%*-';
    // VariÃƒÂ¡veis internas
    $retorno = '';
    $caracteres = '';
    // Agrupamos todos os caracteres que poderÃƒÂ£o ser utilizados
    $caracteres .= $lmin;
    if ($maiusculas)
        $caracteres .= $lmai;
    if ($numeros)
        $caracteres .= $num;
    if ($simbolos)
        $caracteres .= $simb;
    // Calculamos o total de caracteres possÃƒÂ­veis
    $len = strlen($caracteres);
    for ($n = 1; $n <= $tamanho; $n++) {
    // Criamos um nÃƒÂºmero aleatÃƒÂ³rio de 1 atÃƒÂ© $len para pegar um dos caracteres
        $rand = mt_rand(1, $len);
    // Concatenamos um dos caracteres na variÃƒÂ¡vel $retorno
        $retorno .= $caracteres[$rand - 1];
    }
    return $retorno;
}