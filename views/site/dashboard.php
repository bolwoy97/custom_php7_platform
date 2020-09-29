<?$p_header=$lng['txt175'];?>

<?require_once(ROOT.'/views/layouts/head.php');?>

<body>

    <?require_once(ROOT.'/views/layouts/sidebar.php');?>

    <div class="content" id="app">

        <?require_once(ROOT.'/views/layouts/header.php');?>

        <? require_once(ROOT.'/views/layouts/messages.php');?>


        <div class="banners owl-carousel owl-theme">
            <div class="banner first">
                <div class="head">
                    <div>
                        <div class="descr"><?=$lng['txt126']?>/holders</div>
                        <div class="coin"><?=round($user['TOKbalance'],2)?><small>/<?=round($user['TOK_2balance'],2)?>
                                GRD</small></div>
                        <div class="white"><?=$lng['txt127']?></div>
                    </div>

                    <div>
                        <img src="/assets/img/banner1.svg" alt="">
                    </div>
                </div>
                <div class="flex">
                    <div class="item">
                        <div class="title"><?=round($user['TOKbalance']*$tokPrice,2)?> USD</div>
                        <!-- round($Accrs['tok'],2) -->
                        <div class="small"><?=$lng['txt128']?></div>
                    </div>

                    <div class="item">
                        <div class="title"><?=round($TokForSale,2)?> GRD</div>
                        <div class="small"><?=$lng['txt242']?></div>
                    </div>
                </div>
            </div>

            <div class="banner">
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
                    <!--<div class="item">
                        <div class="title"><?=$Accrs['btc']?>$</div>
                        <div class="small">BTC</div>
                    </div>

                    <div class="item">
                        <div class="title"><?=$Accrs['eth']?>$</div>
                        <div class="small">ETH</div>
                    </div>

                    <div class="item">
                        <div class="title"><?=$Accrs['bch']?>$</div>
                        <div class="small">BCH</div>
                    </div>

                    <div class="item">
                        <div class="title"><?=$Accrs['usd']?>$</div>
                        <div class="small">USD</div>
                    </div>-->
                </div>
            </div>

            <div class="banner last">
                <img src="/assets/img/banner3.svg" style="height:60%;" alt="">

                <div class="descr"> <?=$lng['txt132']?> <?=$Stage['num']+1?></div>
                <div class="coin">1 GRD = <?=$tokPrice?> USD</div>
                <?if($bonStatus=='on' && $bonAmount>0 ){?>
                <div class="coin"><?=$lng['txt241']?> = <?=round(Option::get('bonAmount'),2)?> GRD</div>
                <div class="coin">Бонусов доступно: <?=round($user['bonOneHand'],2)?> GRD</div>

                <?}?>
            </div>
        </div>

        <div class="grid">
            <div class="sections">
                <section class="table last-operations">
                    <div class="head">
                        <div class="title"><img src="/assets/img/last-operations.svg" alt="">
                            <?=$lng['txt133']?></div>
                        <a href="operations" class="view-all"><?=$lng['txt134']?><img src="/assets/img/right-arrow.svg"
                                alt=""></a>
                    </div>

                    <div  v-if="tabs.actions.params.loading" >
                        <loader />
                    </div>
                    <table cellpadding='0' cellspacing='0'  v-else>
                        <thead>
                            <tr>
                                <th><?=$lng['txt135']?></th>
                                <th><?=$lng['txt136']?></th>
                                <th><?=$lng['txt137']?></th>
                                <th><?=$lng['txt138']?></th>
                            </tr>
                        </thead>
                        <tbody v-if="tabs.actions.data.length">
                            <tr  v-for="action in tabs.actions.data">
                                <td>{{action.operation}}</td>
                                <td class="green">{{action.amount}}</td>
                                <td>{{action.date}}</td>
                                <td class="complete" :title="action.coment">
                                    <img :src="'/assets/img/'+action.status_img" 
                                    alt="">{{action.status_show}}</td>
                            </tr>
                        </tbody>
                        <div v-else-if="!tabs.actions.data.length">Ничего не найдено</div>
                    </table>

                </section>

                <section class="table recent-partners">
                    <div class="head">
                        <div class="title"><img src="/assets/img/recent-partners.svg" alt="">
                            <?=$lng['txt141']?><small><b>/Спонсор:
                                    <?=User::getUserInfo($user['sponsor'])['login']?></b></small></div>
                        <a href="/partners" class="view-all"><?=$lng['txt134']?><img src="/assets/img/right-arrow.svg"
                                alt=""></a>
                    </div>

                    <div  v-if="tabs.partners.params.loading" >
                        <loader />
                    </div>
                    <table cellpadding='0' cellspacing='0' v-else>
                        <thead>
                            <tr>
                                <th><?=$lng['txt137']?></th>
                                <th><?=$lng['txt142']?> </th>
                                <th><?=$lng['txt143']?></th>
                                <th>GRD</th>
                            </tr>
                        </thead>

                        <tbody  v-if="tabs.partners.data.length">
                            <tr v-for="partner in tabs.partners.data">
                                <td>{{partner.date}}</td>
                                <td class="green">{{partner.login}}</td>
                                <td class="bold">LVL {{partner.lvl}}</td>
                                <td class="green">{{partner.TOKbalance}} GRD</td>
                            </tr>
                        </tbody>
                        <div v-else-if="!tabs.partners.data.length">Ничего не найдено</div>
                    </table>
                    

                </section>

                <section class="table last-news">
                    <div class="head">
                        <div class="title"><img src="/assets/img/last-news.svg" alt=""><?=$lng['txt144']?></div>
                        <a href="news" class="view-all"><?=$lng['txt134']?><img src="/assets/img/right-arrow.svg"
                                alt=""></a>
                    </div>

                    <div class="grid">
                        <?foreach($news as $new){?>
                        
                            <div class="item" style="background-image: url('<?=IMG_ROOT.$new['img']?>');">
                            
                            <div class="title">
                            <?if($user['last_new']<$new['id']){?>
                                <b class="green">
                                NEW 
                                </b>
                            <?}?>    
                            <?=$new['title']?></div>
                           
                            <a href="nwsv-<?=$new['id']?>" class="btn"><?=$lng['txt145']?></a>
                        </div>
                        <?}?>


                </section>
            </div>

            <div class="sidebar">
                <div class="box">



                    <?if($bonStatus=='on' && $bonAmount>0 && $user['bonOneHand']>0){?>
                    <div class="title"><?=$lng['txt240']?></div>
                    <?}else{?>
                    <div class="title"><?=$lng['txt146']?></div>
                    <?}?>
                    <div class="item">
                        <input type="number" min="0" placeholder="USD" value="" id="usd_to_tok_inp"
                            oninput="usd_to_tok_count();">
                        <span class="green">= <b id="usd_to_tok_res">0</b> GRD</span>
                        <a class="popup-modal" href="#TOK-tokens"><?=$lng['txt147']?></a>
                    </div>

                    <div class="title"><?=$lng['txt148']?></div>
                    <div class="item">
                        <!--<form id="addition_form"  action="newadd" method="post">-->
                        <input style="width:50%;" type="number" min="0" placeholder="USD" id="sum-addition" name="sum">
                        <select style="width:50%;" id="add_select" class="custom-select" name="cur">
                            <option value="btc" selected>BTC </option>
                            <option value="eth">ETH</option>
                            <!--<option value="bch">BCH</option>-->
                            <option value="usdt_erc20">USDT.ERC20</option>
                            <option value="usd">USD</option>
                            <option value="fchange">Fchange</option>
                        </select>
                        <!--</form>-->
                        <a onclick="getAddition();" class="popup-modal" href="#USD-balance"><?=$lng['txt149']?></a>

                    </div>
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


                    <!--==============================================-->

                    <!--/////====/////-->
                    <div class="title"><?=$lng['txt150']?></div>
                    <div class="item" id="bon_with_front">
                        <input type="number" min="0" placeholder="USD" value="" id="sum" oninput="">
                        <select id="cur" class="custom-select" name="cur">
                            <option value="btc" selected>BTC</option>
                            <option value="eth">ETH</option>
                            <!--<option value="bch">BCH</option>-->
                            <option value="usdt_erc20">USDT.ERC20</option>
                            <option value="usd">Perfect</option>
                            <option value="balance">Balance</option>
                            <option value="gridPay">GridPay</option>
                            <?if($_SESSION['user']['login']=='tester1'){?>
                            <!--<option value="gr_usd">Grid Residence</option>-->
                            <?}?>
                        </select>
                        <a class="popup-modal" href="#bon_with_back" onclick="getBonWith()"><?=$lng['txt151']?></a>
                    </div>

                    <!--/////====/////-->
                    <!--/////====/////-->
                    <!---->

                    <div class="title"><?=$lng['txt211']?> GRD</div>
                    <div class="item" id="tok_with_front">
                        <input type="number" min="0" placeholder="GRD" value="" id="sum" oninput="">
                        <select id="cur" class="custom-select" name="cur">
                            <option value="btc" selected>BTC</option>
                            <option value="eth">ETH</option>
                            <!--<option value="bch">BCH</option>-->
                            <option value="usdt_erc20">USDT.ERC20</option>
                            <option value="usd">Perfect</option>
                            <?if($_SESSION['user']['login']=='tester1'){?>
                            <?}?>
                            <!--<option value="gridPay">GridPay</option>
                            <option value="balance">Balance</option>-->
                        </select>
                        <a class="popup-modal" href="#tok_with_back_warn" onclick="//getTokWith()"><?=$lng['txt151']?></a>
                    </div>

                    <!--/////====/////-->

                    <div class="title">Перевод на GridPay</div>
                    <div class="item" id="bal_with_front">
                        <input type="number" min="0" placeholder="USD" value="" id="sum" oninput="">
                        <a class="popup-modal" href="#bal_with_back" onclick="getBalWith()"><?=$lng['txt151']?></a>
                    </div>
                    <!--==============================================-->

                </div>

                <?if($diff <=0 ){?>
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
                            <div class="num"><span><?=$lng['txt155']?> USD</span><?= round($Stage['usd_sum'],2) ?></div>
                        </div>
                    </div>


                    <div class="time">
                        <div class="title">Stage <?=Option::get('stage')+1//$lng['txt156']?></div>

                        <div class="counter"></div>

                    </div>

                </div>
                <?}?>
                <div class="box">
                    <div class="title"><?=$lng['txt157']?></div>

                    <div class="descr">
                        <?=$lng['txt158']?> <span>- 10% GRD</span>, <?=$lng['txt159']?>
                        <span>- 3% GRD</span>, <?=$lng['txt160']?> <span>- 2% GRD</span>
                        , <?=$lng['txt161']?> <span>- 1% GRD</span>,
                        <?=$lng['txt162']?> <span>- 1% GRD</span>, <?=$lng['txt163']?>
                        <span>- 1% GRD</span>
                        , <?=$lng['txt164']?><span>- 1%
                            GRD</span>
                    </div>

                    <div class="clipboard">
                        <img src="/assets/img/copy.svg" alt="copy" onclick="copy()">
                        <input type="text" value="<?=$refLink?>" class="copy">
                        <a href="#"><img src="/assets/img/social.svg" alt="" onclick="copy()"></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--===================-->
    <form id="bon_with_form" role="form" action="newwith" method="POST">
        <input id="with_cur" name="cur" type="hidden">
        <input id="with_sum" name="sum" type="hidden">
        <input id="with_adr" name="adr" type="hidden">
    </form>

    <form id="bal_with_form" role="form" action="bal_to_gp" method="POST">
        <input id="with_cur" name="cur" type="hidden">
        <input id="with_sum" name="sum" type="hidden">
        <input id="with_adr" name="adr" type="hidden">
    </form>

    <form id="tok_with_form" role="form" action="tok_with" method="POST">
        <input id="with_cur" name="cur" type="hidden">
        <input id="with_sum" name="sum" type="hidden">
        <input id="with_adr" name="adr" type="hidden">
    </form>
    <!--===================-->

    <div id="tok_with_back_warn" class="white-popup-block mfp-hide">
        <div id="main">
            <div class="title">Продажа GRD переносится на Yard</div>
            <div class="descr"> Мы в процессе переноса торговли GRD на биржу  Yard.exchange  </div>
           
            <br>
            <div class="buttons">
                <a class="popup-modal-dismiss" href="#">OK</a>
            </div>
        </div>
    </div>
    
    <div id="tok_with_back" class="white-popup-block mfp-hide">
        <div id="main">
            <div class="title"><?=$lng['txt165']?></div>
            <div class="descr"><?=$lng['txt166']?> <span><b id="tok_with_sum"></b> GRD</span>
                <br></div>
           
            <br>
            <div class="buttons">
                <a class="popup-modal-confirm" href="#" onclick="submitTokWith();"><?=$lng['txt124']?></a>
                <a class="popup-modal-dismiss" href="#"><?=$lng['txt125']?></a>
            </div>
        </div>
        <div id="warn">
            <div class="title" id="title"></div>
            <div class="buttons">
                <a class="popup-modal-dismiss" href="#">Ок</a>
            </div>
        </div>
    </div>


    <div id="bon_with_back" class="white-popup-block mfp-hide">
        <div id="main">
            <div class="title"><?=$lng['txt165']?></div>
            <div class="descr"><?=$lng['txt166']?> <span><b id="bon_with_sum"></b> USD</span>
                <br></div>
            <div id="enter_text">
                <!--<?=$lng['txt212']?> <span id="text"></span> <?=$lng['txt213']?> <br>--> Комиссионнный сбор 10%</div>
            <br>
            <!--<input type="text" class="copy" id="adr" placeholder="<?=$lng['txt187']?>" required>-->
            <div class="buttons">
                <a class="popup-modal-confirm" href="#" onclick="submitBonWith();"><?=$lng['txt124']?></a>
                <a class="popup-modal-dismiss" href="#"><?=$lng['txt125']?></a>
            </div>
        </div>
        <div id="warn">
            <div class="title" id="title"></div>
            <div class="buttons">
                <a class="popup-modal-dismiss" href="#">Ок</a>
            </div>
        </div>
    </div>

    <div id="bal_with_back" class="white-popup-block mfp-hide">
        <div id="main">
            <div class="title"><?=$lng['txt165']?></div>
            <div class="descr"><?=$lng['txt166']?> <span><b id="bal_with_sum"></b> USD</span>
                <br></div>
            <br>
            <div class="buttons">
                <a class="popup-modal-confirm" href="#" onclick="submitBalWith();"><?=$lng['txt124']?></a>
                <a class="popup-modal-dismiss" href="#"><?=$lng['txt125']?></a>
            </div>
        </div>
        <div id="warn">
            <div class="title" id="title"></div>
            <div class="buttons">
                <a class="popup-modal-dismiss" href="#">Ок</a>
            </div>
        </div>
    </div>

    <div id="TOK-tokens" class="white-popup-block mfp-hide">
        <div class="title"><?=$lng['txt168']?></div>
        <div class="descr"><?=$lng['txt169']?> <span><b id="usd_to_tok_conf"></b> GRD </span>
            <br><?=$lng['txt170']?> <span>$
                <?=$tokPrice?>/<?=$tok2Price?></span> <?=$lng['txt171']?></div>

        <div class="buttons">
            <a class="popup-modal-confirm" href="#" onclick="usd_to_tok_conf();"><?=$lng['txt124']?></a>
            <a class="popup-modal-dismiss" href="#"><?=$lng['txt125']?></a>
        </div>
        <form action="/usd_to_tok" method="post" id="usd_to_tok_form">
            <input type="hidden" name="bonus" value="0" id="bonus">
            <input type="hidden" name="sum" id="sum">
        </form>
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


    <script src="res\custom\js\time_count.js"></script>
    <script type="text/javascript">
    CountDownDate("<?=(new DateTime('tomorrow'))->format('Y-m-d')//$Stage['start']?>");
    </script>

    <!--<script src="res\custom\js\slider.js"></script>-->

    <?require_once(ROOT.'/views/scripts/wallet.php');?>
    <?require_once(ROOT.'/views/scripts/bon_with.php');?>
    <?require_once(ROOT.'/views/scripts/tok_with.php');?>
    <?require_once(ROOT.'/views/scripts/bal_with.php');?>
    <?require_once(ROOT.'/views/scripts/usd_to_tok.php');?>

  
    <?require_once(ROOT.'/views/scripts/vue.php');?>
    <script>
   initVue({ actions:{
                    params: {
                        loading:false,
                        name:'actions',
                        search: '',
                        page: 0,
                        perPage: 10,
                        pages: 0
                    },
                    data: [],
                },
                partners:{
                    params: {
                        loading:false,
                        name:'partners',
                        search: '',
                        page: 0,
                        perPage: 10,
                        pages: 0
                    },
                    data: [],
                },
   })
    </script>


</body>

</html>