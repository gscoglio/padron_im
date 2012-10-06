<?php

//chequeo login

//chequeo si ya voto
//si ya voto voy a pagina de voto realizado y salgo

if (isset($_POST) && !empty($_POST)) {
    
    //guardar en la base
    //marcar el flag de voto
    //mostrar mensaje exito
    var_dump($_POST);exit;
    
}

include_once "db/socios_im.php";
$sociosModel = new SociosModel();
$candidatos = $sociosModel->getCandidatos();