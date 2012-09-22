<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include_once 'header.php' ?>
<body>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<?php include_once 'navigation_bar.php' ?>
<div class="row">
<div class="span12">
<form class="form-horizontal">
    <div class="offset1 control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">Socio CAI</span><input class="span5" id="nsocio" size="16" type="text" placeholder="21100">
        </div>
    </div>
    <div class="offset1 control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">Apellido</span><input class="span5" id="lastname" size="16" type="text" placeholder="Scoglio">
        </div>
    </div>
    <div class="offset1 control-group">
        <div class="input-prepend">
            <span class="add-on formLabel">Nombre</span><input class="span5" id="firstname" size="16" type="text" placeholder="Pablo">
        </div>
    </div>
    <div class="offset1 control-group">
        <label class="radio inline">
            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
            Hombre
        </label>
        <label class="radio inline">
            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
            Mujer
        </label>
    </div>
    <div class="offset1 control-group">
        <select>
            <option>Fundador</option>
            <option>Activo</option>
        </select>
    </div>
    <div class="offset1 control-group">
        <div class="input-prepend inline">
            <span class="add-on">DNI</span><input class="span3" id="dni" size="16" type="text" placeholder="32655993">
        </div>
        <div class="input-prepend inline">
            <span class="add-on">Telefono celular</span><input class="span3" id="telcel" size="16" type="text" placeholder="1567899098">
        </div>
    </div>
    <div class="offset1 control-group">
    <div class="input-prepend inline">
        <span class="add-on">Telefono particular</span><input class="span3" id="telpar" size="16" type="text" placeholder="1567899098">
    </div>
    <div class="input-prepend inline">
        <span class="add-on">Telefono laboral</span><input class="span3" id="tellaboral" size="16" type="text" placeholder="1567899098">
    </div>
    </div>
    <div class="offset1 control-group">
    <div class="input-prepend">
        <span class="add-on formLabel">Email</span><input class="span5" id="email" size="16" type="text" placeholder="pabloscoglio@gmail.com">
    </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-success">Guardar cambios</button>
        <button type="button" class="btn">Cancelar</button>
    </div>
</form>
</div>
</div>
</body>
</html>
