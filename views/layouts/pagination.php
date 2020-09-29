<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?if($data['pagin']->page > 0){?>
        <li class="page-item">
            <a class="page-link" href="/<?=$data['route']?>" aria-label="Previous">
                1
            </a>
        </li>
        <li class="page-item"><a class="page-link" href="/<?=$data['route']?>?page=<?=$data['pagin']->page-1?>">&laquo;</a></li>
        <?}?>
        <li class="page-item active"><a class="page-link" href="#"><?=$data['pagin']->page+1?></a></li>
        <?if($data['pagin']->page < $data['pagin']->pages){?>
        <li class="page-item"><a class="page-link" href="/<?=$data['route']?>?page=<?=$data['pagin']->page+1?>">&raquo;</a></li>

        <li class="page-item">
            <a class="page-link" href="/<?=$data['route']?>?page=<?=$data['pagin']->pages?>" aria-label="Next">
                <?=$data['pagin']->pages+1?>
            </a>
        </li>
        <?}?>
    </ul>
</nav>