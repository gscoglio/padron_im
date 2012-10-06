<?php

include_once 'abstract.php';

class Votos extends Padron_Abstract
{
    public function saveVote($socio_nro, $vote)
    {
        $sql = "INSERT INTO votos 
            VALUES ($socio_nro, $vote);";
        $query = mysql_query($sql, $this->_db);
        return $query;
    }
}