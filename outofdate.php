<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Votaci&oacute;n Autoridades Independiente M&iacute;stico</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/> 
    <script type="text/javascript" src="bootstrap/js/jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <?php include_once 'controllers/outofdate.mc.php'; ?>
</head>
<body>
    <div class="container">
        <div class="hero-unit" style="margin-top: 20px">
            <div class="row">
                <div class="span7">
                    <h1>Votaci&oacute;n no disponible!</h1>
                    <br/>
                    <p>La elecci&oacute;n estar&aacute; disponible en las siguientes fechas:</p>
                    <p>Comienzo:<strong> <?= $desde ?></strong></p>
                    <p>Fin:<strong> <?= $hasta ?></strong></p>
                </div>
                <div class="span3">
                    <img src="img/reloj.png" class="img-rounded"></img>
                </div>
            </div>
            <div class="row">
                <div class="span3">
                    <a class="btn btn-link" href="logout.php" type="button"><i class="icon-off"></i> Log out</a>
                </div>
                <div class="span3">
                    <a class="btn btn-link" href="votacion.php" type="button"><i class="icon-refresh"></i> Volver a intentar</a>
                </div>
            </div>
        </div>
    </div>
</body>