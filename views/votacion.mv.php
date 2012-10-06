<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Votaci&oacute;n Autoridades Independiente M&iacute;stico</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/> 
    <script type="text/javascript">
        function function1(id) {
            #var checkId = 'check' + id;
            #alert(checkId.checked);
        }
    </script>
</head>
<body>
    <form name="vote" action="votacion.php" method="post">
    <div class="container">
        <div class="page-header">
            <h1>Independiente M&iacute;stico <small>Elecci&oacute;n online de autoridades</small></h1>
        </div>
<p class="lead">Algunas consideraciones antes de elegir:</p>
    <dl>
        <dt>&iquest;Qu&eacute; se vota?</dt>
        <dd>Se votan los vocales de la Agrupaci&oacute;n Independiente M&iacute;stico para el pr&oacute;ximo a&ntilde;o de mandato.</dd>
        <dt>&iquest;Se vota presidente y vicepresidente de la agrupaci&oacute;n?</dt>
        <dd>No. Ya fueron seleccionados. Se votan los vocales que los van a acompa&ntilde;ar.</dd>
        <dt>&iquest;Cu&aacute;ntos vocales tengo que votar?</dt>
        <dd>11. Pero si as&iacute; lo desee puede votar a una menor cantidad.</dd>
        <dt>&iquest;Cu&aacute;ntas veces puedo votar?</dt>
        <dd>1 (UNA). Sin excepci&oacute;n. No importa si solo seleccion&eacute; a 1 candidato la primera vez. Ese ser&aacute; su voto.</dd>
    </dl>
        <h2>Ahora s&iacute;, ya puede elegir a sus candidatos:</h2>
        <p class="lead">Seleccione sus once:</p>
        <?php       
        $candidatosCount = count($candidatos);        
        $divs = ceil($candidatosCount / 3);
        
        for ($index = 0; $index < $divs; $index++) {
            ?>
            <div class="row">
            <?php
            
            for ($index1 = 0; $index1 < 3; $index1++) {
                if(isset($candidatos[($index*3)+$index1])){
                    ?>        
                    <div class="span4">
                        <label class="checkbox">
                            <input onclick="function1(<?= $candidatos[($index*3)+$index1]['socio_id'] ?>);" type="checkbox" id="check<?= $candidatos[($index*3)+$index1]['socio_id'] ?>" name="<?= $candidatos[($index*3)+$index1]['socio_id'] ?>" value=""><?= $candidatos[($index*3)+$index1]['apellido'] . ", " . $candidatos[($index*3)+$index1]['nombre'] ?></input>
                        </label>
                    </div>
                    <?php
                }
            }
            
            ?>
            </div>
            <?php            
        }
        ?>
        <div class="row">
            <div class="offset3">
                <button  class="btn btn-success btn-large" type="button" data-toggle="modal" data-target="#myModal">ELIJO a los candidatos seleccionados</button>             
            </div>
        </div>        
    </div>
    <div class="modal hide fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;" >
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 id="myModalLabel">Confirme su voto</h3>
        </div>
        <div class="modal-body">
            <p class="lead">Estos son sus elegidos:</p>
            <ul>
                <?php
                    foreach ($candidatos as $candidato) {
                        ?>
                        <li id="li<?= $candidato['socio_id'] ?>" style="display: none;"><strong><?= $candidato['apellido'] . ", " . $candidato['nombre'] ?></strong></li>
                        <?php
                    }
                ?>
            </ul>
            <br/>
            <dl>
                <dt>&iquest;Est&aacute; seguro?</dt>
                <dd>Su confirmaci&oacute;n no tendr&aacute; vuelta atr&aacute;s</dd>
            </dl>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Volver</button>
            <button class="btn btn-success" type="submit">Confirmo mi voto</button>
        </div>
    </div>
    </form>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    
</body>
</html>