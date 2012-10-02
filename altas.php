<?php 
session_start(); /// initialize session
include_once("passwords.php");
check_logged(); /// function checks if visitor is logged. If user is not logged the user is redirected to login.php page 

if (isset($_POST['nsocio'])) {
    $error = 0;
    $_POST['nsocio'];
    $_POST['lastname'];
    $_POST['firstname'];
    $_POST['nsocioIM'];
    if ($_POST['optionsRadios']=='option1'){
        $sexo = 'M';
    }  else {
        $sexo = 'F';
    };
    $_POST['dni'];
    $_POST['telcel'];
    $_POST['telpar'];
    $_POST['tellaboral'];
    $_POST['email'];
    $fecha_aux = explode("/",$_POST['afiliacion']);
    $fecha = $fecha_aux[2] . "-" . $fecha_aux[1] . "-" . $fecha_aux[0];
    $_POST['presentedby'];
    $_POST['address'];
    $_POST['localidad'];
    $_POST['postal'];
    $_POST['barrio'];
    $_POST['ocupacion'];
    
    $insert['nsocio'] = $_POST['nsocio'];
    $insert['lastname'] = $_POST['lastname'];
    $insert['firstname'] = $_POST['firstname'];
    $insert['nsocioIM'] = $_POST['nsocioIM'];
    $insert['sexo'] = $sexo;
    $insert['tiposocio'] = "Fundador";
    $insert['dni'] = $_POST['dni'];
    $insert['telcel'] = $_POST['telcel'];
    $insert['telpar'] = $_POST['telpar'];
    $insert['tellaboral'] = $_POST['tellaboral'];
    $insert['email'] = $_POST['email'];
    $insert['afiliacion'] = $fecha;
    $insert['presentedby'] = $_POST['presentedby'];
    $insert['address'] = $_POST['address'];
    $insert['localidad'] = $_POST['localidad'];
    $insert['postal'] = $_POST['postal'];
    $insert['barrio'] = $_POST['barrio'];
    $insert['ocupacion'] = $_POST['ocupacion'];
    
    if ($error == 0){
        include_once "db/socios_im.php";
        $sociosModel = new SociosModel();
        $sociosModel->insertSocio($insert);
        print '<div class="alert alert-success">Socio cargado correctamente </div>';
    }
}

include_once 'views/altas.mv.php';

