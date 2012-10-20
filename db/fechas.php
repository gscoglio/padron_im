<?php

include_once 'abstract.php';

class Fechas extends Padron_Abstract
{  
    public function getFechasDeEleccion()
    {
        $query = "SELECT * 
            FROM fechas;";
        $result = mysql_query($query, $this->_db);
        while ($fecha = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $fechas[] = $fecha;
        }
        return $fechas;
    }
}
