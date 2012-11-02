<?php

include_once 'db/votos.php';
include_once 'db/socios_im.php';

$votosDb = new Votos();
$votos = $votosDb->getResults();

$sociosDb = new SociosModel(); 

$result = array();

if (!empty($votos)) {
    foreach ($votos as $voto) {
        $socio = $sociosDb->getSocioByNro($voto['votado_socio_nro']);
        $vote = array (
            'nombre' => $socio['apellido'] . ", " . $socio['nombre'],
            'votos' => $voto['votos'],
        );
        array_push($result, $vote);
    }   
}

function activate($option) 
{
    if ((!isset($_GET['report']) && $option == 'barras') || 
        ($option == $_GET['report'])){
        return 'class="active"';
    }
    return '';
}