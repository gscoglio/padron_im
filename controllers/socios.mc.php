<?php

include_once 'db/socios_im.php';

class Socios 
{
    private $_sociosDb;
    
    public function __construct() {
        $this->_sociosDb = new SociosModel();
    }

    public function getSociosPerPage($page = 1, $amount = 20, $where = '')
    {
        $total = $this->_sociosDb->getSociosAmount($where);
        
        $diference = $total - ($page * $amount);        
        
        if ($diference < 1) {
            if ($amount - abs($diference) < 1) {
                return array();
            }
        }
        
        if ($amount * $page > $total) {
            $amountTo = $total - (($page - 1) * $amount);             
        } else {
            $amountTo = $amount;
        }
        
        $from = ($page - 1) * $amount;
        
        return $this->_sociosDb->getSocios($from, $amount, $where);        
    }
    
    public function getAmountOfPages($limit, $where = '') 
    {
        $totalSocios = $this->_sociosDb->getSociosAmount($where);
        $count = $totalSocios / $limit;
        $pages = floor($count);
        if ($count - $pages > 0) {
            $pages++;
        }
        return (int)$pages;
    }
}
