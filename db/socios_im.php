<?php

include_once 'abstract.php';

class SociosModel extends Padron_Abstract
{   
    public function getSocios($to, $limit, $where = '', $orderBy = 'socio_nro')
    {        
        if ($where == '') {
            $whereQuery = 'WHERE deleted=0';
        } else {
            $whereQuery = 'WHERE ' . $where . " AND deleted=0";
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
            FROM padron_im
            WHERE deleted = 0;";
        $result = mysql_query($query, $this->_db);
        while ($socio = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $socios[] = $socio;
        }
        return $socios;
    }
    
    public function getSociosAmount($where = '')
    {
        if ($where == '') {
            $whereQuery = 'WHERE deleted=0';
        } else {
            $whereQuery = 'WHERE ' . $where . " AND deleted=0";
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
            WHERE socio_id=$id
            AND deleted=0;";
        $query = mysql_query($sql, $this->_db);
        $socio = mysql_fetch_array($query);
        return $socio;
    }
    
    public function getSocioByNro($socio_nro) 
    {
        $sql = "SELECT * 
            FROM padron_im 
            WHERE socio_nro=$socio_nro
            AND deleted=0;";
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
    
    public function updateSocio($params, $id) 
    {
        $sql = 'UPDATE padron_im SET 
            sexo = "' . $params['sexo'] . '",' . ' 
            apellido = "' . addslashes($params['lastname']) . '",' . ' 
            nombre = "'. addslashes($params['firstname']) . '",' . '
            categoria = "'. addslashes($params['tiposocio']) . '",' . ' 
            socio_nro = '. $id . ',' . '
            socio_cai = "' . addslashes($params['nsocio']) . '", 
            dni = ' . addslashes($params['dni']) . ', 
            tel_celular = "' . addslashes($params['telcel']) . '", 
            tel_particular = "' . addslashes($params['telpar']) . '", 
            tel_laboral = "' . addslashes($params['tellaboral']) . '", 
            email = "'. addslashes($params['email']) . '",' . '
            fecha_afiliacion = "' . addslashes($params['afiliacion']) . '",' . '
            presentado_por = "'. addslashes($params['presentedby']) . '",' . '
            domicilio = "'. addslashes($params['address']) . '",' . '
            localidad = "'. addslashes($params['localidad']) . '",' . '
            codigo_postal = "' . addslashes($params['postal']) . '",' . '
            barrio_zona = "' . addslashes($params['barrio']) . '",' . '
            ocupacion = "' . addslashes($params['ocupacion']) . '"' . '
            WHERE socio_nro = ' . $id . ';'; 
        
        //prevent SQL Injection
        if (substr_count($sql, ';') > 1){
            return -2;
        };
        
        try {
            mysql_query($sql, $this->_db);
            return $id;
        } catch (Exception $exc) {
            return -1;
        }        
    }
    
    private function _getLastNumberSocio()
    {
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
            AND deleted=0
            ORDER BY socio_nro;";
        $result = mysql_query($query, $this->_db);
        while ($candidato = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $candidatos[] = $candidato;
        }
        return $candidatos;
    }

    public function updateSocioByNro($values, $socio_nro)
    {
        $query = "UPDATE padron_im SET ";
        
        //TODO: IMPROVE FOR MORE THAN 1 VALUE
        foreach ($values as $key => $value) {
            $query .= "$key = $value";
        }
        
        $query .= " WHERE socio_nro = $socio_nro;";
        $result = mysql_query($query, $this->_db);
        return $result;
    }
    
    public function deleteSocio($socio_nro) 
    {
        $query = "UPDATE padron_im 
            SET deleted=1
            WHERE socio_nro=$socio_nro;";
        return mysql_query($query, $this->_db);
    }
    
}