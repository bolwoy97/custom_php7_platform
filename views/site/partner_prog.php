<?
$pn='partner_prog';
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
                        <div class="descr">Квалифицированные партнеры</div>
                        <div class="coin"><?=$partners_prog_count?></div>
                        <hr>
                        <div class="white">Лидерская программа</div>
                    </div>

                </div>
                
            </div>

            <div class="banner">
                <div class="head">
                    <div>
                        <div class="descr">Статус лидерской программы</div>
                        <br>
                        <?if(strtotime($last_partner_prog['real_end'])<=0){?>
                            <?if(strtotime($last_partner_prog['start'])>time()){?>
                                <div class="white">начало <?=$last_partner_prog['start']?></div>
                                <?}else{?>
                                    <div class="white">Активна</div>
                        <?}?>
                            
                        <?}else{?>
                            <div class="white">Завершилась</div>
                        <?}?>
                    </div>

                </div>

                <div class="flex">
                    <div class="item">
                        <div class="title"><?= date('Y-m-d H:i',strtotime($last_partner_prog['start']))?></div>
                        <div class="small">Начало</div>
                    </div>

                    <div class="item">
                    <?if(strtotime($last_partner_prog['real_end'])<=0){?>
                        <div class="title"><?=date('Y-m-d H:i',strtotime($last_partner_prog['end']))?></div>
                        <?}else{?>
                            <div class="title"><?=date('Y-m-d H:i',strtotime($last_partner_prog['real_end']))?></div>
                        <?}?>
                       
                        <div class="small">Конец</div>
                    </div>
                </div>
            </div>

            <div class="banner last">
            <?if(file_exists("assets/img/flags/flag_big_".unserialize($user['country'])['country'].".png")){?> 
                <img src="/assets/img/flags/flag_big_<?= unserialize($user['country'])['country']?>.png" style="width: 20%;" >
                <?}?>
                <div class="descr"><?= unserialize($user['country'])['country_long']?></div>     
                
            </div>

        </div>

        <div class="grid">
            <div class="sections">
               

                <section class="table last-operations">
                    <div class="head">
                        <div class="title"><img src="/assets/img/last-operations.svg" alt="">
                            Квалифицированные партнеры</div>
                    </div>

                    <table cellpadding='0' cellspacing='0'>
                        <thead>
                            <tr>
                                <th>Дата регистрации</th>
                                <th>Login</th>
                                <th>Оборот</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?foreach($partners as $k=> $usr){?>
                                            <tr>
                                                <td class=""><?=$usr['date']?></td>
                                                <td class="green"><?=$usr['login']?></td>
                                                <td class="">$<?= round($usr['usd_to_tok_sum'],2)?></td>
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
                        <div class="title">Рейтинг лидеров</div>
                        <div class="flex">
                            <div>
                                <section class="table last-operations">

                                    <table cellpadding='0' cellspacing='0' style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Страна</th>
                                                <th>Логин</th>
                                                <th>Партнеры</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?foreach($top_users as $k=> $usr){
                                                if($usr['partners_prog_count']>0){?>
                                            <tr>
                                                <td class="complete">
                                                <?if(file_exists("assets/img/flags/flag_small_".unserialize($usr['country'])['country'].".png") ){?> 
                                                    <img src="/assets/img/flags/flag_small_<?= unserialize($usr['country'])['country']?>.png"
                                                    title="<?=unserialize($usr['country'])['country_long']?>" >
                                                    <?}else{
                                                        echo unserialize($usr['country'])['country_long'];
                                                    }?> </td>
                                                <td class="green"><?=$usr['login']?> </td>
                                                <td><?=$usr['partners_prog_count']?> </td>
                                            </tr>
                                            <?}}?>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </div>
                    </div>
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