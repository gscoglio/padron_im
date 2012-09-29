<?php
if (!isset($_GET['id'])) {
    header("Location: index.php");
}

if (isset($_SERVER["HTTP_REFERER"])) {
    $returnTo = $_SERVER["HTTP_REFERER"];
} else {
    $returnTo = 'index.php';
}


include_once "db/socios_im.php";
$sociosModel = new SociosModel();
$socio = $sociosModel->getSocioById($_GET['id']);