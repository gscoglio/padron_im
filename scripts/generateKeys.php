<?php

include_once '../config/config.php';

set_time_limit(0);

$db = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysql_select_db(DB_NAME);

$query = "SELECT * FROM padron_im";
$result = mysql_query($query, $db);
while ($socio = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $socios[] = $socio;
}
    
foreach ($socios as $socio) {
    
    if (empty($socio['clave'])) {
        $key = generateKey();
        saveKey($socio['socio_nro'], $key, $db);
        echo $socio['socio_nro'] . "-" . $key . "<br />";
    } else {
        echo $socio['socio_nro'] . "-" . $socio['clave'] . "<br />";
    }
    
}

function generateKey() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 8; $i++) 
        {
            $randstring .= $characters[rand(0, strlen($characters) - 1)];
        }
    return $randstring;
}

function saveKey($socio_nro, $key, $db) {
    $encryptedKey = md5($key);
    $query = "UPDATE padron_im
        SET clave = '$encryptedKey'
        WHERE socio_nro = $socio_nro;";
    $result = mysql_query($query, $db);
}