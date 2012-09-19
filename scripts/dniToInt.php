<?php

include_once 'config/config.php';

set_time_limit(0);

$db = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysql_select_db(DB_NAME);

$query = "SELECT * FROM padron_im";
$result = mysql_query($query, $db);
    while ($socio = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $socios[] = $socio;
    }
    
    foreach ($socios as $socioParticular) {
         $newDNI = str_replace(",", "", $socioParticular['dni']);
         $queryUpdate = "UPDATE padron_im 
            SET dni=$newDNI 
            WHERE socio_id={$socioParticular['socio_id']}"; 
            mysql_query($queryUpdate, $db);
    }
    
    echo "DONE";