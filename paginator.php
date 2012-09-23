<div class="container">
    <div class="pagination">
        <ul>
            <?php                 
                $pages = $view->getAmountOfPages($amount, $where);
                if($page > 1) {
            ?>
                <li><a href="?page=<?= ($page - 1) . $paginatorSearch ?>"><< Previous</a></li>
            <?php
                }

                for ($index = 3; $index > 0; $index--) {
                    $pageToShow = $page - $index;
                    if ($pageToShow > 0) {
                        ?>
                        <li><a href="?page=<?= $pageToShow . $paginatorSearch ?>"><?= $pageToShow ?></a></li>
                        <?php    
                    }    
                }

                for ($index = 0; $index < 3; $index++) {
                    $pageToShow = $page + ($index + 1);
                    if ($pageToShow <= $pages) {
                        ?>
                        <li><a href="?page=<?= $pageToShow . $paginatorSearch ?>"><?= $pageToShow ?></a></li>
                        <?php    
                    }    
                }
                if ($page != $pages && $pages > 0) {
            ?>
            <li><a href="?page=<?= ($page + 1) . $paginatorSearch ?>">Next >></a></li>
            <?php
                }
            ?>
        </ul>
    </div>
</div>