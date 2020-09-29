<?
$pn='gridpay';
$p_header=$lng['txt175'];?>

<?require_once(ROOT.'/views/layouts/head.php');?>

<body>

    <?require_once(ROOT.'/views/layouts/sidebar.php');?>

    <div class="content">

        <?require_once(ROOT.'/views/layouts/header.php');?>

        <? require_once(ROOT.'/views/layouts/messages.php');?>

        <div class="banners owl-carousel owl-theme">
            <div class="banner first">
                <div class="head">
                    <div>
                        <div class="descr">Кошелек USD</div>
                        <div class="coin"><?=round($user['gridPay'],2)?> USD</div>
                        <div class="white">Подготовка к работе</div>
                    </div>

                </div>
                <div class="flex">
                    <div class="item">
                        <div class="title">0 USD</div>
                        <div class="small">Получено</div>
                    </div>

                    <div class="item">
                        <div class="title">0 USD</div>
                        <div class="small">Отправлено</div>
                    </div>
                </div>
            </div>
            <div class="banner">
                <div class="head">
                    <div>
                        <div class="descr">Кошелек GRD</div>
                        <div class="coin">0 GRD </div>
                        <div class="white">Не активен</div>
                    </div>

                </div>

                <div class="flex">
                    <div class="item">
                        <div class="title">0 GRD</div>
                        <div class="small">Получено</div>
                    </div>

                    <div class="item">
                        <div class="title">0 GRD</div>
                        <div class="small">Отправлено</div>
                    </div>
                </div>
            </div>
            <div class="banner">
                <div class="head">
                    <div>
                        <div class="descr">Кошелек EUR</div>
                        <div class="coin">0 EUR </div>
                        <div class="white">Не активен</div>
                    </div>

                </div>

                <div class="flex">
                    <div class="item">
                        <div class="title">0 EUR</div>
                        <div class="small">Получено</div>
                    </div>

                    <div class="item">
                        <div class="title">0 EUR</div>
                        <div class="small">Отправлено</div>
                    </div>
                </div>
            </div>

            <div class="banner">
                <div class="head">
                    <div>
                        <div class="descr">Кошелек BTC</div>
                        <div class="coin">0 BTC </div>
                        <div class="white">Не активен</div>
                    </div>

                </div>

                <div class="flex">
                    <div class="item">
                        <div class="title">0 BTC</div>
                        <div class="small">Получено</div>
                    </div>

                    <div class="item">
                        <div class="title">0 BTC</div>
                        <div class="small">Отправлено</div>
                    </div>
                </div>
            </div>
            <div class="banner">
                <div class="head">
                    <div>
                        <div class="descr">Кошелек ETH</div>
                        <div class="coin">0 ETH </div>
                        <div class="white">Не активен</div>
                    </div>

                </div>

                <div class="flex">
                    <div class="item">
                        <div class="title">0 ETH</div>
                        <div class="small">Получено</div>
                    </div>

                    <div class="item">
                        <div class="title">0 ETH</div>
                        <div class="small">Отправлено</div>
                    </div>
                </div>
            </div>
            <div class="banner">
                <div class="head">
                    <div>
                        <div class="descr">Кошелек USDT</div>
                        <div class="coin">0 USDT </div>
                        <div class="white">Получено / Отправлено</div>
                    </div>

                </div>

                <div class="flex">
                    <div class="item">
                        <div class="title">0 USDT</div>
                        <div class="small">Получено</div>
                    </div>

                    <div class="item">
                        <div class="title">0 USDT</div>
                        <div class="small">Отправлено</div>
                    </div>
                </div>
            </div>

        </div>

        <div class="grid">
            <div class="sections">
                <section class="table last-operations">
                    <div class="head">
                        <div class="title"><img src="/assets/img/last-operations.svg" alt="">
                            <?=$lng['txt133']?></div>
                        <!--<a href="" class="view-all"><?=$lng['txt134']?><img src="/assets/img/right-arrow.svg"
                                alt=""></a>-->
                    </div>

                    <table cellpadding='0' cellspacing='0'>
                        <thead>
                            <tr>
                                <th><?=$lng['txt135']?></th>
                                <th><?=$lng['txt136']?></th>
                                <th><?=$lng['txt137']?></th>
                                <th><?=$lng['txt138']?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?foreach($comb_jor as $jor){?>
                            <tr>
                                <td><?=$jor['operation']?></td>
                                <td class="green"><?=$jor['amount']?></td>
                                <td><?=$jor['date']?></td>
                                <td class="complete" title="<?=$jor['coment']?>">
                                    <img src="/assets/img/<?=$jor['status_img']?>" alt=""><?=$jor['status_show']?></td>


                            </tr>
                            </tr>

                            <?}?>


                        </tbody>
                    </table>

                </section>

            </div>
            <div class="sidebar">

                <div class="box">
                    <div class="title">Переводы GridPay</div>
                    <div class="time">

                        <div class="flex">
                           <!-- <div><a class="popup-modal logo" href="#gridPay_send"><img src="assets/img/sent1.png"
                                        alt=""></a></div>-->
                            <div><a class=" logo" href="/fchange/form?type=gridPay"><img src="assets/img/receiv1.png"
                                        alt=""></a></div>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <div class="title">Вывод на баланс</div>
                    <div class="item">
                        <form action="grid_pay_with" method="post">
                            <input type="hidden" name="cur" value="balance" required>
                            <input type="hidden" name="adr" value="balance" required>
                            <input type="number" name="sum" min="0" placeholder="USD" required>
                            <button type="submit" class="submit">Подтвердить</button>
                        </form>
                    </div>
                </div>
              
                <div class="box">
                    <div class="title">Вывод на Grid Realty</div>
                    <div class="item">
                        <form action="grid_pay_with" method="post">
                            <input type="hidden" name="cur" value="gr_usd" required>
                            <input type="hidden" name="adr" value="gr_usd" required>
                            <input type="number" name="sum" min="0" placeholder="USD" required>
                            <button type="submit" class="submit">Подтвердить</button>
                        </form>
                    </div>
                </div>
                <?if(false){?>
                <div class="box">
                    <div class="title">Вывод на банковскую карту</div>
                    <div class="time">

                        <div class="flex">
                            <div><a onclick="setCur('gridPay_with_kard','uah-mono')" class="popup-modal logo"
                                    href="#gridPay_with_kard"><img src="assets/img/mono.png" alt="Mono"></a></div>
                            <div><a onclick="setCur('gridPay_with_kard','uah-privat')" class="popup-modal logo"
                                    href="#gridPay_with_kard"><img src="assets/img/privat24.png" alt="Privat"></a></div>
                            <div><a onclick="setCur('gridPay_with_kard','rub-sberbank')" class="popup-modal logo"
                                    href="#gridPay_with_blocked"><img src="assets/img/sberbank.png" alt="Sber"></a>
                            </div>
                        </div>
                        <div class="title"></div>
                        <div class="flex">
                            <div><a onclick="setCur('gridPay_with_kard','kzt-kaspi')" class="popup-modal logo"
                                    href="#gridPay_with_blocked"><img src="assets/img/kaspi.png" alt="Kaspi"></a></div>
                            <div><a onclick="setCur('gridPay_with_kard','rub-vtb')" class="popup-modal logo"
                                    href="#gridPay_with_blocked"><img src="assets/img/vtb24.png" alt="Vtb"></a></div>
                            <div><a onclick="setCur('gridPay_with_kard','rub-rfzn')" class="popup-modal logo"
                                    href="#gridPay_with_blocked"><img src="assets/img/raiffeisen.png" alt="Rfsn"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?}?>
                <div class="box">
                    <div class="title">Вывод на платежную систему</div>
                    <div class="time">

                        <div class="flex">
                            <div><a onclick="setCur('gridPay_with_pay','payeer')" class="popup-modal logo"
                                    href="#gridPay_with_pay"><img src="assets/img/payeer.png" alt="Payeer"></a></div>
                            <div><a onclick="setCur('gridPay_with_pay','qiwi')" class="popup-modal logo"
                                    href="#gridPay_with_pay"><img src="assets/img/qiwi.png" alt="Qiwi"></a></div>
                                    </div>
                                    <div class="flex">
                            <div><a onclick="setCur('gridPay_with_pay','advcash')" class="popup-modal logo"
                                    href="#gridPay_with_pay"><img src="assets/img/advcash.png" alt="Sber"></a></div>
                                    <div><a onclick="setCur('gridPay_with_pay','usd')" class="popup-modal logo"
                                    href="#gridPay_with_pay"><img src="assets/img/pm.png" alt="Sber"></a></div>
                        </div>
                    </div>
                </div>


            </div>

        </div>


        <div id="gridPay_send" class="white-popup-block mfp-hide">
            <div id="main">
                <div class="title">Перевод пользователю </div>
                <div class="descr">Ведите логин пользователя и сумму в USD, которую желаете перевести</div>

                <form action="grid_pay_send" method="post">
                    <input type="text" name="login" class="copy" placeholder="Login" required>
                    <input type="text" name="sum" class="copy" placeholder="Сумма" required>
                    <hr>
                    <div class="buttons">
                        <button class="popup-modal-confirm" type="submit"><?=$lng['txt124']?></button>
                        <a class="popup-modal-dismiss" href="#"><?=$lng['txt125']?></a>
                    </div>
                </form>
            </div>
            <!--<div id="warn">
                <div class="title" id="title"></div>
                <div class="buttons">
                    <a class="popup-modal-dismiss" href="#">Ок</a>
                </div>
            </div>-->
        </div>

        <div id="gridPay_rec" class="white-popup-block mfp-hide">
            <div id="main">
                <div class="title">Запрос на перевод</div>
                <div class="descr">Укажите в запросе на перевод следующий Login</div>
                <input type="text" class="copy" value="<?=$user['login']?>" placeholder="Login" disabled>
                <hr>
                <a class="popup-modal-dismiss" href="#">OK</a>
            </div>
        </div>
        <?if(false){?>
        <div id="gridPay_with_kard" class="white-popup-block mfp-hide">
            <div id="main">
                <div class="title">Запрос на вывод на банковскую карту </div>
                <div class="descr">Ведите сумму, номер карты, имя, фамилию и телефона </div>
                <p style="color:black;">Вывод производится в течение 4 банковских дней.</p>
                <br>
                <form action="grid_pay_with" method="post">
                    <input type="hidden" name="cur" id="cur" required>
                    <input type="text" name="sum" class="copy" placeholder="Сумма" required>
                    <input type="text" name="adr" class="copy" placeholder="Номер карты" required>
                    <input type="text" name="name" class="copy" value="<?=$user['name']?>" placeholder="Имя/фамилия"
                        required>
                    <input type="text" name="phone" class="copy" value="<?=$user['phone']?>" placeholder="Телефон"
                        required>
                    <hr>
                    <div class="buttons">
                        <button class="popup-modal-confirm" type="submit"><?=$lng['txt124']?></button>
                        <a class="popup-modal-dismiss" href="#"><?=$lng['txt125']?></a>
                    </div>
                </form>
            </div>
        </div>
        <?}?>

        <div id="gridPay_with_pay" class="white-popup-block mfp-hide">
            <div id="main">
                <div class="title">Запрос на вывод на платежную систему </div>
                <div class="descr">Ведите сумму,  имя, фамилию и телефона </div>

                <form action="grid_pay_with" method="post">
                    <input type="hidden" name="cur" id="cur" required>
                    <input type="text" name="sum" class="copy" placeholder="Сумма" required>
                    <!--<input type="text" name="adr" class="copy" placeholder="Номер счета" required>-->
                    <input type="text" name="name" class="copy" value="<?=$user['name']?>" placeholder="Имя/фамилия"
                        required>
                    <input type="text" name="phone" class="copy" value="<?=$user['phone']?>" placeholder="Телефон"
                        required>
                    <hr>
                    <div class="buttons">
                        <button class="popup-modal-confirm" type="submit"><?=$lng['txt124']?></button>
                        <a class="popup-modal-dismiss" href="#"><?=$lng['txt125']?></a>
                    </div>
                </form>
            </div>
        </div>

        <div id="gridPay_with_blocked" class="white-popup-block mfp-hide">
            <div id="main">
                <div class="title">Вывод на банковскую карту временно недоступен</div>
                <div class="descr">Ведутся технические работы </div>

                <hr>
                <div class="buttons">
                    <a class="popup-modal-dismiss" href="#">ОК</a>
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

        <script src="res\custom\js\slider.js"></script>

        <script>
        function setCur(panel, cur) {
            $('#' + panel + ' #cur').val(cur);
            return;
        }
        </script>

</body>

</html>