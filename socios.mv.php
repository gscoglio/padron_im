<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Padron Independiente Mistico</title>
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
<?php include_once 'socios.mc.php' ?>
</head>
<body>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<?php include_once 'navigation_bar.php' ?>
<table class="table table-bordered table-hover table-striped table-condensed" summary="Padron IM">
    <thead>
    	<tr>
            <th scope="col">Socio IM</th>
            <th scope="col">Socio CAI</th>
            <th scope="col">Apellido</th>
            <th scope="col">Nombre</th>
            <th scope="col">Sexo</th>
            <th scope="col">Categoria</th>
            <th scope="col">DNI</th>
            <th scope="col">Telefono celular</th>
            <th scope="col">Telefono particular</th>
            <th scope="col">Telefono laboral</th>
            <th scope="col">E-mail</th>
            <th scope="col">Fecha de afiliacion</th>
            <th scope="col">Presentado por</th>
            <th scope="col">Domicilio</th>
            <th scope="col">Localidad</th>
            <th scope="col">Codigo postal</th>
            <th scope="col">Barrio / Zona</th>
            <th scope="col">Ocupacion</th>
            <th scope="col">Comentarios</th>     
        </tr>
    </thead>
    <tbody>
        <?php 
        $view = new Socios();
        $socios = $view->getSociosPerPage($page, $amount);
        if (!empty($socios)) {
            foreach ($socios as $socio) {
            ?>
            <tr>
                <td><?= $socio['socio_nro'] ?></td>
                <td><?= $socio['socio_cai'] ?></td>
                <td><?= $socio['apellido'] ?></td>
                <td><?= $socio['nombre'] ?></td>
                <td><?= $socio['sexo'] ?></td>
                <td><?= $socio['categoria'] ?></td>
                <td><?= $socio['dni'] ?></td>
                <td><?= $socio['tel_celular'] ?></td>
                <td><?= $socio['tel_particular'] ?></td>
                <td><?= $socio['tel_laboral'] ?></td>
                <td><?= $socio['email'] ?></td>
                <td><?= $socio['fecha_afiliacion'] ?></td>
                <td><?= $socio['presentado_por'] ?></td>
                <td><?= $socio['domicilio'] ?></td>
                <td><?= $socio['localidad'] ?></td>
                <td><?= $socio['codigo_postal'] ?></td>
                <td><?= $socio['barrio_zona'] ?></td>
                <td><?= $socio['ocupacion'] ?></td>
                <td><?= $socio['extra_comments'] ?></td>
            </tr>
            <?php
            }
        }
        ?>
    </tbody>
</table>
<?php include_once 'paginator.php' ?>
</body>
</html>