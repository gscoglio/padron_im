<?php

include_once 'abstract.php';

class Users extends Padron_Abstract
{
    private $_users;
    
    public function getUsers()
    {
        if(!isset($this->_users)){
            $query = "SELECT * FROM users;";
            $result = mysql_query($query, $this->_db);
            while ($user = mysql_fetch_array($result, MYSQL_ASSOC)) {
                $users[] = $user;
            }
            $this->_users = $users;
        }
        return $this->_users;
    }
}