<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include_once 'header.php'; ?>
<body>
<?php include_once 'navigation_bar.php' ?>    
<script type="text/javascript">
$(function() {
        $( "#afiliacion" ).datepicker();
        var dateFormat = $( "#afiliacion" ).datepicker( "option", "dateFormat" );
        var dayNamesMin = $( "#afiliacion" ).datepicker( "option", "dayNamesMin" );
        var monthNames = $( "#afiliacion" ).datepicker( "option", "monthNames" );
        $( "#afiliacion" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
        $( "#afiliacion" ).datepicker( "option", "dayNamesMin", ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"] );
        $( "#afiliacion" ).datepicker( "option", "monthNames", ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"] );
        $( "#afiliacion" ).val("<?php if (isset($socio_nro)) { echo $socioToEdit['fecha_afiliacion']; } ?>"); 
        
        $( "#cuota" ).datepicker();
        var dateFormat = $( "#cuota" ).datepicker( "option", "dateFormat" );
        var dayNamesMin = $( "#cuota" ).datepicker( "option", "dayNamesMin" );
        var monthNames = $( "#cuota" ).datepicker( "option", "monthNames" );
        $( "#cuota" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
        $( "#cuota" ).datepicker( "option", "dayNamesMin", ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"] );
        $( "#cuota" ).datepicker( "option", "monthNames", ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"] );
        $( "#cuota" ).val("<?php if (isset($socio_nro)) { echo $socioToEdit['ultima_cuota']; } ?>"); 
});

$(document).ready(function(){
 
 $('#formulario').validate(
 {
  rules: {
    nsocio: {
      number: true,
      minlength: 5,
      required: true,
      maxlength: 11
    },  
    firstname: {
      minlength: 2,
      required: true,
      maxlength: 22
    },
    lastname: {
      minlength: 2,
      required: true,
      maxlength: 15
    },
    dni: {
      number: true,
      minlength: 7,
      required: true,
      maxlength: 11
    },
    telcel: {
      number: true,
      maxlength: 18
    },
    telpar: {
      number: true,
      maxlength: 14
    },
    tellaboral: {
      number: true,
      maxlength: 25
    }, 
    email: {
      required: true,
      email: true,
      maxlength: 40
    },
    afiliacion: {
      required: true,
      date: true
    },
    presentedby: {
      required: false,
      maxlength: 17
    },
    address: {
      required: false,
      maxlength: 47
    },
    localidad: {
      required: false,
      maxlength: 20
    },
    postal: {
      required: false,
      number: true,
      maxlength: 6
    },
    barrio: {
      required: false,
      maxlength: 20
    },
    ocupacion: {
      required: false,
      maxlength: 28
    },
    cuota: {
      required: false,
      date: true
    },
    nroTarjeta: {
      required: false,
      number: true,
      maxlength: 20
    },
  },
  highlight: function(label) {
    $(label).closest('.control-group').addClass('error');
  },
  success: function(label) {
    label
      .closest('.control-group').addClass('success');
  }
 });
}); // end document.ready
</script>
<script type="text/javascript">
        $('#padronNav').removeClass("active");
        $('#altasNav').addClass("active");
</script>
<script type="text/javascript">
function validateTarjeta(){

    valorDelFormulario = formulario.medioDePago.options[formulario.medioDePago.selectedIndex].value;

    if (valorDelFormulario == 'tarjeta') {
        document.getElementById("nroTarjeta").removeAttribute('disabled');
        document.getElementById("tipoTarjeta").removeAttribute('disabled');
    } else {
        document.getElementById("nroTarjeta").value = '';
        document.getElementById("nroTarjeta").setAttribute('disabled','');
        document.getElementById("tipoTarjeta").value = '';
        document.getElementById("tipoTarjeta").setAttribute('disabled','');
    }

}    
</script>    
<div class="container">
    <?php if (!isset($_GET['socio_nro'])) {?>
<div class="page-header">
    <h1>Alta de socios <small>Inscribir nuevos socios de Independiente M&iacute;stico</small></h1>
</div>
    <?php } else {?>
<div class="page-header">
    <h1>Actualizaci&oacute;n de socio <small><?=$socioToEdit['apellido']?>, <?=$socioToEdit['nombre']?></small></h1>
</div>
    <?php } ?>
<div class="alert" style="display:none" id="alertMessage"></div>    
<form class="form-horizontal" id="formulario" action="altas.php<?php if (isset($socio_nro)) { echo '?socio_nro=' . $socioToEdit['socio_nro']; } ?>" method="post">
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">Socio CAI</span><input class="span5" id="nsocio" name="nsocio" size="16" type="text" <?php if (isset($socio_nro)) { echo 'value="' . $socioToEdit['socio_cai'] . '"'; } ?>>
        </div>
    </div>
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">Apellido</span><input class="span5" id="lastname" name="lastname" size="16" type="text" <?php if (isset($socio_nro)) { echo 'value="' . $socioToEdit['apellido'] . '"'; } ?>>
        </div>
    </div>
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">Nombre</span><input class="span5" id="firstname" name="firstname" size="16" type="text" <?php if (isset($socio_nro)) { echo 'value="' . $socioToEdit['nombre'] . '"'; } ?>>
        </div>
    </div>
    <div class="control-group">
        <label class="radio inline">
            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
            Hombre
        </label>
        <label class="radio inline">
            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" <?php if (isset($socio_nro) && $socioToEdit['sexo'] == "F") { echo 'checked'; } ?>>
            Mujer
        </label>
    </div>
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on">Tipo de Socio </span>
            <select name="tipoSocio">
                <option <?php if (isset($socio_nro) && $socioToEdit['categoria'] == "ACTIVO") { echo 'selected'; } ?>>Activo</option>
                <option <?php if (isset($socio_nro) && $socioToEdit['categoria'] == "FUNDADOR") { echo 'selected'; } ?>>Fundador</option>
                <option <?php if (isset($socio_nro) && $socioToEdit['categoria'] == "CADETE") { echo 'selected'; } ?>>Cadete</option>
                <option <?php if (isset($socio_nro) && $socioToEdit['categoria'] == "ADHERENTE") { echo 'selected'; } ?>>Adherente</option>
            </select>
        </div>
    </div>
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">DNI</span><input class="span2" id="dni" name="dni" size="16" type="text" <?php if (isset($socio_nro)) { echo 'value="' . $socioToEdit['dni'] . '"'; } ?>>
        </div>
    </div>
    <div class="control-group">
    <div class="input-prepend inline">
        <span class="add-on">Tel&eacute;fono celular</span><input class="span2" id="telcel" name="telcel" size="16" type="text" <?php if (isset($socio_nro)) { echo 'value="' . $socioToEdit['tel_celular'] . '"'; } ?>>
    </div>
    <div class="input-prepend inline">
        <span class="add-on">Tel&eacute;fono particular</span><input class="span2" id="telpar" name="telpar" size="16" type="text" <?php if (isset($socio_nro)) { echo 'value="' . $socioToEdit['tel_particular'] . '"'; } ?>>
    </div>
    <div class="input-prepend inline">
        <span class="add-on">Tel&eacute;fono laboral</span><input class="span2" id="tellaboral" name="tellaboral" size="16" type="text" <?php if (isset($socio_nro)) { echo 'value="' . $socioToEdit['tel_laboral'] . '"'; } ?>>
    </div>
    </div>
    <div class="control-group">
    <div class="input-prepend">
        <span class="add-on formLabel">Email</span><input class="span5" id="email" name="email" size="16" type="text" <?php if (isset($socio_nro)) { echo 'value="' . $socioToEdit['email'] . '"'; } ?>>
    </div>
    </div>
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on">Fecha de afiliciaci&oacute;n</span><input class="span2" id="afiliacion" name="afiliacion" size="16" type="text" <?php if (isset($socio_nro)) { echo 'value="' . $socioToEdit['fecha_afiliacion'] . '"'; } ?>>
        </div>
    </div>
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">Presentado por</span><input class="span5" id="presentedby" name="presentedby" size="16" type="text" placeholder="Nombre de la persona que lo acerc&oacute; a IM" <?php if (isset($socio_nro)) { echo 'value="' . $socioToEdit['presentado_por'] . '"'; } ?>>
        </div>
    </div>
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">Domicilio</span><input class="span5" id="address" name="address" size="16" type="text" <?php if (isset($socio_nro)) { echo 'value="' . $socioToEdit['domicilio'] . '"'; } ?>>
        </div>
    </div>
    <div class="control-group">
        <div class="input-prepend inline">
            <span class="add-on">Localidad</span><input class="span2" id="localidad" name="localidad" size="16" type="text" <?php if (isset($socio_nro)) { echo 'value="' . $socioToEdit['localidad'] . '"'; } ?>>
        </div>
        <div class="input-prepend inline">
            <span class="add-on">C&oacute;digo Postal</span><input class="span2" id="postal" name="postal" size="16" type="text" <?php if (isset($socio_nro)) { echo 'value="' . $socioToEdit['codigo_postal'] . '"'; } ?>>
        </div>
        <div class="input-prepend inline">
            <span class="add-on">Barrio / Zona</span><input class="span2" id="barrio" name="barrio" size="16" type="text" <?php if (isset($socio_nro)) { echo 'value="' . $socioToEdit['barrio_zona'] . '"'; } ?>>
        </div>
    </div>
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">Ocupaci&oacute;n</span><input class="span5" id="ocupacion" name="ocupacion" size="16" type="text" <?php if (isset($socio_nro)) { echo 'value="' . $socioToEdit['ocupacion'] . '"'; } ?>>
        </div>
    </div>
    <div class="control-group">
        <div class="input-prepend inline">
            <span class="add-on">Ultima cuota paga</span><input class="span2" id="cuota" name="cuota" size="16" type="text" <?php if (isset($socio_nro)) { echo 'value="' . $socioToEdit['ultima_cuota'] . '"'; } ?>>
        </div>
    </div>
    <div class="control-group">
        <div class="input-prepend inline">
            <span class="add-on">Medio de pago </span>
            <select onchange="validateTarjeta();" class="span2" name="medioDePago" id="medioDePago">
                <option value='efectivo' <?php if (isset($socio_nro) && $socioToEdit['medio_pago'] == "efectivo") { echo 'selected'; } ?>>Efectivo</option>
                <option value='tarjeta' <?php if (isset($socio_nro) && $socioToEdit['medio_pago'] == "tarjeta") { echo 'selected'; } ?>>Tarjeta</option>
            </select>
        </div>
        <div class="input-prepend inline">
            <span class="add-on">Tipo </span>
            <select class="span2" name="tipoTarjeta" id="tipoTarjeta" <?php if (!isset($socio_nro) || $socioToEdit['medio_pago'] != "tarjeta") { echo 'disabled'; } ?>>
                <option value='' selected></option>
                <option value='cabal' <?php if (isset($socio_nro) && $socioToEdit['tarjeta_tipo'] == "cabal") { echo 'selected'; } ?>>Cabal</option>
                <option value='visa' <?php if (isset($socio_nro) && $socioToEdit['tarjeta_tipo'] == "visa") { echo 'selected'; } ?>>Visa</option>
                <option value='master' <?php if (isset($socio_nro) && $socioToEdit['tarjeta_tipo'] == "master") { echo 'selected'; } ?>>Master</option>
            </select>
        </div>
        <div class="input-prepend inline">
            <span class="add-on">N&uacute;mero de tarjeta</span>
            <input class="span3" id="nroTarjeta" name="nroTarjeta" size="20" type="text" <?php if (isset($socio_nro)) { echo 'value="' . $socioToEdit['tarjeta_nro'] . '"'; if ($socioToEdit['medio_pago'] != "tarjeta") { echo 'disabled'; } } else { echo 'disabled'; } ?>>
        </div>
    </div>
    <div class="form-actions">
        <?php if (!isset($_GET['socio_nro'])) {?>
        <button type="submit" class="btn btn-success">Dar de alta</button>
        <?php } else {?>
        <button type="submit" class="btn btn-success">Modificar</button>
        <?php } ?>
        <button type="button" class="btn">Cancelar</button>
    </div>
</form>
</div>
</body>
</html>