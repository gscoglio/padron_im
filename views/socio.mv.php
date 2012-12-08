<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include_once 'header.php' ?>
    <body>
        <script type="text/javascript">
        function deleteSocio(socio)
        {
            var answer = confirm("Seguro que queres borrar este socio?")
            if (answer){
                window.location = "delete.php?socio=" + socio;
            }
        }
        </script>
        <?php include_once 'navigation_bar.php' ?>
        <div class="container">
            <div class="page-header">
                <h1><?= $socio['nombre'] . " " . $socio['apellido']?><small> (<?= $socio['socio_nro'] ?>)</small></h1>
            </div>
            <div class="row" >
                <div class="span4" >
                    <h3><small>N&uacute;mero de Socio: </small><?= $socio['socio_nro'] ?></h3>
                </div>
                <div class="span4" >
                    <h3><small>Socio CAI: </small><?= $socio['socio_cai'] ?></h3>
                </div>
                <div class="span4" >
                    <h3><small>Sexo: </small><?= $socio['sexo'] ?></h3>
                </div>
            </div>
            <div class="row" >
                <div class="span4" >
                    <h3><small>Categor&iacute;a: </small><?= $socio['categoria'] ?></h3>
                </div>
                <div class="span4" >
                    <h3><small>DNI: </small><?= $socio['dni'] ?></h3>
                </div>
                <div class="span4" >
                    <h3><small>Fecha de afiliacion: </small><?= $socio['fecha_afiliacion'] ?></h3>
                </div>
            </div>
            <div class="row" >
                <div class="span4" >
                    <h3><small>Tel&eacute;fono celular: </small><?= $socio['tel_celular'] ?></h3>
                </div>
                <div class="span4" >
                    <h3><small>Tel&eacute;fono particular: </small><?= $socio['tel_particular'] ?></h3>
                </div>
                <div class="span4" >
                    <h3><small>Tel&eacute;fono laboral: </small><?= $socio['tel_laboral'] ?></h3>
                </div>
            </div>
            <div class="row" >
                <div class="span6" >
                    <h3><small>E-mail: </small><?= $socio['email'] ?></h3>
                </div>
                <div class="span6" >
                    <h3><small>Presentado por: </small><?= $socio['presentado_por'] ?></h3>
                </div>
            </div>
            <div class="row" >
                <div class="span6" >
                    <h3><small>Domicilio: </small><?= $socio['domicilio'] ?></h3>
                </div>
                <div class="span6" >
                    <h3><small>Localidad: </small><?= $socio['localidad'] ?></h3>
                </div>
            </div>
            <div class="row" >
                <div class="span6" >
                    <h3><small>C&oacute;digo postal: </small><?= $socio['codigo_postal'] ?></h3>
                </div>
                <div class="span6" >
                    <h3><small>Barrio / Zona: </small><?= $socio['barrio_zona'] ?></h3>
                </div>
            </div>
            <div class="row" >
                <div class="span6" >
                    <h3><small>Ocupaci&oacute;n: </small><?= $socio['ocupacion'] ?></h3>
                </div>
                <div class="span6" >
                    <h3><small>Ultima cuota paga: </small><?= $socio['ultima_cuota'] ?></h3>
                </div>
            </div>
            <br />
            <div class="row" >
                <div class="span10" >
                    <p>
                        <a class="btn" type="button" href=<?= $returnTo ?>>Volver</a>
                        <button class="btn btn-primary" type="button">Editar socio</button>
                    </p>
                </div>
                <div class="span2" >
                    <p>
                        <button class="btn btn-danger" onclick="deleteSocio(<?= $socio['socio_nro'] ?>);" value="Borrar socio" type="button">Borrar socio</button>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>