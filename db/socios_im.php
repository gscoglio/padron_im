<?php

include_once 'abstract.php';

class SociosModel extends Padron_Abstract
{   
    public function getSocios($to, $limit, $where = '', $orderBy = 'socio_nro')
    {
        if ($where == '') {
            $whereQuery = '';
        } else {
            $whereQuery = 'WHERE ' . $where;
        }
        
        $query = "SELECT * 
            FROM padron_im 
            $whereQuery
            ORDER BY $orderBy 
            LIMIT $to,$limit;";
        $result = mysql_query($query, $this->_db);
        while ($socio = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $socios[] = $socio;
        }
        return $socios;
    }
    
    public function getSociosAmount($where = '')
    {
        if ($where == '') {
            $whereQuery = '';
        } else {
            $whereQuery = 'WHERE ' . $where;
        }
        
        $sql = "SELECT count(*) FROM padron_im $whereQuery;";
        $query = mysql_query($sql, $this->_db);
        $result = mysql_fetch_array($query);
        return $result[0];      
    }
    
}