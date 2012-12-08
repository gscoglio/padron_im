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

header('location: index.php');
exit;