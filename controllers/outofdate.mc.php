<?php 

include_once 'db/fechas.php';
$fechasDb = new Fechas();
$fechas = $fechasDb->getFechasDeEleccion();
$fechaLimite = current($fechas);

$desde = $fechaLimite['desde'];
$hasta = $fechaLimite['hasta'];