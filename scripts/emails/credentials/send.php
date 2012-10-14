<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

set_time_limit(0);

header('Content-Type: text/html; charset=utf-8');

include_once 'mail.php';
include_once '../../../db/socios_im.php';

$file = file_get_contents("/home/german/Documents/files_IM/claves");
$socios = explode(",",$file);
array_pop($socios);

$sociosDb = new SociosModel();

foreach ($socios as $socioString) {
    $socio = explode("-",$socioString);
    $socioCompleto = $sociosDb->getSocioByNro($socio[0]);

    $params = array(
        'email' => trim($socioCompleto['email']),
        'nombre' => $socioCompleto['nombre'],
        'apellido' => $socioCompleto['apellido'],
        'socio_nro' => $socio[0],
        'clave' => $socio[1],
    );

    try {
        send_email($params);
    } catch (Exception $exc) {
        echo "<br>Error el enviar mail a {$socioCompleto['nombre']} {$socioCompleto['apellido']} ({$socioCompleto['socio_nro']}). " . "Error: " . $exc->getTraceAsString() . "</br>";
    }
    
    echo "<br>Mail enviado existosamente a {$socioCompleto['nombre']} {$socioCompleto['apellido']} ({$socioCompleto['socio_nro']})</br>";
    
}
?>