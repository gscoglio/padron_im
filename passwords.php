<?php

include_once 'db/users.php';
include_once 'db/socios_im.php';

if(!isset($USERS)){
    $users = new Users();
    $logins = $users->getUsers();

    foreach ($logins as $login) {
        $USERS[$login['username']] = $login['password'];
    }
    
    $socios = new SociosModel();
    $socios = $socios->getAllSocios();
    
    foreach ($socios as $socio) {
        $USERS['vote'][$socio['socio_nro']] = $socio['clave'];
    }
}

function check_logged($profile = null){
     global $_SESSION, $USERS;
     
     if (isset($profile) && $profile == "toVote") {
        if (!array_key_exists($_SESSION['tovote']["logged"],$USERS['vote'])) {
            header("Location: login.php");
            exit;
        };
     } elseif (!array_key_exists($_SESSION["logged"],$USERS)) {
          header("Location: login.php");
          exit;
     };
};