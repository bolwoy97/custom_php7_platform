<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Grid Residence">
    <meta name="author" content="GridGroup">
    <meta name="keywords" content="">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/grb/assets/images/brand/favicon.png" />

    <!-- TITLE -->
    <title>Grid Residence Batumi</title>

    <!-- BOOTSTRAP CSS -->
    <link href="assets/grb/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="assets/grb/assets/css/style.css" rel="stylesheet" />
    <link href="assets/grb/assets/css/skin-modes.css" rel="stylesheet" />

    <!-- SIDE-MENU CSS -->
    <link href="assets/grb/assets/plugins/sidemenu/closed-sidemenu.css" rel="stylesheet">

    <!-- C3 CHARTS CSS -->
    <link href="assets/grb/assets/plugins/charts-c3/c3-chart.css" rel="stylesheet" />

    <!-- CUSTOM SCROLL BAR CSS-->
    <link href="assets/grb/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

    <!-- SELECT2 CSS -->
    <link href="assets/grb/assets/plugins/select2/select2.min.css" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="assets/grb/assets/css/icons.css" rel="stylesheet" />

    <!-- SIDEBAR CSS -->
    <link href="assets/grb/assets/plugins/sidebar/sidebar.css" rel="stylesheet">

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="assets/grb/assets/colors/color1.css" />

    <!-- DATA TABLE CSS -->
    <link href="assets/grb/assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />

</head>

<body class="app sidebar-mini Left-menu-Default  Sidemenu-left-icons">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="assets/grb/assets/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">
            <?require_once(ROOT.'/views/layouts/residence/header_navbar.php');?>
            <!--app-content open-->
            <div class="app-content">
                <div class="side-app">

                    <!-- PAGE-HEADER -->
                    <div class="page-header">
                        <ol class="breadcrumb">
                            <!-- breadcrumb -->
                            <li class="breadcrumb-item"><a href="#">
                                    <h3 class="mb-0 breadcrump-tittle">Обзор </h3>
                                </a></li>
                        </ol><!-- End breadcrumb -->
                        <div class="ml-auto">
                            <div class="input-group">
                                <!--<a href="/gr_complex" class="btn btn-primary button-icon mr-3 mt-1 mb-1">
                                    <span><i class="icon icon-home"></i>Купить BGRT</span>
                                </a>-->
                                <a href="#" class="btn btn-info button-icon mr-3 mt-1 mb-1" data-toggle="modal"
                                    data-target="#withdrawToken">
                                    <span><i class="ti-export"></i>Вывести Grid Back Bonus</span>
                                </a>
                                <!--<a href="#" class="btn btn-primary button-icon mr-3 mt-1 mb-1">
                                    <span><i class="ti-import"></i>Пополнить USD баланс</span>
                                </a>-->
                            </div>
                        </div>
                    </div>
                    <!-- PAGE-HEADER END -->
                    <!-- Alerts -->
                    <? require_once(ROOT.'/views/layouts/residence/messages.php');?>
                    <!-- Alerts end -->
                    <div class="">
                        <div class="banner banner-color mt-0 row">
                            <div class="col-xl-1 col-lg-2 col-md-12 p-0">
                                <img src="assets/grb/assets/images/svgs/welcome.svg" alt="image" class="image">
                            </div>
                            <div class="page-content col-xl-7 col-lg-6 col-md-12">
                                <h3 class="mb-1">Добро пожаловать в <span class="font-weight-bold text-primary">Grid
                                        Residence!</span></h3>
                                <p class="mb-0 fs-16">Мы токенизируем недвижимость. Хотите знать что это и почему так
                                    выгодно?</p>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 text-lg-right">
                                <a href="/gr_complex" class="btn btn-danger mt-1 mb-1">Узнать больше</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="cad">
                                <div class="card-body">
                                    <div class="card-order">
                                        <h6 class="mb-2 text-uppercase">Моя недвижимость</h6>
                                        <h2 class="text-right "><i
                                                class="zmdi zmdi-city icon-size float-left text-primary text-primary-shadow"></i>
                                            <span><?=$user['gr_tok']?> BGRT</span></h2>
                                        <p class="mb-0">Batumi Grid Residence Token<span class="float-right">
                                                <?=$user['gr_tok']*0.1?> m2</span></p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- COL END -->
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="cad ">
                                <div class="card-body">
                                    <div class="card-widget">
                                        <h6 class="mb-2 text-uppercase">Мои Grid Back Bonus </h6>
                                        <h2 class="text-right"><i
                                                class="ti-gift icon-size float-left text-success "></i>
                                            <span><?=round($user['gr_bon'],2)?></span>
                                        </h2>
                                        <p class="mb-0">Waves Exchange Price
                                            <!--<span class="float-right">0.12 USDT</span>-->
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- COL END -->
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="cad">
                                <div class="card-body">
                                    <div class="card-widget">
                                        <h6 class="mb-2 text-uppercase">Баланс USD</h6>
                                        <h2 class="text-right"><i class="icon-size ti-wallet float-left text-info "></i>
                                            <span>$<?=round($user['gr_usd'],2)?></span>
                                        </h2>
                                        <!--<p class="mb-0">Monthly Profit<span class="float-right">$4,678</span></p>-->
                                    </div>
                                </div>
                            </div>
                        </div><!-- COL END -->
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="cad">
                                <div class="card-body">
                                    <div class="card-widget">
                                        <h6 class="mb-2 text-uppercase">Этап <?=$cur_stage['num']+1?></h6>
                                        <h2 class="text-right mb-5"><span><small>1 BGRT = <?=$cur_stage['price']?>
                                                    USD</small></span></h2>
                                        <div class="progress progress-xs mb-3">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-info-1
                                                 w-<?=5 * round($cur_stage['sum']*100/$cur_stage['goal']/ 5)?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- COL END -->
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card-header custom-header">
                                <div>
                                    <h3 class="card-title">Новые события</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="latest-timeline">
                                    <h5>2020</h5>
                                    <ul class="timeline mb-0">
                                        <li class="mt-0">
                                            <a href="/gr_events"
                                                class="font-weight-semibold text-dark fs-16">Конференция в
                                                Батуми</a>
                                            <div><small class="fs-13 text-muted">6 Июня, 18:00</small></div>
                                            <p class="text-muted mt-2">Не пропустите первую международную конференцию Grid Group в Батуми.</p>
                                        </li>
                                        <li>
                                            <a href="/gr_events" class="font-weight-semibold text-dark fs-16">Онлайн
                                                конференция</a>
                                            <div><small class="fs-13 text-muted">6 Июня, 18:00</small></div>
                                            <p class="text-muted mt-2">Презентация платформы по токенизации недвижимости Grid Realty 1.0</p>
                                        </li>
                                        <li>
                                            <a href="/gr_events" class="font-weight-semibold text-dark fs-16">Онлайн
                                                конферанция</a>
                                            <div><small class="fs-13 text-muted">4 Июня, 17:30</small></div>
                                            <p class="text-muted mt-2 mb-0">Земля под застройку комплекса Grid Residence Batumi</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-sm-12">
                            <div class="card cart">
                                <div class="card-header">
                                    <h3 class="card-title">Этапы продажи BGRT</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-vcenter text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Этап</th>
                                                    <th>Доступно BGRT</th>
                                                    <th class="text-center">Цена</th>
                                                    <th></th>
                                                    <th class="w-15">BGRT</th>
                                                    <th></th>
                                                    <th class="w-15">Сумма USD</th>
                                                    <th>Бонус</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?
                                                    $images=['2.png', '1.png', '4.png', '8.png' ];
                                                    foreach ($all_stages as $stage) {?>
                                                <tr <?if($stage['num']==$cur_stage['num']){?>
                                                    id="cur_stage"
                                                    <?}?>>
                                                    <form action="gr_buy_tok" method="post">
                                                        <td>
                                                            <img src="assets/grb/assets/images/pngs/<?=$images[$stage['num']]?>"
                                                                alt="" class="h-7" data-toggle="tooltip"
                                                                data-placement="right" title="<?=$stage['num']+1?> этап">
                                                        </td>
                                                        <td><?=$stage['goal']-$stage['sum']?> из <?=$stage['goal']?>
                                                        </td>
                                                        <td class="text-center">$<?=$stage['price']?></td>
                                                        <td class="w-5">x</td>
                                                        <td>
                                                            <div class="input-group input-indec">
                                                                <input name="tok" id="sum_tok" oninput="count_tok()"
                                                                    required type="text"
                                                                    class="form-control input-number text-center"
                                                                    placeholder="0"
                                                                    <?if($stage['num']!=$cur_stage['num']){?>
                                                                disabled
                                                                <?}?>
                                                                >
                                                            </div>
                                                        </td>
                                                        <td>=</td>
                                                        <td id="sum_usd">0</td>
                                                        <td id="sum_bon">0</td>
                                                        <td>
                                                            <?if($stage['num']==$cur_stage['num']){?>
                                                            <button type="submit"
                                                                class="btn btn-primary">Купить</button>
                                                            <?}?>
                                                        </td>
                                                    </form>
                                                </tr>
                                                <?}?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div><!-- COL END -->
                    </div>


                    <!-- ROW-4 -->
                    <div class="row row-deck">
                        <div class="col-lg-12 col-md-12 col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Последние операции</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example"
                                            class="table table-striped table-bordered text-nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th class="wd-15p">Дата и время</th>
                                                    <th class="wd-15p">Операция</th>
                                                    <th class="wd-20p">Количество</th>
                                                    <th class="wd-15p">Цена m2</th>
                                                    <th class="wd-10p">Статус</th>
                                                    <th class="wd-25p">Этап</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?
                                            $currencies=['usd'=>'USD','gr_bon'=>'GBB','usdt'=>'GBB',
                                            'gr_tok'=>'BGRT'];
                                            foreach ($comb_jor as $jor) {?>
                                                <tr>
                                                    <td><?=$jor['date']?></td>
                                                    <td>
                                                        <?if($jor['name']){echo $jor['name'];}
                                                        else{echo 'Вывод Grid Back Bonus';}?>
                                                    </td>
                                                    <td>
                                                        <?=$jor['sum']?> <?=$currencies[$jor['cur']]?>
                                                    </td>
                                                    <td>
                                                        <?if($jor['type']=='gr_by_tok'){echo $jor['rate'];}
                                                            else{echo '-';}?>
                                                    </td>

                                                    <?if($jor['status']=='pending'){?>
                                                    <td class="text-gray text-center">Ожидание</td>
                                                    <?}elseif($jor['status']=='canceled'){?>
                                                    <td class="text-danger text-center" title="<?=$jor['coment']?>">
                                                        Отменен</td>
                                                    <?}else{?>
                                                    <td class="text-primary text-center">Подтвержден</td>
                                                    <?}?>

                                                    <td><?=$jor['stage']+1?> этап</td>
                                                </tr>
                                                <?}?>
                                                <!-- <tr>
                                                    <td>2020-07-06 18:41:51</td>
                                                    <td>Пополнение баланса </td>
                                                    <td>150 USD</td>
                                                    <td>-</td>
                                                    <td class="text-primary text-center">Подтвержден</td>
                                                    <td>1 этап</td>
                                                </tr>
                                                <tr>
                                                    <td>2020-07-06 19:41:51</td>
                                                    <td>Покупка метров</td>
                                                    <td>1500 BGRT</td>
                                                    <td>50 USD</td>
                                                    <td class="text-primary text-center">Подтвержден</td>
                                                    <td>1 этап</td>
                                                </tr>
                                                <tr>
                                                    <td>2020-07-05 01:11:00</td>
                                                    <td>Вывод Grid Back Bonus</td>
                                                    <td>564 GBB</td>
                                                    <td>-</td>
                                                    <td class="text-gray text-center">Ожидание</td>
                                                    <td>1 этап</td>
                                                </tr>
                                                <tr>
                                                    <td>2020-07-05 01:11:00</td>
                                                    <td>Вывод Grid Back Bonus</td>
                                                    <td>200 GBB</td>
                                                    <td>-</td>
                                                    <td class="text-danger text-center">Отменен</td>
                                                    <td>1 этап</td>
                                                </tr>-->

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- TABLE WRAPPER -->
                            </div>
                        </div>
                    </div>
                    <!-- ROW-4 END -->
                </div>
            </div>
            <!-- CONTAINER END -->
        </div>


        <!-- FOOTER -->
        <footer class="footer">
            <div class="container">
                <div class="row align-items-center">
                    <div class="social">
                        <ul class="text-center">
                            <li>
                                <a class="social-icon" href=""><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a class="social-icon" href=""><i class="fa fa-vk"></i></a>
                            </li>
                            <li>
                                <a class="social-icon" href=""><i class="fa fa-telegram"></i></a>
                            </li>
                            <li>
                                <a class="social-icon" href=""><i class="fa fa-youtube"></i></a>
                            </li>
                            <li>
                                <a class="social-icon" href=""><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-12 col-sm-12 mt-3 mt-lg-0 text-center">
                        Copyright © 2020 <a href="#">Grid Group</a>. All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER END -->
        <!-- MESSAGE MODAL -->
        <div class="modal fade" id="withdrawToken" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="example-Modal3">Вывести Grid Back Bonus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="gr_bon_with" id="gr_bon_with">
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">На адрес Waves:</label>
                                <input name="adr" type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Количество токенов:</label>
                                <input name="sum" type="text" class="form-control" id="recipient-name">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                        <button type="submit" form="gr_bon_with" class="btn btn-primary">Вывести</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- MESSAGE MODAL CLOSED -->
    </div>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="assets/grb/assets/js/jquery-3.4.1.min.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="assets/grb/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/grb/assets/plugins/bootstrap/js/popper.min.js"></script>

    <!-- SPARKLINE JS-->
    <script src="assets/grb/assets/js/jquery.sparkline.min.js"></script>

    <!-- Moment js-->
    <script src="assets/grb/assets/plugins/moment/moment.min.js"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="assets/grb/assets/js/circle-progress.min.js"></script>

    <!-- RATING STARJS -->
    <script src="assets/grb/assets/plugins/rating/jquery.rating-stars.js"></script>

    <!-- CHARTJS CHART JS-->
    <script src="assets/grb/assets/plugins/chart/Chart.bundle.js"></script>
    <script src="assets/grb/assets/plugins/chart/utils.js"></script>

    <!-- FLOT CHART JS -->
    <script src="assets/grb/assets/plugins/jquery.flot/jquery.flot.js"></script>
    <script src="assets/grb/assets/plugins/jquery.flot/jquery.flot.pie.js"></script>
    <script src="assets/grb/assets/plugins/jquery.flot/jquery.flot.resize.js"></script>
    <script src="assets/grb/assets/js/chart.flot.sampledata.js"></script>

    <!-- PIETY CHART JS-->
    <script src="assets/grb/assets/plugins/peitychart/jquery.peity.min.js"></script>
    <script src="assets/grb/assets/plugins/peitychart/peitychart.init.js"></script>

    <!-- ECHART JS-->
    <script src="assets/grb/assets/plugins/echarts/echarts.js"></script>

    <!-- SIDE-MENU JS-->
    <script src="assets/grb/assets/plugins/sidemenu/sidemenu.js"></script>

    <!-- CUSTOM SCROLLBAR JS-->
    <script src="assets/grb/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- DATEPICKER JS -->
    <script src="assets/grb/assets/plugins/date-picker/spectrum.js"></script>
    <script src="assets/grb/assets/plugins/date-picker/jquery-ui.js"></script>

    <!-- SIDEBAR JS -->
    <script src="assets/grb/assets/plugins/sidebar/sidebar.js"></script>

    <!-- APEXCHART JS -->
    <script src="assets/grb/assets/js/apexcharts.js"></script>

    <!-- INDEX JS -->
    <script src="assets/grb/assets/js/index1.js"></script>

    <!-- CUSTOM JS -->
    <script src="assets/grb/assets/js/custom.js"></script>

    <!-- DATA TABLE JS-->
    <script src="assets/grb/assets/plugins/datatable/jquery.dataTables.min.js"></script>
    <script src="assets/grb/assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="assets/grb/assets/plugins/datatable/datatable.js"></script>
    <script src="assets/grb/assets/plugins/datatable/datatable-2.js"></script>
    <script src="assets/grb/assets/plugins/datatable/dataTables.responsive.min.js"></script>

    <script>
    function count_tok() {
        var tok_sum = $('#cur_stage #sum_tok').val();

        $('#cur_stage #sum_usd').html(tok_sum * <?=$cur_stage['price']?> );
        $('#cur_stage #sum_bon').html(tok_sum * 1);
    }
    </script>

</body>

</html>