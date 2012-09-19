<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'padron_im');

$searchCriterias = array(
    'apellido' => 'text',
    'nombre' => 'text',
    'socio_nro' => 'number',
    'socio_cai' => 'text',
    'dni' => 'number',
);