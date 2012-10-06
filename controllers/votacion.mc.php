<?php

session_start(); /// initialize session
include_once("passwords.php");
check_logged("toVote"); /// function checks if visitor is logged. If user is not logged the user is redirected to login.php page 

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