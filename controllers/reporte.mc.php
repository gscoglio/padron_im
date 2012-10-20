<?php

include_once 'db/votos.php';
include_once 'db/socios_im.php';

$votosDb = new Votos();
$votos = $votosDb->getResults();

$sociosDb = new SociosModel(); 

$result = array();

foreach ($votos as $voto) {
    $socio = $sociosDb->getSocioByNro($voto['votado_socio_nro']);
    $vote = array (
        'nombre' => $socio['apellido'] . ", " . $socio['nombre'],
        'votos' => $voto['votos'],
    );
    array_push($result, $vote);
}