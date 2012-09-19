<div class="row">
    <div class="span11 offset1">
        <div class="pagination">
            <ul>
                <?php 
                    $pages = $view->getAmountOfPages($amount, $where);
                    if($page == 1) {
                ?>
                    <li><a><< Previous</a></li>
                <?php
                    } else {
                ?>
                    <li><a href="?page=<?= $page - 1 ?>"><< Previous</a></li>
                <?php
                    }

                    for ($index = 3; $index > 0; $index--) {
                        $pageToShow = $page - $index;
                        if ($pageToShow > 0) {
                            ?>
                            <li><a href="?page=<?= $pageToShow ?>"><?= $pageToShow ?></a></li>
                            <?php    
                        }    
                    }

                ?>
                    <li><a><?= $page ?></a></li>
                <?php 
                    for ($index = 0; $index < 3; $index++) {
                        $pageToShow = $page + ($index + 1);
                        if ($pageToShow <= $pages) {
                            ?>
                            <li><a href="?page=<?= $pageToShow ?>"><?= $pageToShow ?></a></li>
                            <?php    
                        }    
                    }

                    if ($page != $pages) {
                ?>
                <li><a href="?page=<?= $page + 1 ?>">Next >></a></li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </div>
</div>