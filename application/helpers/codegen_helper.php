<?php
defined('BASEPATH') OR exit('<h1 style="text-transform: uppercase; font-weight: 300; color: red; text-align:center; margin-top: 20%;">Acesso não permitido</h1>');
function p($a)
{
    echo '<pre>';
    print_r($a);
    echo '</pre>';

}
function v($a) {
    echo '<pre>';
    var_dump($a);
    echo '</pre>';

}


function clean_header($array){
    $CI = get_instance();
    $CI->load->helper('inflector');
    foreach($array as $a){
        $arr[] = humanize($a);
    }
    return $arr;
}
