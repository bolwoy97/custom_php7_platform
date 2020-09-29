<? $p_header=$lng['txt178']; ?>

<?require_once(ROOT.'/views/layouts/head.php');?>

<body>

    <?require_once(ROOT.'/views/layouts/sidebar.php');?>

    <div class="content">

        <?require_once(ROOT.'/views/layouts/header.php');?>

        <div class="grid">
            <div class="sections sections4">
                
            <!-- --><a href="unactive_partner" class="submit">Неактивные партнеры...</a> 
                <section class="table last-operations">
                    <div class="head">
                        <div class="title"><img src="/assets/img/menu/partners.svg" alt="">
                            <? $sponsor=User::getUserInfo($user['sponsor'])?>
                            <?= $lng['txt178'] ?> <small><b>/Спонсор: <?=$sponsor['login']?> Контакт:
                                    <?=$sponsor['contact']?></b></small> </div>
                        <!-- <a href="#" class="view-all">Calendar <img src="/assets/img/calendar.svg" alt=""></a>-->

                        <input type="text" id="searchInput" oninput="setSearc()" placeholder="Search.."
                            title="Search..">
                    </div>
                    <div class="head">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" onclick="setPage(0)" id="firstPage">1</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#" id="prevPage">&laquo;</a></li>

                                <li class="page-item active"><a class="page-link" href="#" id="curPage">1</a></li>

                                <li class="page-item"><a class="page-link" href="#" id="nextPage">&raquo;</a></li>

                                <li class="page-item">
                                    <a class="page-link" href="#" id="lastPage">
                                        2
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <?//Views::render('/layouts/pagination.php',['route'=>'partners','pagin'=>$Pagin]);?>
                    </div>

                    <table cellpadding='0' cellspacing='0' id="sortTable1">
                        <thead>
                            <tr>
                                <th><?= $lng['txt137'] ?></th>
                                <th>Login </th>
                                <th>Контакт</th>
                                <th><?= $lng['txt143'] ?></th>
                                <th>GRD</th>
                                <th>Sponsor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?foreach($lUsers as $lUsr){

                                if($lUsr['usd_to_tok_sum']>0){?>
                            <tr>
                                <td><?=$lUsr['date']?></td>
                                <td class="green bold"><?=$lUsr['login']?></td>
                                <td><?=$lUsr['contact']?></td>
                                <td class="bold">LVL <?=$lUsr['lvl']?></td>
                                <td class="green"><?=$lUsr['TOKbalance']?> GRD</td>
                                <td class="green"><?=$lUsr['sponsorLogin']?></td>
                            </tr>
                            <?}
                        }?>

                        </tbody>
                    </table>

                </section>
            </div>
        </div>
    </div>



    <div class="milk-shadow"></div>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/script.js"></script>
    <script src="/assets/js/owl.carousel.min.js"></script>
    <script src="/assets/js/jquery.magnific-popup.js"></script>

    <?require_once(ROOT.'/views/scripts/tables.php');?>
    <script>
    perPage = 10;
    initTable('sortTable1');
    paginateTable();
    </script>

</body>

</html>