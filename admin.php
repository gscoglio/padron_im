<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include_once 'header.php' ?>
<body>
<script>
	$(function() {
		$( "#afiliacion" ).datepicker();
	});
</script>
<?php include_once 'navigation_bar.php' ?>
<div class="container">
<form class="form-horizontal">
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">Socio CAI</span><input class="span5" id="nsocio" size="16" type="text" placeholder="21100">
        </div>
    </div>
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">Apellido</span><input class="span5" id="lastname" size="16" type="text" placeholder="Scoglio">
        </div>
    </div>
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">Nombre</span><input class="span5" id="firstname" size="16" type="text" placeholder="Pablo">
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
            <span class="add-on formLabel">DNI</span><input class="span2" id="dni" size="16" type="text" placeholder="32655993">
        </div>
    </div>
    <div class="control-group">
    <div class="input-prepend inline">
        <span class="add-on">Tel&eacute;fono celular</span><input class="span2" id="telcel" size="16" type="text" placeholder="1567899098">
    </div>
    <div class="input-prepend inline">
        <span class="add-on">Tel&eacute;fono particular</span><input class="span2" id="telpar" size="16" type="text" placeholder="1567899098">
    </div>
    <div class="input-prepend inline">
        <span class="add-on">Tel&eacute;fono laboral</span><input class="span2" id="tellaboral" size="16" type="text" placeholder="1567899098">
    </div>
    </div>
    <div class="control-group">
    <div class="input-prepend">
        <span class="add-on formLabel">Email</span><input class="span5" id="email" size="16" type="text" placeholder="pabloscoglio@gmail.com">
    </div>
    </div>
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on">Fecha de afiliciaci&oacute;n</span><input class="span2" id="afiliacion" size="16" type="text" placeholder="19/10/21012">
        </div>
    </div>
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">Presentado por</span><input class="span5" id="presentedby" size="16" type="text" placeholder="Germ&aacute;n Scoglio">
        </div>
    </div>
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">Domicilio</span><input class="span5" id="adress" size="16" type="text" placeholder="Av. Mitre 4702">
        </div>
    </div>
    <div class="control-group">
    <div class="input-prepend inline">
        <span class="add-on">Localidad</span><input class="span2" id="localidad" size="16" type="text" placeholder="Villa Dom&iacute;nico">
    </div>
    <div class="input-prepend inline">
        <span class="add-on">C&oacute;digo Postal</span><input class="span2" id="postal" size="16" type="text" placeholder="1876">
    </div>
    <div class="input-prepend inline">
        <span class="add-on">Barrio / Zona</span><input class="span2" id="barrio" size="16" type="text" placeholder="Parque Dom&iacute;nico">
    </div>
    </div>
    <div class="control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">Ocupaci&oacute;n</span><input class="span5" id="ocupacion" size="16" type="text" placeholder="Abogado">
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-success">Guardar cambios</button>
        <button type="button" class="btn">Cancelar</button>
    </div>
</form>
</div>
</body>
</html>