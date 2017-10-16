<?php

defined('BASEPATH') OR exit('<h1 style="text-transform: uppercase; font-weight: 300; color: red; text-align:center; margin-top: 20%;">Acesso não permitido</h1>');



    //MY_ para informar ao framework de que se trata de uma classe customizada, ou seja, não faz parte do framework. Pode ser alterada no arquivo config.php em application/config/
  function slug($string) {
        if (is_string($string)):
            $string = strtolower(trim(utf8_decode($string)));

            $before = 'ÀÁÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ';
            $after = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyy';
            $string = strtr($string, utf8_decode($before), $after);
            $replace = array(
                '/[^a-z0-9.-]/' => '_',
                '/\-{2,}/' => ''
            );
            $string = preg_replace(array_keys($replace), array_values($replace), $string);
        endif;
        return $string;
    }


