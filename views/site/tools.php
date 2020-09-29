<? 
$pn='tools';
$p_header="Инструменты"; 
?>

<?require_once(ROOT.'/views/layouts/head.php');?>

<body>

    <?require_once(ROOT.'/views/layouts/sidebar.php');?>

    <div class="content">

        <?require_once(ROOT.'/views/layouts/header.php');?>
        <? require_once(ROOT.'/views/layouts/messages.php');?>

        <div class="grid">
            <div class="sections3">
                <div class="sidebar">
                    <div class="box">
                        <div class="title">Анимированные баннеры</div>
                        <div class="descr">Скопируйте html код банера с вашей реферальной ссылкой и разместите на сайте
                        </div>
                        <?foreach ($gif_baners as $baner) {?>
                        <div class="title"></div>
                        <div class="descr">

                            <img src="assets/tools_img/<?=$baner?>" class="responsive" alt="pink">
                        </div>
                        <div class="clipboard">
                            <input type="text"
                                value='<a href="<?=$refLink?>"><img src="assets/tools_img/<?=$baner?>"></a>'
                                class="copy">
                        </div>
                        <?}?>

                    </div>
                    <div class="box">
                        <div class="title">Баннеры</div>
                        <div class="descr">Скопируйте html код банера с вашей реферальной ссылкой и разместите на сайте
                        </div>
                        <?foreach ($img_baners as $baner) {?>
                        <div class="title"></div>
                        <div class="descr">

                            <img src="assets/tools_img/<?=$baner?>" class="responsive" alt="pink">
                        </div>
                        <div class="clipboard">
                            <input type="text"
                                value='<a href="<?=$refLink?>"><img src="assets/tools_img/<?=$baner?>"></a>'
                                class="copy">
                        </div>
                        <?}?>

                    </div>
                </div>

            </div>
            <div class="sidebar">
                <?if(!$purchs_done){?>
                    <div class="box">
                        <div class="title">Купить обучение</div>
                        <div class="time" id="buy_tg">
                            <form action="usd_to_tg_tok" method="post">
                                <input type="hidden" name="tg_adr" id="tg_adr">
                                <select name="sum" style="width:50%;" id="tg_select" class="custom-select">
                                    <?foreach ($packs as $k => $pack) {
                                        if ($tg_purchases[$k]['sum']< $pack) {
                                            ?><option value="<?=$pack?>">$<?=$pack?> + бот бесплатно</option><?
                                        }
                                       
                                    }?>
                                    
                                </select>
                                <button type="button" class="submit" onclick="buy_tg()">Подтвердить</button>
                            </form>
                        </div>
                    </div>
                <?}?>
                <div class="box">
                    <div class="title">Скачать презентацию</div>
                    <div class="time">

                        <div class="flex">
                            <div><a href="res/pres/lith.pptx" class="logo"><img
                                        src="assets/tools_img/lithuania.png"></a></div>
                            <div><a href="res/pres/geo.pptx" class="logo"><img src="assets/tools_img/georgia.png"></a>
                            </div>
                            <div><a href="res/pres/kazakh.pptx" class="logo"><img
                                        src="assets/tools_img/kazakhstan.png"></a></div>
                        </div>
                    </div>
                    <div class="time">
                        <div class="title"></div>
                        <div class="flex">
                            <div><a href="res/pres/uk.pptx" class="logo"><img src="assets/tools_img/uk.png"></a></div>
                            <div><a href="res/pres/ital.pptx" class="logo"><img src="assets/tools_img/flag.png"></a>
                            </div>
                            <div><a href="res/pres/ru.pdf" target="blanc" class="logo"><img
                                        src="assets/tools_img/russia.png"></a></div>
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

    <?require_once(ROOT.'/views/scripts/swal2.php');?>
    <script>
    function buy_tg() {
        var sum = $('#buy_tg #tg_select').val();
        if (sum <= 0) {
            swalCustom.fire('Invalid ammount');
            return;
        }


        swalCustom.fire({
            title: 'Покупка токена',
            html: 'Вы потверждаете покупку Telegram бота на сумму $' + sum 
            <?if(count($tg_purchases)==0){?>
                +'<br><br>Введите свой Telegram адресс'
            <?}?>
                ,
            showCancelButton: true,
            confirmButtonText: 'Подтвердить',
            cancelButtonText: 'Отмена',
            <?if(count($tg_purchases)==0){?>
            
                input: 'text',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showLoaderOnConfirm: true,
                preConfirm: (tg_adr) => {
                    if(tg_adr.length>0){
                        $('#buy_tg #tg_adr').val(tg_adr);
                        }else{
                            Swal.showValidationMessage(
                                `Неверный адресс: ${tg_adr}`
                            )
                        }
                    
                },
                allowOutsideClick: () => !Swal.isLoading()
            <?}?>
        }).then((result) => {
            if (result.value) {
                $('#buy_tg form').submit();
            }
        })

    }
    </script>

</body>

</html>