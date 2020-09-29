<?$pn='verification';?>
<?$p_header=$lng['txt175'];?>

<?require_once(ROOT.'/views/layouts/head.php');?>

<body>

    <?require_once(ROOT.'/views/layouts/sidebar.php');?>

    <div class="content">

        <?require_once(ROOT.'/views/layouts/header.php');?>

        <? require_once(ROOT.'/views/layouts/messages.php');?>

        <div class="banners owl-carousel owl-theme">
            <div class="banner last">
                <img src="/assets/img/passport.svg" alt="">
                <div class="descr"><?=$lng['txt215']?></div>
                <?if($Ver['status']!='confirmed'){?>
                <div class="coin"><?=$lng['txt216']?></div>
                <?}else{?>
                    <b><div class="coin text-success"><?=$lng['txt217']?></div></b>
                <?}?>
            </div>

            <div class="banner last">
                <img src="/assets/img/loc.svg" alt="">
                <div class="descr"><?=$lng['txt218']?></div>
                <?if($Ver['status']!='confirmed'){?>
                <div class="coin"><?=$lng['txt216']?></div>
                <?}else{?>
                    <b><div class="coin text-success"><?=$lng['txt217']?></div></b>
                <?}?>
            </div>

            <!--<div class="banner last">
                <img src="/assets/img/credit-card.svg" alt="">
                <div class="descr">Кредитная карта</div>
                <div class="coin">Не подвязана</div>
            </div>-->
        </div>

        <?if($Ver['status']=='canceled'){?>
        <div class="grid">
            <div class="sections3">
                <div class="alert alert-danger tx-12" role="alert">
                    <img src="/assets/img/disabled.svg" alt="">
                    <?=$lng['txt219']?> <br>
                    <strong>
                        <?=$Ver['coment']?>
                    </strong>
                </div>
            </div>
        </div>
        <?}?>

        <div class="grid">
            <div class="sections3">
                <div class="sidebar">
                    <form action="verification/submit" method="post" enctype="multipart/form-data">
                        <div class="box">
                            <div class="title"><?=$lng['txt220']?></div>

                            <div class="descr">
                                <?=$lng['txt221']?>
                            </div>

                            <div class="clipboard">
                                <input required type="text" name="name" value="<?=$Ver['name']?>"
                                    placeholder="<?=$lng['txt222']?>" class="copy">
                            </div>
                            <div class="title"></div>
                            <div class="clipboard">
                                <input required type="text" name="lastname" value="<?=$Ver['lastname']?>"
                                    placeholder="<?=$lng['txt223']?>" class="copy">
                            </div>
                            <div class="title"></div>
                            <div class="clipboard">
                                <input required type="date" name="birth_date" value="<?=$Ver['birth_date']?>"
                                    placeholder="<?=$lng['txt224']?>" class="copy">
                            </div>
                        </div>
                        <div class="box">
                            <div class="title"></div>
                            <div class="title"><?=$lng['txt225']?></div>
                            <div class="title"></div>
                            <div class="descr">
                            <?=$lng['txt226']?>
                            </div>
                            <div class="clipboard">
                                <input required type="text" name="pasp_num" value="<?=$Ver['pasp_num']?>"
                                    placeholder="<?=$lng['txt227']?>" class="copy">
                            </div>
                            <div class="title"></div>
                            <div class="clipboard">
                                <input required type="text" name="pasp_given" value="<?=$Ver['pasp_given']?>"
                                    placeholder="<?=$lng['txt228']?>" class="copy">
                            </div>
                            <div class="title"></div>
                            <div class="clipboard">
                                <input required type="date" name="pasp_given_date" value="<?=$Ver['pasp_given_date']?>"
                                    placeholder="<?=$lng['txt229']?>" class="copy">
                            </div>
                        </div>
                        <div class="box">
                            <div class="title"></div>
                            <div class="title"><?=$lng['txt230']?></div>
                            <div class="title"></div>
                            <!--<div class="descr">
                                Веедите серию и номер документа, который подтверждает вашу личность. Это может быть
                                паспорт
                                или водительское удостоверение.
                            </div>-->
                            <div class="clipboard">
                                <input required type="text" name="country" value="<?=$Ver['country']?>"
                                    placeholder="<?=$lng['txt231']?>" class="copy">
                            </div>
                            <div class="title"></div>
                            <div class="clipboard">
                                <input required type="text" name="state" value="<?=$Ver['state']?>"
                                    placeholder="<?=$lng['txt232']?>" class="copy">
                            </div>
                            <div class="title"></div>
                            <div class="clipboard">
                                <input required type="text" name="city" value="<?=$Ver['city']?>"
                                    placeholder="<?=$lng['txt233']?>" class="copy">
                            </div>
                            <div class="title"></div>
                            <div class="clipboard">
                                <input required type="text" name="adres" value="<?=$Ver['adres']?>"
                                    placeholder="<?=$lng['txt234']?>" class="copy">
                            </div>
                        </div>
                        <div class="box">
                            <div class="title"><?=$lng['txt235']?></div>
                            <!--<img src="<?=IMG_ROOT.$Ver['doc_img']?>" onerror="this.style.display='none'"
                                style="width:150px;">-->
                            <hr>
                            <div class="descr">
                            <?=$lng['txt236']?>
                            </div>
                            <input required type="file" name="doc_img">

                            <div class="title"></div>
                            <div class="title"><?=$lng['txt237']?></div>
                            <!--<img src="<?=IMG_ROOT.$Ver['bill_img']?>" onerror="this.style.display='none'"
                                style="width:150px;">-->
                            <hr>
                            <div class="descr">
                            <?=$lng['txt238']?>
                            </div>
                            <input required type="file" name="bill_img" placeholder="test">

                        </div>
                        <?if($Ver['status']!='pending' && $Ver['status']!='confirmed'){?>
                        <button type="submit" class="submit"><?=$lng['txt239']?></button>
                        <?}?>

                    </form>
                </div>

            </div>
            <div class="sidebar">
                <form action="withdraw_adr" method="post">
                    <div class="box">
                        <div class="title">Кошельки для вывода средств</div>
                        <div class="descr"> 
                            Адрес BTC
                        </div>
                        <div class="clipboard">
                            <input type="text" name="with_btc" value="<?=$user['with_btc']?>"
                            <?=(strlen($user['with_btc'])>0)?'disabled':'';?>    placeholder="Введите адрес BTC" class="copy">
                        </div>

                        <div class="title"></div>
                        <div class="descr"> 
                            Адрес ETH
                        </div>
                        <div class="clipboard">
                            <input type="text" name="with_eth" value="<?=$user['with_eth']?>"
                            <?=(strlen($user['with_eth'])>0)?'disabled':'';?>    placeholder="Введите адрес ETH" class="copy">
                        </div>

                        <div class="title"></div>
                        <div class="descr"> 
                            Адрес USDT
                        </div>
                        <div class="clipboard">
                            <input type="text" name="with_usdt" value="<?=$user['with_usdt']?>"
                            <?=(strlen($user['with_usdt'])>0)?'disabled':'';?>    placeholder="Введите адрес USDT" class="copy">
                        </div>

                        <div class="title"></div>
                        <div class="descr"> 
                            Адрес PerfectMoney
                        </div>
                        <div class="clipboard">
                            <input type="text" name="with_usd" value="<?=$user['with_usd']?>"
                            <?=(strlen($user['with_usd'])>0)?'disabled':'';?>    placeholder="Введите адрес PerfectMoney" class="copy">
                        </div>
                        <hr>
                        <div class="title"></div>
                        <div class="descr"> 
                            Адрес Payeer
                        </div>
                        <div class="clipboard">
                            <input type="text" name="with_payeer" value="<?=$user['with_payeer']?>"
                            <?=(strlen($user['with_payeer'])>0)?'disabled':'';?>    placeholder="Введите адрес Payeer" class="copy">
                        </div>

                        <div class="title"></div>
                        <div class="descr"> 
                            Адрес Qiwi
                        </div>
                        <div class="clipboard">
                            <input type="text" name="with_qiwi" value="<?=$user['with_qiwi']?>"
                            <?=(strlen($user['with_qiwi'])>0)?'disabled':'';?>    placeholder="Введите адрес Qiwi" class="copy">
                        </div>

                        <div class="title"></div>
                        <div class="descr"> 
                            Адрес Advcash
                        </div>
                        <div class="clipboard">
                            <input type="text" name="with_advcash" value="<?=$user['with_advcash']?>"
                            <?=(strlen($user['with_advcash'])>0)?'disabled':'';?>    placeholder="Введите адрес Advcash" class="copy">
                        </div>

                        <hr>
                        <div class="title"></div>
                        <button type="submit" class="submit">Сохранить данные</button>
                    </div>

                </form>

                <form action="verification/submit" method="post" enctype="multipart/form-data">

                </form>
            </div>

        </div>


        <div class="milk-shadow"></div>


        <script src="/assets/js/jquery.min.js"></script>
        <script src="/assets/js/script.js"></script>

        <script src="/assets/js/owl.carousel.min.js"></script>
        <script src="/assets/js/jquery.magnific-popup.js"></script>
        <script src="/assets/js/ion.rangeSlider.min.js"></script>

        <!--<script src="/res/custom/js/payments.js"></script>
        <script src="/res/custom/js/wallet.js"></script>

       
        <script src="res\custom\js\time_count.js"></script>
        <script type="text/javascript">
        CountDownDate("<?=(new DateTime('tomorrow'))->format('Y-m-d')//$Stage['start']?>");
        </script>

        <script src="res\custom\js\slider.js"></script>

        <?//require_once(ROOT.'/views/scripts/bon_with.php');?>
        <?//require_once(ROOT.'/views/scripts/tok_with.php');?>
        -->
</body>

</html>