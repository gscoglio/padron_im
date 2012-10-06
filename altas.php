<?php 
session_start(); /// initialize session
include_once("passwords.php");
check_logged(); /// function checks if visitor is logged. If user is not logged the user is redirected to login.php page 

if (isset($_POST['nsocio'])) {
    $error = 0;
    $mensajeError = "No se pudo cargar el socio";
    $_POST['nsocio'];
    $_POST['lastname'];
    $_POST['firstname'];
    $_POST['tipoSocio'];
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
    $insert['sexo'] = $sexo;
    $insert['tiposocio'] = $_POST['tipoSocio'];
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
        try{
            include_once "db/socios_im.php";
            $sociosModel = new SociosModel();
            $resultado = $sociosModel->insertSocio($insert);
        } catch (Exception $e) {
            include_once 'views/altas.mv.php';
            echo "<script>$('#alertMessage').addClass(\"alert-error\");$('#alertMessage').html('<button type=\"button\" class=\"close\" data-dismiss=\"alert\">x</button><strong>Error! </strong>" . $e . ".');$('#alertMessage').show();</script>";
            die;
        };
        if ($resultado == -1){
            include_once 'views/altas.mv.php';
            echo "<script>$('#alertMessage').addClass(\"alert-error\");$('#alertMessage').html('<button type=\"button\" class=\"close\" data-dismiss=\"alert\">x</button><strong>Error! </strong>Insertando socio en la Base de Datos.');$('#alertMessage').show();</script>";
            die;
        } elseif ($resultado == -2) {
            include_once 'views/altas.mv.php';
            echo "<script>$('#alertMessage').addClass(\"alert-error\");$('#alertMessage').html('<button type=\"button\" class=\"close\" data-dismiss=\"alert\">x</button><strong>Ojo! </strong>Evite usar ; en los datos ingresados.');$('#alertMessage').show();</script>";
            die;
        } else {
            include_once 'views/altas.mv.php';
            echo "<script>$('#alertMessage').addClass(\"alert-success\");$('#alertMessage').html('<button type=\"button\" class=\"close\" data-dismiss=\"alert\">x</button>Socio <strong>". addslashes($_POST['lastname']) . ", " . addslashes($_POST['firstname']) . "</strong> con n&uacute;mero de socio de Independiente M&iacute;stico <strong>" . $resultado . "</strong> agregado al padr&oacute;n correctamente.');$('#alertMessage').show();</script>";
        }
    } else {
        include_once 'views/altas.mv.php';
        echo "<script>$('#alertMessage').addClass(\"alert-eror\");$('#alertMessage').html('<button type=\"button\" class=\"close\" data-dismiss=\"alert\">x</button><strong>Error! </strong> " . $mensajeError . ".');$('#alertMessage').show();</script>";
    }       
}

include_once 'views/altas.mv.php';

