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
    
    public function getAllSocios()
    {
        $query = "SELECT * 
            FROM padron_im;";
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
    
    public function getSocioById($id) 
    {
        $sql = "SELECT * 
            FROM padron_im 
            WHERE socio_id=$id;";
        $query = mysql_query($sql, $this->_db);
        $socio = mysql_fetch_array($query);
        return $socio;
    }
    
    public function insertSocio($params)
    {   
        $nrosocioIM = $this->_getLastNumberSocio() + 1;
        $sql = "INSERT INTO padron_im (sexo, apellido, nombre, categoria, 
            socio_nro, socio_cai, dni, tel_celular, tel_particular, 
            tel_laboral, email, fecha_afiliacion, presentado_por, 
            domicilio, localidad, codigo_postal, barrio_zona, ocupacion) 
            VALUES('" . 
            $params['sexo'] . "', '" . 
            addslashes($params['lastname']) . "','" . 
            addslashes($params['firstname']) . "','" .
            addslashes($params['tiposocio']) . "'," .
            $nrosocioIM . ",'" .
            addslashes($params['nsocio']) . "'," .
            addslashes($params['dni']) . ",'" .
            addslashes($params['telcel']) . "','" .
            addslashes($params['telpar']) . "','" .
            addslashes($params['tellaboral']) . "','" .
            addslashes($params['email']) . "','" .
            addslashes($params['afiliacion']) . "','" .
            addslashes($params['presentedby']) . "','" .
            addslashes($params['address']) . "','" .
            addslashes($params['localidad']) . "','" .
            addslashes($params['postal']) . "','" .
            addslashes($params['barrio']) . "','" .
            addslashes($params['ocupacion']) . "');";
        //print($sql);
        
        //prevent SQL Injection
        if (substr_count($sql, ';') > 1){
            return -2;
        };
        
        try {
            mysql_query($sql, $this->_db);
            return $nrosocioIM;
        } catch (Exception $exc) {
            return -1;
        }
    }
    
    private function _getLastNumberSocio(){
        $sql = "SELECT MAX( socio_nro ) FROM  padron_im;";
        $query = mysql_query($sql, $this->_db);
        $nrosocio = mysql_fetch_array($query);
        return (int)$nrosocio[0];
    }
    
    public function getCandidatos()
    {
        $query = "SELECT * 
            FROM padron_im 
            WHERE candidato = 1
            ORDER BY apellido;";
        $result = mysql_query($query, $this->_db);
        while ($candidato = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $candidatos[] = $candidato;
        }
        return $candidatos;
    }
}