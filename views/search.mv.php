<div class="container">
    <div class="row">
        <div class="span7 offset5">
            <form action="search.php" method="post" class="form-search">
                <select name="searchCriteria">
                    <option <?= selected('apellido')?>>Apellido</option>
                    <option <?= selected('nombre')?>>Nombre</option>
                    <option <?= selected('socio_nro')?>>Socio IM</option>
                    <option <?= selected('socio_cai')?>>Socio CAI</option>
                    <option <?= selected('dni')?>>DNI</option>
                </select>
                <div class="input-append">    
                    <input type="text" name="searchText" class="search-query" value="<?= searchText() ?>"/>
                    <button type="submit" class="btn">Buscar</button>
                </div>
            </form>
        </div>
    </div>    
</div>   