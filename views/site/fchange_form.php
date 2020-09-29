<? $p_header=$lng['txt177']; ?>

<?require_once(ROOT.'/views/layouts/head.php');?>

<body>

    <?require_once(ROOT.'/views/layouts/sidebar.php');?>

    <div class="content">

        <?require_once(ROOT.'/views/layouts/header.php');?>


        <div class="grid">
            <div class="sections">
                <section class="table last-operations">
                    <div class="head">
                        <div class="title">Fchange form</div>
                    </div>

                    <!--Начало: Форма оплаты с произвольным дизайном-->
                    <h2 class="form_variant_title">Форма оплаты с произвольным дизайном</h2>
                    <form class="pay_form_wrap form_my_design_wrap" method="post"
                        action="https://f-change.biz/merchant_pay" target="_blank">
                        1. Выберите платежную систему
                        <div class="pay_form_paysys_wrap">
                            <?php foreach ($obmen_cources_info As $one_obmen_curs) {
                            ?>
                            <div class="pay_form_pay_sys pay_sys_<?php echo strtolower($one_obmen_curs->send_paysys_identificator);?>"
                                style="background-image: url('<?php echo $one_obmen_curs->send_paysys_icon?>');"
                                <?php foreach($one_obmen_curs AS $key=>$val) echo " $key='$val'";?>>
                                <?php echo $one_obmen_curs->send_paysys_valute?>
                            </div>
                            <?php }?>
                        </div>
                        <div class="paysumm_curs_note">Здесь выводится подсказка сколько нужно отдать в выбранной валюте
                        </div>
                        <div class="pay_form_summ_field">
                            <?
                            $pay_valute = "";
                            if (isset($obmen_cources_info[0]->recive_paysys_valute)) $pay_valute = $obmen_cources_info[0]->recive_paysys_valute;
                            ?>
                            2. Сумма пополнения (<span class="pay_valute"><?php echo strtoupper($pay_valute);?></span>)
                            <input class="pay_form_input" type="number" min="1" placeholder="USD" value="<?=$sum?>" name="amount" style="width:25%;">
                        </div>

                        <input type="hidden" name="merchant_name" value="<?php echo $merchant_name;?>" />
                        <input type="hidden" name="merchant_title" value="Grid Group" />
                        <input type="hidden" name="payment_info" value="<?=$info?>" />
                        <input type="hidden" name="payment_num" value="<?=time()?>" />
                        <input type="hidden" name="sucess_url" value="<?=$_SERVER['HTTP_HOST'].'/fchange/sucess'?>" />
                        <input type="hidden" name="error_url" value="<?=$_SERVER['HTTP_HOST'].'/fchange/error'?>" />

                        <input type="hidden" name="user_id" value="<?=$user['id']?>" />
                        <input type="hidden" name="wallet_type" value="<?=$wallet_type?>" />

                        <input type="hidden" class="visual_payed_paysys" name="payed_paysys"
                            value="<?php echo $obmen_cources_info[0]->send_paysys_identificator?>" />
                        <input type="submit" class="obmen_submit submit" name="obmen_submit" value="Оплатить" />
                        <div class="input_errors_text">Здесь показываются ошибки ввода суммы</div>
                    </form>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                    <script>
                    $(document).ready(function() {
                        /*Начало: Обработчик ввода суммы платежа*/
                        $(".form_my_design_wrap .pay_form_input").keyup(function() {
                            $send_summ_method = $(".pay_form_pay_sys.active").attr("send_summ_method");
                            $send_paysys_dec_digits = $(".pay_form_pay_sys.active").attr(
                                "send_paysys_dec_digits");
                            $recive_paysys_dec_digits = $(".pay_form_pay_sys.active").attr(
                                "recive_paysys_dec_digits");

                            //Проверяем введенную сумму и выводим ошибку если нужно
                            $now_enter_summ = parseFloat($(this).val());
                            if (isNaN($now_enter_summ) || $now_enter_summ <= 0) {
                                $(".obmen_submit").hide(0);
                                $(".input_errors_text").html(
                                    "Неверно введена сумма: укажите положительное число").show(0);
                            } else {
                                $summ_fixed_dec_digits = $send_paysys_dec_digits;

                                //Выводим подсказку сколько выбранной валюты потребуется для оплаты
                                $send_paysys_title = $(".pay_form_pay_sys.active").attr(
                                    "send_paysys_title");
                                $need_summ_to_pay = $now_enter_summ * parseFloat($(
                                    ".pay_form_pay_sys.active").attr("obmen_curs"));

                                //Если указан метод получения суммы в платежке которую выбрал юзер - применяем это
                                if ($send_summ_method == "user") $need_summ_to_pay = $now_enter_summ;

                                $(".paysumm_curs_note").html("К оплате: " + Number($need_summ_to_pay
                                        .toFixed($summ_fixed_dec_digits)) + " " +
                                    $send_paysys_title);

                                //Сумма введена верно - проверяем ограничения минимальной и максимальной суммы
                                $send_paysys_title = $(".pay_form_pay_sys.active").attr(
                                    "send_paysys_title");
                                $send_paysys_valute = $(".pay_form_pay_sys.active").attr(
                                    "send_paysys_valute");
                                $recive_paysys_valute = $(".pay_form_pay_sys.active").attr(
                                    "recive_paysys_valute");

                                $min_summ = parseFloat($(".pay_form_pay_sys.active").attr("min_summ"));
                                $max_summ = parseFloat($(".pay_form_pay_sys.active").attr("max_summ"));

                                if (!isNaN($min_summ) && !isNaN($max_summ) && !isNaN($now_enter_summ)) {
                                    $error_html = "";
                                    $valute_in_error = $recive_paysys_valute;
                                    if ($send_summ_method == "user") $valute_in_error =
                                        $send_paysys_valute;

                                    if ($min_summ > $now_enter_summ) $error_html =
                                        "Минимальная сумма пополнения через <strong>" +
                                        $send_paysys_title + "</strong> составляет:<strong> " + Number(
                                            $min_summ.toFixed($summ_fixed_dec_digits)) + " " +
                                        $valute_in_error + "</strong>. Увеличьте сумму.";
                                    if ($max_summ < $now_enter_summ) $error_html =
                                        "Максимальна сумма пополнения через <strong>" +
                                        $send_paysys_title + "</strong> составляет:<strong> " + Number(
                                            $max_summ.toFixed($summ_fixed_dec_digits)) + " " +
                                        $valute_in_error + "</strong>. Уменьшите сумму.";

                                    if ($error_html != "") {
                                        $(".obmen_submit").hide(0);
                                        $(".input_errors_text").html($error_html).show(0);
                                    } else {
                                        $(".obmen_submit").show(0);
                                        $(".input_errors_text").hide(0);
                                    }
                                }
                            }
                        })
                        /*Конец: Обработчик ввода суммы платежа*/


                        /*Начало: Клик по платежной системе*/
                        $(".pay_form_pay_sys").click(function() {
                            $(".pay_form_pay_sys").removeClass("active");
                            $(this).addClass("active");
                            $(".visual_payed_paysys").val($(this).attr("send_paysys_identificator"));
                            if ($(this).attr("send_summ_method") == "user") $(this).parents(
                                ".pay_form_wrap").find(".pay_valute").html($(this).attr(
                                "send_paysys_valute").toUpperCase());

                            //Вызываем обработчик смены суммы
                            $(".form_my_design_wrap .pay_form_input").keyup();
                        });
                        /*Конец: Клик по платежной системе*/

                        //При загрузке страницы - "нажимаем" на первую платежную систему
                        $(".pay_form_pay_sys:first-child").click();
                    })
                    </script>
                    <!--Конец: Форма оплаты с произвольным дизайном-->



                    <!--Начало: Стили для формы с дизайном-->
                    <style>
                    .form_variant_title {
                        font-size: 18px;
                        margin-bottom: 5px;
                        margin-top: 15px;
                    }

                    .pay_form_wrap {
                        /*border: 1px solid #d9d9d9;*/
                        display: inline-block;
                        font-size: 16px;
                        max-width: 540px;
                        padding: 4px 10px 7px;
                        text-align: center;
                    }

                    .pay_form_paysys_wrap {
                        padding-bottom: 3px;
                        padding-top: 3px;
                    }

                    .pay_form_pay_sys {
                        background-position: 50% 22%;
                        background-repeat: no-repeat;
                        border: 1px solid gray;
                        border-radius: 3px;
                        cursor: pointer;
                        display: inline-block;
                        font-size: 14px;
                        font-weight: bold;
                        height: 18px;
                        margin: 1px 1px 5px;
                        padding-top: 38px;
                        text-transform: uppercase;
                        width: 60px;
                    }

                    .pay_form_pay_sys.active,
                    .pay_form_pay_sys:hover {
                        border: 2px solid #ff5700;
                        margin: 0 0 4px;
                    }

                    .obmen_submit {
                        margin-top: 5px;
                    }

                    .input_errors_text {
                        display: none;
                        color: red;
                    }

                    .paysumm_curs_note {
                        color: green;
                        font-size: 16px;
                        margin-bottom: 10px;
                    }

                    .merchant_example_code_link {
                        font-size: 18px;
                    }

                    .last-operations {
                        font-family: Codec Pro;
                        font-style: normal;
                        font-weight: bold;
                        font-size: 14px;
                        line-height: 110%;
                        color: #373737;
                        text-decoration: none;
                       
                        padding: 10px;
                    }
                    </style>
                    <!--Конец: Стили для формы с дизайном-->

                </section>

            </div>
        </div>



    </div>



    <div class="milk-shadow"></div>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/script.js"></script>
    <script src="/assets/js/owl.carousel.min.js"></script>
    <script src="/assets/js/jquery.magnific-popup.js"></script>

</body>

</html>