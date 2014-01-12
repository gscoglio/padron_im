<?php 
session_start(); /// initialize session
include_once("passwords.php");
check_logged(); /// function checks if visitor is logged. If user is not logged the user is redirected to login.php page 

if (isset($_GET['socio_nro'])) {
    $socio_nro = $_GET['socio_nro'];
    require_once 'db/socios_im.php';
    $sociosDb = new SociosModel();
    $socioToEdit = $sociosDb->getSocioByNro($socio_nro);
} else {
    $socio_nro = null;
}

if (isset($_POST['nsocio'])) {
    $error = 0;
    $mensajeError = "No se pudo cargar el socio";
    if ($_POST['optionsRadios']=='option1'){
        $sexo = 'M';
    }  else {
        $sexo = 'F';
    };

    $insert['nsocio'] = $_POST['nsocio'];
    $insert['lastname'] = $_POST['lastname'];
    $insert['firstname'] = $_POST['firstname'];
    $insert['sexo'] = $sexo;
    $insert['tiposocio'] = $_POST['tipoSocio'];
    $insert['dni'] = $_POST['dni'];
    $insert['nacimiento'] = $_POST['nacimiento'];
    $insert['telcel'] = $_POST['telcel'];
    $insert['telpar'] = $_POST['telpar'];
    $insert['tellaboral'] = $_POST['tellaboral'];
    $insert['email'] = $_POST['email'];
    $insert['afiliacion'] = $_POST['afiliacion'];
    $insert['presentedby'] = $_POST['presentedby'];
    $insert['address'] = $_POST['address'];
    $insert['localidad'] = $_POST['localidad'];
    $insert['postal'] = $_POST['postal'];
    $insert['barrio'] = $_POST['barrio'];
    $insert['ocupacion'] = $_POST['ocupacion'];
    $insert['ultima_cuota'] = $_POST['cuota'];
    $insert['medio_pago'] = $_POST['medioDePago'];

    if (isset($_POST['tipoTarjeta'])) {
        $insert['tarjeta_tipo'] = $_POST['tipoTarjeta'];
    } else {
        $insert['tarjeta_tipo'] = '';
    }
    
    if (isset($_POST['nroTarjeta'])) {
        $insert['tarjeta_nro'] = $_POST['nroTarjeta'];
    } else {
        $insert['tarjeta_nro'] = null;
    }
    
    $insert['updatedBy'] = $_SESSION['user_id'];
    
    if ($error == 0){
        try{
            include_once "controllers/socios.mc.php";
            $sociosModel = new Socios();
            $resultado = $sociosModel->saveSocio($insert, $socio_nro);
            if (isset($_GET['socio_nro'])) {
                $socio_nro = $_GET['socio_nro'];
                require_once 'db/socios_im.php';
                $sociosDb = new SociosModel();
                $socioToEdit = $sociosDb->getSocioByNro($socio_nro);
            }
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
            echo "<script>$('#alertMessage').addClass(\"alert-success\");$('#alertMessage').html('<button type=\"button\" class=\"close\" data-dismiss=\"alert\">x</button>Socio <strong>". addslashes($_POST['lastname']) . ", " . addslashes($_POST['firstname']) . "</strong> con n&uacute;mero de socio de Independiente M&iacute;stico <strong>" . $resultado . "</strong> actualizado correctamente.');$('#alertMessage').show();</script>";
        }
    } else {
        include_once 'views/altas.mv.php';
        echo "<script>$('#alertMessage').addClass(\"alert-eror\");$('#alertMessage').html('<button type=\"button\" class=\"close\" data-dismiss=\"alert\">x</button><strong>Error! </strong> " . $mensajeError . ".');$('#alertMessage').show();</script>";
    }       
}

include_once 'views/altas.mv.php';

