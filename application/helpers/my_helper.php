<?php
// removendo (/) barra..
function removeslashes($string) {
    $string = implode("", explode("/", $string));
    return stripslashes(trim($string));
}

// validar data, se e true ou false
function ValidaData($dat) {
    $data = explode("/", "$dat"); // fatia a string $dat em pedados, usando / como referência
    $d = filter_var($data[0], FILTER_SANITIZE_NUMBER_INT);
    $m = filter_var($data[1], FILTER_SANITIZE_NUMBER_INT);
    $y = filter_var($data[2], FILTER_SANITIZE_NUMBER_INT);

    // verifica se a data é válida!
    // 1 = true (válida)
    // 0 = false (inválida)
    $res = checkdate($m, $d, $y);
    if ($res == 1) {
        return TRUE;
    } else {
        return FALSE;
    }
}


