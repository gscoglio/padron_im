<?php 
include_once 'controllers/socios.mc.php';

$view = new Socios();
$socios = $view->getSociosPerPage($page, $amount, $where);
if (!empty($socios)) {
?>
<div class="container">    
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
            </tr>
        </thead>
        <tbody>
            <?php             
            foreach ($socios as $socio) {
            ?>
                <tr onClick="document.location.href='socio.php?id=<?= $socio['socio_id'] ?>';" style="cursor:pointer;cursor:hand">
                    <td><?= $socio['socio_nro'] ?></td>
                    <td><?= $socio['socio_cai'] ?></td>
                    <td><?= $socio['apellido'] ?></td>
                    <td><?= $socio['nombre'] ?></td>
                    <td><?= $socio['sexo'] ?></td>
                    <td><?= $socio['categoria'] ?></td>
                    <td><?= $socio['dni'] ?></td>
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