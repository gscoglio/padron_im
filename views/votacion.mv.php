<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Votaci&oacute;n Autoridades Independiente M&iacute;stico</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
    <div style="display: none;">
    <?php
        foreach ($candidatos as $candidato) {
    ?>
        <img alt="" src="img/fotos/<?= $candidato['socio_nro'] ?>.jpg" width="1" height="1" border="0"/>
    <?php  
        }
    ?>
    </div>
    <form id="vote" name="vote" action="votacion.php" method="post">
    <div class="container">
        <div class="page-header">
            <div class="row">
                <div class="span10">
                    <h1>Independiente M&iacute;stico <small>Elecci&oacute;n online de autoridades</small></h1>
                </div>
                <div class="span2">
                    <p>
                        <a class="btn btn-link" href="logout.php" type="button" style="float: right; margin-top: 10px;"><i class="icon-off"></i> Log out</a>
                    </p>
                </div>
            </div>
        </div>
        <?php if (isset($_GET['error']) && $_GET['error'] == 'maxVotes') {
            ?><div>
                <div class="alert alert-error">
                No puede votar a mas de 11 candidatos! Realice su voto nuevamente.
                </div>
            </div>
        <?php
        }?>
        
    <dl>
        <dt>&iquest;Qu&eacute; se vota?</dt>
        <dd>Se votan los vocales de la Agrupaci&oacute;n Independiente M&iacute;stico para el pr&oacute;ximo a&ntilde;o de mandato.</dd>
        <dt>&iquest;Se vota presidente y vicepresidente de la agrupaci&oacute;n?</dt>
        <dd>No. Ya fueron seleccionados. Se votan los vocales que los van a acompa&ntilde;ar.</dd>
        <dt>&iquest;Cu&aacute;ntos vocales tengo que votar?</dt>
        <dd>11. Pero si as&iacute; lo desea puede votar a una menor cantidad.</dd>
        <dt>&iquest;Cu&aacute;ntas veces puedo votar?</dt>
        <dd>1 (UNA). Sin excepci&oacute;n. No importa si solo selecciona 1 candidato la primera vez. Ese ser&aacute; su voto.</dd>
    </dl>
        <h2>Ahora s&iacute;, ya puede elegir a sus candidatos:</h2>
        <div class="row">
            <div class="span6">
                <p class="lead">Seleccione sus once:</p>
            </div>
            <div class="span6">
                <p id="seleccionados" class="lead text-info"></p>
            </div>
        </div>
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
                    <div id="div<?= $candidatos[($index*3)+$index1]['socio_id'] ?>" class="span4" onmouseover="function2(<?= $candidatos[($index*3)+$index1]['socio_id'] ?>);" onmouseout="function3(<?= $candidatos[($index*3)+$index1]['socio_id'] ?>);" data-placement="top" data-html="true" data-content='<a class="thumbnail"><img src="img/fotos/<?= $candidatos[($index*3)+$index1]['socio_nro'] ?>.jpg"></a>' data-original-title="<?= $candidatos[($index*3)+$index1]['apellido'] . ", " . $candidatos[($index*3)+$index1]['nombre']?>">
                        <label class="checkbox">
                            <input onclick="function1(<?= $candidatos[($index*3)+$index1]['socio_id'] ?>);" type="checkbox" id="check<?= $candidatos[($index*3)+$index1]['socio_id'] ?>" name="<?= $candidatos[($index*3)+$index1]['socio_id'] ?>" value=""><?= $candidatos[($index*3)+$index1]['apellido'] . ", " . $candidatos[($index*3)+$index1]['nombre'] . " (" . $candidatos[($index*3)+$index1]['socio_nro'] . ")" ?></input>
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
        <br/>
        <div class="row">
            <div class="offset4">
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
                        <li id="li<?= $candidato['socio_id'] ?>" style="display: none;"><strong><?= $candidato['apellido'] . ", " . $candidato['nombre'] . " (" . $candidato['socio_nro'] . ")" ?></strong></li>
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
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        function function1(id) {

            var checkId = '#check' + id;
            var liId = '#li' + id;
            var cantidadSeleccionados = $("input:checked").length;
               
            $("#seleccionados").text("Ya tiene " + cantidadSeleccionados + (cantidadSeleccionados <= 1 ? " candidato seleccionado" : " candidatos seleccionados"));
            
            if (cantidadSeleccionados > 11) {
                $(checkId).attr('checked', false);
                cantidadSeleccionados = $("input:checked").length;
                $("#seleccionados").text("Ya tiene " + cantidadSeleccionados + (cantidadSeleccionados <= 1 ? " candidato seleccionado" : " candidatos seleccionados"));
                alert("No puede seleccionar mas candidatos. Ya tiene 11.");
            }        

            if ($(checkId).attr('checked')) {
                $(liId).show();
            } else {
                $(liId).hide();
            }
           
        }
        
        function function2(id) {
            var divId = '#div' + id;
            $(divId).popover('show');
        }
        
        function function3(id) {
            var divId = '#div' + id;
            $(divId).popover('hide');
        }
    </script>
    
</body>
</html>