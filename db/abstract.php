<?php

include_once 'config/config.php';

class Padron_Abstract 
{
    protected $_db;
    
    public function __construct() {
        if(!isset($this->_db)){
            $this->_db = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
            mysql_select_db(DB_NAME);
        }
    }   
}

