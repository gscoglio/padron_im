<?php 
include_once 'controllers/socios.mc.php';

$view = new Socios();
$socios = $view->getSociosPerPage($page, $amount, $where);
if (!empty($socios)) {
?>
<script type="text/javascript" src="js/validateDelete.js" ></script>
<div class="container">    
    <table class="table table-bordered table-hover table-striped table-condensed" summary="Padron IM">
        <thead>
            <tr>
                <th scope="col" style="text-align:center">Socio IM</th>
                <th scope="col" style="text-align:center">Socio CAI</th>
                <th scope="col" style="text-align:center">Apellido</th>
                <th scope="col" style="text-align:center">Nombre</th>
                <th scope="col" style="text-align:center">Sexo</th>
                <th scope="col" style="text-align:center">Categoria</th>
                <th scope="col" style="text-align:center">DNI</th>
                <th scope="col" style="font-size:10px;text-align:center" >Acciones</th>  
            </tr>
        </thead>
        <tbody>
            <?php             
            foreach ($socios as $socio) {
            ?>
                <tr>
                    <td onClick="document.location.href='socio.php?id=<?= $socio['socio_id'] ?>';" style="cursor:pointer;cursor:hand"><?= $socio['socio_nro'] ?></td>
                    <td onClick="document.location.href='socio.php?id=<?= $socio['socio_id'] ?>';" style="cursor:pointer;cursor:hand"><?= $socio['socio_cai'] ?></td>
                    <td onClick="document.location.href='socio.php?id=<?= $socio['socio_id'] ?>';" style="cursor:pointer;cursor:hand"><?= $socio['apellido'] ?></td>
                    <td onClick="document.location.href='socio.php?id=<?= $socio['socio_id'] ?>';" style="cursor:pointer;cursor:hand"><?= $socio['nombre'] ?></td>
                    <td onClick="document.location.href='socio.php?id=<?= $socio['socio_id'] ?>';" style="cursor:pointer;cursor:hand"><?= $socio['sexo'] ?></td>
                    <td onClick="document.location.href='socio.php?id=<?= $socio['socio_id'] ?>';" style="cursor:pointer;cursor:hand"><?= $socio['categoria'] ?></td>
                    <td onClick="document.location.href='socio.php?id=<?= $socio['socio_id'] ?>';" style="cursor:pointer;cursor:hand"><?= $socio['dni'] ?></td>
                    <td style="text-align:center" ><a type="button" href="altas.php?socio_nro=<?= $socio['socio_nro'] ?>" ><i style="cursor:pointer;cursor:hand;" class="icon-edit"></i></a><a type="button"><i onclick="deleteSocio(<?= $socio['socio_nro'] ?>, 'socio');" style="cursor:pointer;cursor:hand;" class="icon-remove"></i></a></td>
                </tr>
            <?php
            }
} else {
            ?>
    <div class="container alert alert-info">
    No hay resultados para su b&uacute;squeda
    </div>
            <?php
}
            ?>
        </tbody>
    </table>
</div>