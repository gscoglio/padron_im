<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include_once 'header.php' ?>
    <body>
        <script type="text/javascript" src="js/validateDelete.js" ></script>
        <?php include_once 'navigation_bar.php';
        if ($socio){
        ?>
        <div class="container">
            <div class="page-header">
                <h1><?= $socio['nombre'] . " " . $socio['apellido']?><small> (<?= $socio['socio_nro'] ?>)</small></h1>
            </div>
            <div class="row" >
                <div class="span4" >
                    <h4><small>N&uacute;mero de Socio: </small><?= $socio['socio_nro'] ?></h4>
                </div>
                <div class="span4" >
                    <h4><small>Socio CAI: </small><?= $socio['socio_cai'] ?></h4>
                </div>
                <div class="span4" >
                    <h4><small>Sexo: </small><?= $socio['sexo'] ?></h4>
                </div>
            </div>
            <div class="row" >
                <div class="span4" >
                    <h4><small>Categor&iacute;a: </small><?= $socio['categoria'] ?></h4>
                </div>
                <div class="span4" >
                    <h4><small>DNI: </small><?= $socio['dni'] ?></h4>
                </div>
                <div class="span4" >
                    <h4><small>Fecha de afiliacion: </small><?= $socio['fecha_afiliacion'] ?></h4>
                </div>
            </div>
            <div class="row" >
                <div class="span4" >
                    <h4><small>Tel&eacute;fono celular: </small><?= $socio['tel_celular'] ?></h4>
                </div>
                <div class="span4" >
                    <h4><small>Tel&eacute;fono particular: </small><?= $socio['tel_particular'] ?></h4>
                </div>
                <div class="span4" >
                    <h4><small>Tel&eacute;fono laboral: </small><?= $socio['tel_laboral'] ?></h4>
                </div>
            </div>
            <div class="row" >
                <div class="span4" >
                    <h4><small>Fecha de nacimiento: </small><?= $socio['fecha_nacimiento'] ?></h4>
                </div>
            </div>
            <div class="row" >
                <div class="span6" >
                    <h4><small>E-mail: </small><?= $socio['email'] ?></h4>
                </div>
                <div class="span6" >
                    <h4><small>Presentado por: </small><?= $socio['presentado_por'] ?></h4>
                </div>
            </div>
            <div class="row" >
                <div class="span6" >
                    <h4><small>Domicilio: </small><?= $socio['domicilio'] ?></h4>
                </div>
                <div class="span6" >
                    <h4><small>Localidad: </small><?= $socio['localidad'] ?></h4>
                </div>
            </div>
            <div class="row" >
                <div class="span6" >
                    <h4><small>C&oacute;digo postal: </small><?= $socio['codigo_postal'] ?></h4>
                </div>
                <div class="span6" >
                    <h4><small>Barrio / Zona: </small><?= $socio['barrio_zona'] ?></h4>
                </div>
            </div>
            <div class="row" >
                <div class="span6" >
                    <h4><small>Ocupaci&oacute;n: </small><?= $socio['ocupacion'] ?></h4>
                </div>
                <div class="span6" >
                    <h4><small>Ultima cuota paga: </small><?= $socio['ultima_cuota'] ?></h4>
                </div>
            </div>
            <div class="row" >
                <div class="span4" >
                    <h4><small>Medio de pago: </small><?= $socio['medio_pago'] ?></h4>
                </div>
                <div class="span4" >
                    <h4><small>Tipo de tarjeta: </small><?= $socio['tarjeta_tipo'] ?></h4>
                </div>
                <div class="span4" >
                    <h4><small>Nro de tarjeta: </small><?= $socio['tarjeta_nro'] ?></h4>
                </div>
            </div>
            <br />
            <div class="row" >
                <div class="span10" >
                    <p>
                        <a class="btn" type="button" href=<?= $returnTo ?>>Volver</a>
                        <a class="btn btn-primary" type="button" href="altas.php?socio_nro=<?=$socio['socio_nro']?>">Editar socio</a>
                    </p>
                </div>
                <div class="span2" >
                    <p>
                        <button class="btn btn-danger" onclick="deleteSocio(<?= $socio['socio_nro'] ?>, 'socio');" value="Borrar socio" type="button">Borrar socio</button>
                    </p>
                </div>
            </div>
        </div>
        <?php } else {
        ?>    
            <div class="container">
                <div class="alert alert-error" style="margin-top: 20px">
                El socio seleccionado no existe.
                </div>
                <div class="row" >
                    <div class="span10" >
                        <p>
                            <a class="btn" type="button" href=<?= $returnTo ?>>Volver</a>
                        </p>
                    </div>
                </div>
            </div>
        <?php    
        } ?>
    </body>
</html>