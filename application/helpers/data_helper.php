<?php
defined('BASEPATH') OR exit('<h1 style="text-transform: uppercase; font-weight: 300; color: red; text-align:center; margin-top: 20%;">Acesso não permitido</h1>');

function dataFormatoBR($data) {
    $dataFormatoBR = date('d/m/Y', strtotime($data));
    return $dataFormatoBR;
}

function dataFormatoBRcHora($data) {
    $dataFormatoBR = date('d/m/Y H:i', strtotime($data));
    return $dataFormatoBR;
}

function formataDecimal($valor) {
    $formataDecimal =  number_format($valor,0,',','.');
    return $formataDecimal;      
}

function formataDecimalBR($valor) {
    $formataDecimalBR =  number_format($valor,2,',','.');
    return $formataDecimalBR;      
}