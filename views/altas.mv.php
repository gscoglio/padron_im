<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include_once 'header.php'; ?> 
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
<script>
        $('#padronNav').removeClass("active");
        $('#altasNav').addClass("active");
</script>
<div class="container">
<div class="page-header">
    <h1>Alta de socios <small>Inscribir nuevos socios de Independiente M&iacute;stico</small></h1>
</div>
<div class="alert" style="display:none" id="alertMessage"></div>    
<form class="form-horizontal" id="formulario" action="altas.php" method="post">
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">Socio CAI</span><input class="span5" id="nsocio" name="nsocio" size="16" type="text">
        </div>
    </div>
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">Apellido</span><input class="span5" id="lastname" name="lastname" size="16" type="text">
        </div>
    </div>
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">Nombre</span><input class="span5" id="firstname" name="firstname" size="16" type="text">
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
        <select name="tipoSocio">
            <option>Activo</option>
            <option>Fundador</option>
            <option>Cadete</option>
            <option>Adherente</option>
        </select>
    </div>
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">DNI</span><input class="span2" id="dni" name="dni" size="16" type="text">
        </div>
    </div>
    <div class="control-group">
    <div class="input-prepend inline">
        <span class="add-on">Tel&eacute;fono celular</span><input class="span2" id="telcel" name="telcel" size="16" type="text">
    </div>
    <div class="input-prepend inline">
        <span class="add-on">Tel&eacute;fono particular</span><input class="span2" id="telpar" name="telpar" size="16" type="text">
    </div>
    <div class="input-prepend inline">
        <span class="add-on">Tel&eacute;fono laboral</span><input class="span2" id="tellaboral" name="tellaboral" size="16" type="text">
    </div>
    </div>
    <div class="control-group">
    <div class="input-prepend">
        <span class="add-on formLabel">Email</span><input class="span5" id="email" name="email" size="16" type="text">
    </div>
    </div>
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on">Fecha de afiliciaci&oacute;n</span><input class="span2" id="afiliacion" name="afiliacion" size="16" type="text">
        </div>
    </div>
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">Presentado por</span><input class="span5" id="presentedby" name="presentedby" size="16" type="text" placeholder="Nombre de la persona que lo acerc&oacute; a IM">
        </div>
    </div>
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">Domicilio</span><input class="span5" id="address" name="address" size="16" type="text">
        </div>
    </div>
    <div class="control-group">
        <div class="input-prepend inline">
            <span class="add-on">Localidad</span><input class="span2" id="localidad" name="localidad" size="16" type="text">
        </div>
        <div class="input-prepend inline">
            <span class="add-on">C&oacute;digo Postal</span><input class="span2" id="postal" name="postal" size="16" type="text">
        </div>
        <div class="input-prepend inline">
            <span class="add-on">Barrio / Zona</span><input class="span2" id="barrio" name="barrio" size="16" type="text">
        </div>
    </div>
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">Ocupaci&oacute;n</span><input class="span5" id="ocupacion" name="ocupacion" size="16" type="text">
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