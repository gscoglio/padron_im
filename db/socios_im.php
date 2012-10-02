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
        $sql = "INSERT INTO padron_im (sexo, apellido, nombre, categoria, 
            socio_nro, socio_cai, dni, tel_celular, tel_particular, 
            tel_laboral, email, fecha_afiliacion, presentado_por, 
            domicilio, localidad, codigo_postal, barrio_zona, ocupacion) 
            VALUES('" . 
            $params['sexo'] . "', '" . 
            $params['lastname'] . "','" . 
            $params['firstname'] . "','" .
            $params['tiposocio'] . "'," .
            $params['nsocioIM'] . ",'" .
            $params['nsocio'] . "'," .
            $params['dni'] . ",'" .
            $params['telcel'] . "','" .
            $params['telpar'] . "','" .
            $params['tellaboral'] . "','" .
            $params['email'] . "','" .
            $params['afiliacion'] . "','" .
            $params['presentedby'] . "','" .
            $params['address'] . "','" .
            $params['localidad'] . "','" .
            $params['postal'] . "','" .
            $params['barrio'] . "','" .
            $params['ocupacion'] . "');";
        //print($sql);
        mysql_query($sql, $this->_db)
            or die("Error Addind Socio");
    }   
}