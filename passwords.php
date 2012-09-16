<?php

include_once 'db/users.php';
  
if(!isset($USERS)){
    $users = new Users();
    $logins = $users->getUsers();

    foreach ($logins as $login) {
        $USERS[$login['username']] = $login['password'];
    }
}

function check_logged(){
     global $_SESSION, $USERS;
     if (!array_key_exists($_SESSION["logged"],$USERS)) {
          header("Location: login.php");
     };
};