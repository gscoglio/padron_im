padron_im
=========

config en /config/config.php

<?php

define('DB_HOST', 'host');
define('DB_USER', 'user');
define('DB_PASSWORD', 'password');
define('DB_NAME', 'databaseName');

$searchCriterias = array(
    'apellido' => 'text',
    'nombre' => 'text',
    'socio_nro' => 'number',
    'socio_cai' => 'text',
    'dni' => 'number',
);