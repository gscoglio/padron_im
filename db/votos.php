<?php

include_once 'abstract.php';

class Votos extends Padron_Abstract
{
    public function saveVote($socio_nro, $vote)
    {
        $time = date('Y-m-d H:i:s');
        $sql = "INSERT INTO votos
            VALUES ($socio_nro, $vote, '$time');";
        $query = mysql_query($sql, $this->_db);
        return $query;
    }
    
    public function getResults() 
    {
        $query = "SELECT count(*) votos, votado_socio_nro 
            FROM votos
            GROUP BY votado_socio_nro
            ORDER BY 1 desc;";
        $result = mysql_query($query, $this->_db);
        while ($voto = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $votos[] = $voto;
        }
        return $votos;
    }
    
}