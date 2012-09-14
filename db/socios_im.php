<?php

include_once 'config/config.php';

class SociosModel 
{
    private $_db;
    
    public function __construct() {
        $this->_db = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
        mysql_select_db(DB_NAME);
    }
    
    public function getSocios($to, $limit, $orderBy = 'socio_nro')
    {
        $query = "SELECT * 
            FROM padron_im 
            ORDER BY $orderBy 
            LIMIT $to,$limit;";
        $result = mysql_query($query, $this->_db);
        while ($socio = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $socios[] = $socio;
        }
        return $socios;
    }
    
    public function getSociosAmount()
    {
        $sql = "SELECT count(*) FROM padron_im;";
        $query = mysql_query($sql, $this->_db);
        $result = mysql_fetch_array($query);
        return $result[0];      
    }
    
}