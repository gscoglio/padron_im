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
}