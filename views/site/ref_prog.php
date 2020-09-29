<?
$pn='ref_prog';
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
                        <div class="descr">Структурный оборот</div>
                        <div class="coin"><?=round($user['ref_prog_sum'],2)?> USD</div>
                        <div class="white">Бонусная программа</div>
                    </div>

                </div>
                <div class="flex">
                    <div class="item">
                        <div class="title"><?=round($user['ref_prog_max'],2)?> USD</div>
                        <div class="small">Получено</div>
                    </div>

                </div>
            </div>

            <div class="banner">
                <div class="head">
                    <div>
                        <div class="descr">Статус бонусной программы</div>
                        <br>
                        <div class="white">Активна</div>
                    </div>

                </div>

                <div class="flex">
                    <div class="item">
                        <div class="title"><?= date('Y-m-d H:i',strtotime($cur_ref_prog['start']))?></div>
                        <div class="small">Начало</div>
                    </div>

                    <div class="item">
                        <div class="title"><?=date('Y-m-d H:i',strtotime($cur_ref_prog['end']))?></div>
                        <div class="small">Конец</div>
                    </div>
                </div>
            </div>

            <div class="banner last">
                <img src="/assets/img/diamond.svg" style="height:60%;" alt="">

                <div class="descr"><?=$ref_prog_sum?> USD</div>
                
            </div>

        </div>

        <div class="grid">
            <div class="sections">
                <!--<section class="table last-operations">
                    <div class="head">
                        <div class="title"><img src="/assets/img/last-operations.svg" alt="">
                            Условия бонусной программы</div>
                    </div>

                    <table cellpadding='0' cellspacing='0'>
                        <thead>
                            <tr>
                                <th><?=$lng['txt136']?></th>
                                <th>Награда</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?foreach($cur_ref_prog['rewards'] as $jor){?>
                            <tr>
                                <td class="complete"><?=$jor['amount']?> USD</td>
                                <td class="green"><?=$jor['reward']?> USD</td>
                                <td>
                                    <?if(round($user['ref_prog_max'],2)>=$jor['amount']){?>
                                    <img src="/assets/img/complete.svg" alt="">
                                    <?}?>
                                </td>

                            </tr>

                            <?}?>


                        </tbody>
                    </table>

                </section>

                <section class="table last-operations">
                    <div class="head">
                        <div class="title"><img src="/assets/img/last-operations.svg" alt="">
                            <?=$lng['txt133']?></div>
                    </div>

                    <table cellpadding='0' cellspacing='0'>
                        <thead>
                            <tr>
                                <th><?=$lng['txt137']?></th>
                                <th><?=$lng['txt136']?></th>
                                <th>LVL</th>
                                <th>Login</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?foreach($ref_prog_recs as $jor){?>
                            <tr>
                                <td><?=$jor['date']?></td>
                                <td class="green"><?=$jor['sum']?> USD</td>
                                <td><?=$jor['lvl']?></td>
                                <td class="complete"><?=$jor['name']?></td>
                            </tr>
                            <?}?>
                        </tbody>
                    </table>

                </section>-->

                <section class="table last-operations">
                    <div class="head">
                        <div class="title"><img src="/assets/img/last-operations.svg" alt="">
                            Условия программы и обороты</div>
                    </div>

                    <table cellpadding='0' cellspacing='0'>
                        <thead>
                            <tr>
                                <th>Уровень</th>
                                <th>Расчетная ставка</th>
                                <th>Текущий оборот</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?foreach($cur_ref_prog['rates'] as $k=> $jor){?>
                                            <tr>
                                                <td class=""><?=$k?> уровень</td>
                                                <td class="complete"><?=$jor?> %</td>
                                                <td class="green"><?=$cur_ref_prog['turnover'][$k]?> $</td>
                                            </tr>
                                            <?}?>
                        </tbody>
                    </table>

                </section>

            </div>
            <div class="sidebar">
                <div class="box">
                    <div class="title"></div>
                    <div class="time">
                        <div class="title">Бонусные вознаграждения</div>
                        <div class="flex">
                            <div>
                                <section class="table last-operations">

                                    <table cellpadding='0' cellspacing='0' style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Оборот</th>
                                                <th>Бонус</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?foreach($cur_ref_prog['rewards'] as $jor){?>
                                            <tr>
                                                <td class="complete"><?=$jor['amount']?> USD</td>
                                                <td class="green"><?=$jor['reward']?> USD</td>
                                                <?if(round($user['ref_prog_max'],2)>=$jor['amount']){?>
                                                    <td>
                                                        <img src="/assets/img/complete.svg" alt="">
                                                    </td>
                                                <?}?>
                                            </tr>
                                            <?}?>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="box">
                    <div class="title"></div>
                    <div class="time">
                        <div class="title">Уровни бонусной программы</div>
                        <div class="flex">
                            <div>
                                <section class="table last-operations">
                                    <table cellpadding='0' cellspacing='0'>
                                        <thead>
                                            <tr>
                                                <th>Уровень</th>
                                                <th>Ставка</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?foreach($cur_ref_prog['rates'] as $k=> $jor){?>
                                            <tr>
                                                <td class="complete">C <?=$k?> У</td>
                                                <td class="green"><?=$jor?> %</td>
                                            </tr>
                                            <?}?>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>-->
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