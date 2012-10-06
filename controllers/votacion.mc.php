<?php

session_start(); /// initialize session
include_once("passwords.php");
check_logged("toVote"); /// function checks if visitor is logged. If user is not logged the user is redirected to login.php page 

$user = (int)$_SESSION['tovote']["logged"];

include_once 'controllers/socios.mc.php';
$sociosDb = new Socios();
$voted = $sociosDb->checkVote($user);

if ($voted == 'true') {
    header("Location: end.php");
    exit;
}

include_once 'db/votos.php';
$votosDb = new Votos();

if (isset($_POST) && !empty($_POST)) {
    
    $votos = $_POST;
    
    foreach ($votos as $voto => $value) {
        $votosDb->saveVote($user, $voto);
    }
    
    //marcar el flag de voto
    
    header("Location: end.php");
    exit; 
}

include_once "db/socios_im.php";
$sociosModel = new SociosModel();
$candidatos = $sociosModel->getCandidatos();