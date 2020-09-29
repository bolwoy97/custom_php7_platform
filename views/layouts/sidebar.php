<div class="menu">
    <div style="overflow:auto;">
        <a href="" class="logo"><img src="/assets/img/logo.svg" alt="Grid Group"></a>
        <div class="container">
            <ul>
                <li class="<?=($pn==1)?'active':''?>"><a href="/dashboard">
                        <div class="container-img"><img src="/assets/img/menu/home.svg" alt="home"></div>Pre-Sale
                    </a></li>
                    

                    <?
                    $sb_last_new = News::getLast(1)[0];
                    $sb_user_last_new = User::getUserInfo($_SESSION['userId'])['last_new'];
                    ?>
                <li class="<?=($pn==6)?'active':''?>"><a href="/news">
                        <div class="container-img"><img src="/assets/img/menu/news.svg" alt="news"></div>
                        <?=$lng['txt176']?> 
                        <?if($sb_user_last_new<$sb_last_new['id']){?>
                            <b class="green" style="margin-left: 15px;" title="Новые сообщения">
                             NEW 
                            </b>
                        <?}?>
                    </a></li>


                <li class="<?=($pn==4)?'active':''?>"><a href="/operations">
                        <div class="container-img"><img src="/assets/img/menu/operations.svg" alt="operations"></div>
                        <?=$lng['txt177']?>
                    </a></li>
                <li class="<?=($pn==3)?'active':''?>"><a href="/partners">
                        <div class="container-img"><img src="/assets/img/menu/partners.svg" alt="partners"></div>
                        <?=$lng['txt178']?>
                    </a></li>


                <li class="<?=($pn=='tok2')?'active':''?>"><a href="/buy/tok2">
                        <div class="container-img"><img src="/assets/img/menu/safe1.svg" alt="partners"></div>
                        Token holders
                    </a></li>


                <li class="<?=($pn=='verification')?'active':''?>"><a href="/verification">
                        <div class="container-img"><img src="/assets/img/menu/verif.svg" alt="Verification"></div>
                        <?=$lng['txt214']?>
                    </a></li>

                
                    <li class="<?=($pn=='ref_prog')?'active':''?>"><a href="/ref_prog">
                        <div class="container-img"><img src="/assets/img/menu/bonus.svg" alt="home"></div>
                        Бонусная программа
                    </a></li>

                    
                        <li class="<?=($pn=='partner_prog')?'active':''?>"><a href="/partner_prog">
                        <div class="container-img"><img src="/assets/img/menu/partners.svg" alt="home"></div>
                        Лидерская программа
                        </a></li>
                
                <?if($_SESSION['user']['login']=='tester1'){?>
                    <?}?>
                    <li ><a href="<?= $GLOBALS['env'][ENV_TYPE]['yard_site'].'login/'?>">
                        <div class="container-img"><img src="/assets/img/menu/home.svg" alt="home"></div>
                        Grid Yard
                    </a></li>
                

                    <li class="<?=($pn=='gr_dashboard')?'active':''?>"><a href="/gr_dashboard">
                        <div class="container-img"><img src="/assets/img/menu/home.svg" alt="home"></div>
                        Grid Realty
                    </a></li>

                <li class="<?=($pn=='gridpay')?'active':''?>"><a href="/gridpay">
                        <div class="container-img"><img src="/assets/img/menu/pay.svg" alt="operations"></div>
                        GridPay
                    </a></li>

             
               <!-- <li class="<?=($pn==7)?'active':''?>"><a href="/res/docs/presentation.pdf" target="blank">
                        <div class="container-img"><img src="/assets/img/menu/present.svg" alt="news"></div>
                        <?=$lng['txt183']?>
                    </a></li>-->



                <li class="<?=($pn=='all_operations')?'active':''?>"><a href="/all-opers">
                        <div class="container-img"><img src="/assets/img/menu/stat.svg" alt="operations"></div>
                        Все операции
                    </a></li>

                  
                        <li class="<?=($pn=='p_2_p')?'active':''?>"><a href="/p_2_p">
                        <div class="container-img"><img src="/assets/img/menu/stat.svg" alt="operations"></div>
                            P2P
                        </a></li>
                    
                   
                        <li class="<?=($pn=='tools')?'active':''?>"><a href="/tools">
                        <div class="container-img"><img src="/assets/img/menu/present.svg" alt="operations"></div>
                        Инструменты
                    </a></li>

                    <li><a href="/res/docs/documentation.pdf" target="blank">
                        <div class="container-img"><img src="/assets/img/menu/news.svg" alt="news"></div>
                        Документация
                    </a></li>

                    <li><a href="https://t.me/GRIDGRUPSUPPORT" target="blank">
                        <div class="container-img"><img src="/assets/img/menu/support.png" alt="news"></div>
                        Поддержка
                    </a></li>
                    <li><a href="https://t.me/gridgroupofficiall" target="blank">
                        <div class="container-img"><img src="/assets/img/menu/tg.svg" alt="news"></div>
                        Telegram
                    </a></li>
                    <li><a href="https://www.facebook.com/gridgroupofficial" target="blank">
                        <div class="container-img"><img src="/assets/img/menu/fb.svg" alt="news"></div>
                        Facebook
                    </a></li>
                    <li><a href="https://instagram.com/gridgroup_official?igshid=1qcxwh4x360y1" target="blank">
                        <div class="container-img"><img src="/assets/img/menu/inst.svg" alt="news"></div>
                        Instagram
                    </a></li>
                   
                    <li><a href="https://vk.com/gridofficial" target="blank">
                        <div class="container-img"><img src="/assets/img/menu/vk.svg" alt="news"></div>
                        VK
                    </a></li>
                    <li><a href="https://www.youtube.com/channel/UCt-fD7bhVEUN5fmy2Cz3s-g/" target="blank">
                        <div class="container-img"><img src="/assets/img/menu/ytb.svg" alt="news"></div>
                        YouTube
                    </a></li>
                    

            </ul>
        </div>
    </div>

    <div class="copyright">Copyright © 2020 Grid Group </div>
</div>