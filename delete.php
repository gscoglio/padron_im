<?php 
session_start(); /// initialize session
include_once("passwords.php");
check_logged(); /// function checks if visitor is logged. If user is not logged the user is redirected to login.php page 

if (! isset($_GET['socio']) || !is_int((int)$_GET['socio'])) {
    header('location: index.php');
    exit;
}

include_once 'db/socios_im.php';

$sociosDb = new SociosModel();
$sociosDb->deleteSocio($_GET['socio']);

$returnTo = 'index.php';

if (isset($_GET['source']) && $_GET['source'] == "socios") {
    if (isset($_SERVER["HTTP_REFERER"])) {
        $returnTo = $_SERVER["HTTP_REFERER"];
    }
}

header('location: ' . $returnTo);
exit;