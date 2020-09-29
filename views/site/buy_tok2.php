<?$pn='tok2'?>
<?$p_header=$lng['txt175'];?>

<?require_once(ROOT.'/views/layouts/head.php');?>

<body>

    <?require_once(ROOT.'/views/layouts/sidebar.php');?>

    <div class="content">

        <?require_once(ROOT.'/views/layouts/header.php');?>

        <? require_once(ROOT.'/views/layouts/messages.php');?>

        <div class="banners owl-carousel owl-theme">
            <div class="banner first tok2_1">
                <div class="head">
                    <div>
                        <div class="descr"><?=$lng['txt126']?></div>
                        <div class="coin"><?=round($user['TOK_2balance'],2)?> GRD</div>
                        <div class="white">Зарезервировано</div>
                    </div>

                    <div>
                        <img src="/assets/img/banner1.svg" alt="">
                    </div>
                </div>
                <div class="flex">
                    <div class="item">
                        <div class="title"><?=round($user['TOK_2balance']*2,2)?> USD</div>
                        <!-- round($Accrs['tok'],2) -->
                        <div class="small"><?=$lng['txt128']?></div>
                    </div>

                </div>
            </div>

            <div class="banner tok2_2">
                <div class="head">
                    <div>
                        <div class="descr"><?=$lng['txt130']?> USD</div>
                        <div class="coin"><?= round($user['balance'],2)?> USD </div>
                        <div class="white"><?=$lng['txt131']?></div>
                    </div>

                    <div>
                        <img src="/assets/img/banner2.svg" alt="">
                    </div>
                </div>

                <div class="flex">

                    <div class="item">
                        <div class="title"><?=round($user['bonus'],2)?> USD</div>
                        <div class="small"><?=$lng['txt129']?></div>
                    </div>

                </div>
            </div>


            <div class="banner last">
                <img src="/assets/img/banner3.svg" style="height:60%;" alt="">

                <div class="descr"> <?=$lng['txt132']?> <?=$Stage['num']+1?></div>
                <div class="coin">1 GRD = <?=$tokPrice?> USD</div>
                <?if($tok2_goal>0){?>
               <!-- <div class="coin">Токенов осталось = <?=round($tok2_goal,2)?> GRD</div>
                <div class="coin">Токенов доступно: <?=round($user['tok2OneHand'],2)?> GRD</div>-->
                <?}?>

            </div>
        </div>

        <div class="grid">

            <div class="sections">
                <div class="sidebar">
                    <div class="box">
                        <div class="title">Держатели токенов</div>

                        <div class="descr">
                            Долгосрочная стратегия инвестирования в токены-акции компани Grid Group и она будет
                            максимально выгодная держателем токенов (токенхолдерам). Мы объявляем еще об одном
                            дополнении для всех тех партнеров кто с самого начала определил для себя
                            долгосрочную стратегию. Мы приготовили дополнительные бонусы и возможности.
                            Мы открываем вам возможность постоянно докупать токены по специальной цене это
                            может быть на 20%-50% выгоднее. В течении всего этапа PreSale вы сможете получать
                            специальную цену за токен. Единственное ограничение баланс этих токенов будет
                            заморожен до окончания PreSale.
                            Продать эти токены можно будет только при старте основной платформы по стоимости 2$.
                        </div>


                    </div>
                </div>
                <section class="table last-operations">
                    <div class="head">
                        <div class="title"><img src="/assets/img/last-operations.svg" alt="">
                            <?=$lng['txt133']?></div>

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
                                <th><?=$lng['txt135']?></th>
                                <th><?=$lng['txt136']?></th>
                                <th><?=$lng['txt137']?></th>
                                <th><?=$lng['txt138']?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <? 
                            foreach($comb_jor as $jor){?>
                            <tr>
                                <td><?=$jor['operation']?></td>
                                <td class="green"><?=$jor['amount']?></td>
                                <td><?=$jor['date']?></td>
                                <td class="complete" title="<?=$jor['coment']?>">
                                <img src="/assets/img/<?=$jor['status_img']?>" alt=""><?=$jor['status_show']?></td>
                               
                                
                            </tr>
                            <?}?>


                        </tbody>
                    </table>

                </section>


            </div>

            <div class="sidebar">
                <div class="box">

                    <?if($tok2_goal>0){?>
                    <div class="title"><?=$lng['txt146']?></div>
                    <div class="item">
                        <input type="number" min="0" placeholder="USD" value="" id="usd_to_tok_inp"
                            oninput="usd_to_tok_count();">
                        <span class="green">= <b id="usd_to_tok_res">0</b> GRD</span>
                        <a class="popup-modal" href="#TOK-tokens"><?=$lng['txt147']?></a>
                    </div>
                    <?}?>
                    <!--<div class="title"><?=$lng['txt148']?></div>
                    <div class="item">
                        <input style="width:50%;" type="number" min="0" placeholder="USD" id="sum-addition" name="sum">
                        <select style="width:50%;" id="add_select" class="custom-select" name="cur">
                            <option value="btc" selected>BTC </option>
                            <option value="eth">ETH</option>
                            <option value="usdt_erc20">USDT.ERC20</option>
                            <option value="usd">USD</option>
                            <option value="fchange">Fchange</option>
                        </select>
                        <a onclick="getAddition();" class="popup-modal" href="#USD-balance"><?=$lng['txt149']?></a>

                    </div>-->
                    <!--==============================================-->
                    <?
                        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
                        $callback_url =  $protocol.$_SERVER['HTTP_HOST'].'/usdpayment';
                       //U20037827
                       //U20835766
                       ?>
                    <form id="perf_form" role="form" action="https://perfectmoney.com/api/step1.asp" method="POST">

                        <input type="hidden" name="PAYEE_ACCOUNT" value="U9538241">
                        <input type="hidden" name="PAYEE_NAME" value="Grid Group">
                        <input type="hidden" name="PAYMENT_UNITS" value="USD">
                        <input type="hidden" name="STATUS_URL" value="<?echo $callback_url ;?>">
                        <input type="hidden" name="PAYMENT_URL"
                            value="<?echo $protocol. $_SERVER['HTTP_HOST'] .'/wallet';?>">
                        <input type="hidden" name="NOPAYMENT_URL"
                            value="<?echo $protocol. $_SERVER['HTTP_HOST'] .'/wallet';?>">
                        <input type="hidden" name="PAYMENT_ID" value="<?echo $_SESSION['userId'];?>">
                        <input id="perf_sum" name="PAYMENT_AMOUNT" type="hidden">

                    </form>
                    <!--==============================================-->

                </div>

                <div class="box">
                    <div class="title"><?=$lng['txt152']?></div>

                    <div class="slider-head">
                        <div>
                            <div class="title"><?=$lng['txt153']?></div>
                            <div class="num"><?= round($Stage['sum'],2)?> GRD</div>
                        </div>
                        <div>
                            <div class="title"><?=$lng['txt154']?></div>
                            <div class="num"><?= round($Stage['goal'],2)?> GRD</div>
                        </div>
                    </div>

                    <div class="slider">
                        <div class="fill" style="width: <?=($Stage['sum']*100/$Stage['goal'])?>%">
                            <div class="num"><span><?=$lng['txt155']?> USD</span><?= round($Stage['usd_sum'],2)?>
                            </div>
                        </div>
                    </div>

                    <div class="time">
                        <div class="title">Stage <?=Option::get('stage')+1//$lng['txt156']?></div>

                        <div class="counter"></div>

                    </div>

                </div>



            </div>
        </div>
    </div>

    <!--===================-->



    <div id="TOK-tokens" class="white-popup-block mfp-hide">
        <div class="title"><?=$lng['txt168']?></div>
        <div class="descr"><?=$lng['txt169']?> <span><b id="usd_to_tok_conf"></b> GRD </span>
            <br><?=$lng['txt170']?> <span>$
                <?=$tokPrice?></span> <?=$lng['txt171']?></div>

        <div class="buttons">
            <a class="popup-modal-confirm" href="#" onclick="usd_to_tok_conf('usd_to_2tok');"><?=$lng['txt124']?></a>
            <a class="popup-modal-dismiss" href="#"><?=$lng['txt125']?></a>
        </div>
    </div>

    <div id="USD-balance" class="white-popup-block mfp-hide">
        <div id="showAdr">
            <div class="title"><?=$lng['txt172']?></div>
            <div class="descr" id="main_text">-</div>

            <div class="copy" id="add_adr">-</div>

            <div class="attention"><img src="/assets/img/attention.svg" alt=""><?=$lng['txt173']?></div>

            <div class="buttons">
                <a class="popup-modal-dismiss" href="#"><?=$lng['txt174']?></a>
            </div>
        </div>

        <div id="showWarn">
            <div class="title" id="showWarn_title"></div>
            <div class="buttons">
                <a class="popup-modal-dismiss" href="#">Ок</a>
            </div>
        </div>
    </div>

    <div class="milk-shadow"></div>


    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/script.js"></script>

    <script src="/assets/js/owl.carousel.min.js"></script>
    <script src="/assets/js/jquery.magnific-popup.js"></script>
    <script src="/assets/js/ion.rangeSlider.min.js"></script>


    <script src="res\custom\js\slider.js"></script>


    <?require_once(ROOT.'/views/scripts/bon_with.php');?>
    <?require_once(ROOT.'/views/scripts/tok_with.php');?>
    <?require_once(ROOT.'/views/scripts/usd_to_tok2.php');?>

    <?require_once(ROOT.'/views/scripts/tables.php');?>

</body>

</html>