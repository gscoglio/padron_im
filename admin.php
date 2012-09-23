<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include_once 'header.php'; 
session_start(); /// initialize session
include_once("passwords.php");
check_logged(); /// function checks if visitor is logged. If user is not logged the user is redirected to login.php page 
?>
<body>
<script>
	$(function() {
		$( "#afiliacion" ).datepicker();
                var dateFormat = $( "#afiliacion" ).datepicker( "option", "dateFormat" );
                var dayNamesMin = $( "#afiliacion" ).datepicker( "option", "dayNamesMin" );
                var monthNames = $( "#afiliacion" ).datepicker( "option", "monthNames" );
                $( "#afiliacion" ).datepicker( "option", "dateFormat", "dd/mm/yy" );
                $( "#afiliacion" ).datepicker( "option", "dayNamesMin", ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"] );
                $( "#afiliacion" ).datepicker( "option", "monthNames", ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"] );
	});
        
        $(document).ready(function(){
 
 $('#formulario').validate(
 {
  rules: {
    nsocio: {
      number: true,
      minlength: 5,
      required: true
    },  
    firstname: {
      minlength: 2,
      required: true
    },
    lastname: {
      minlength: 2,
      required: true
    },
    dni: {
      number: true,
      minlength: 8,
      required: true
    },
    telcel: {
      number: true
    },
    telpar: {
      number: true
    },
    tellaboral: {
      number: true
    }, 
    email: {
      required: true,
      email: true
    },
    afiliacion: {
      required: true,
      date: true
    },
    presentedby: {
      required: false
    },
    address: {
      required: false
    },
    localidad: {
      required: false
    },
    postal: {
      required: false,
      number: true
    },
    barrio: {
      required: false
    },
    ocupacion: {
      required: false
    }
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
<?php include_once 'navigation_bar.php' ?>
<div class="container">
<form class="form-horizontal" id="formulario">
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">Socio CAI</span><input class="span5" id="nsocio" name="nsocio" size="16" type="text" placeholder="21100">
        </div>
    </div>
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">Apellido</span><input class="span5" id="lastname" name="lastname" size="16" type="text" placeholder="Scoglio">
        </div>
    </div>
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">Nombre</span><input class="span5" id="firstname" name="firstname" size="16" type="text" placeholder="Pablo">
        </div>
    </div>
    <div class="control-group">
        <label class="radio inline">
            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
            Hombre
        </label>
        <label class="radio inline">
            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
            Mujer
        </label>
    </div>
    <div class="control-group"><span class="add-on">Tipo de Socio </span>
        <select>
            <option>Fundador</option>
            <option>Activo</option>
        </select>
    </div>
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">DNI</span><input class="span2" id="dni" name="dni" size="16" type="text" placeholder="32655993">
        </div>
    </div>
    <div class="control-group">
    <div class="input-prepend inline">
        <span class="add-on">Tel&eacute;fono celular</span><input class="span2" id="telcel" name="telcel" size="16" type="text" placeholder="1567899098">
    </div>
    <div class="input-prepend inline">
        <span class="add-on">Tel&eacute;fono particular</span><input class="span2" id="telpar" name="telpar" size="16" type="text" placeholder="1567899098">
    </div>
    <div class="input-prepend inline">
        <span class="add-on">Tel&eacute;fono laboral</span><input class="span2" id="tellaboral" name="tellaboral" size="16" type="text" placeholder="1567899098">
    </div>
    </div>
    <div class="control-group">
    <div class="input-prepend">
        <span class="add-on formLabel">Email</span><input class="span5" id="email" name="email" size="16" type="text" placeholder="pabloscoglio@gmail.com">
    </div>
    </div>
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on">Fecha de afiliciaci&oacute;n</span><input class="span2" id="afiliacion" name="afiliacion" size="16" type="text" placeholder="19/10/21012">
        </div>
    </div>
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">Presentado por</span><input class="span5" id="presentedby" name="presentedby" size="16" type="text" placeholder="Germ&aacute;n Scoglio">
        </div>
    </div>
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">Domicilio</span><input class="span5" id="address" name="address" size="16" type="text" placeholder="Av. Mitre 4702">
        </div>
    </div>
    <div class="control-group">
    <div class="input-prepend inline">
        <span class="add-on">Localidad</span><input class="span2" id="localidad" name="localidad" size="16" type="text" placeholder="Villa Dom&iacute;nico">
    </div>
    <div class="input-prepend inline">
        <span class="add-on">C&oacute;digo Postal</span><input class="span2" id="postal" name="postal" size="16" type="text" placeholder="1876">
    </div>
    <div class="input-prepend inline">
        <span class="add-on">Barrio / Zona</span><input class="span2" id="barrio" name="barrio" size="16" type="text" placeholder="Parque Dom&iacute;nico">
    </div>
    </div>
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">Ocupaci&oacute;n</span><input class="span5" id="ocupacion" name="ocupacion" size="16" type="text" placeholder="Abogado">
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-success">Dar de alta</button>
        <button type="button" class="btn">Cancelar</button>
    </div>
</form>
</div>
</body>
</html>