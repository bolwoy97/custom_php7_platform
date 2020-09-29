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

    <!-- GALLERY CSS -->
    <link href="assets/grb/assets/plugins/gallery/gallery.css" rel="stylesheet">

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
                                    <h3 class="mb-0 breadcrump-tittle"> Все события Grid Residence Batumi </h3>
                                </a></li>
                        </ol><!-- End breadcrumb -->
                    </div>
                    <!-- PAGE-HEADER END -->
                    <? require_once(ROOT.'/views/layouts/residence/messages.php');?>
                    <!-- ROW-1 OPEN -->
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="cbp_tmtimeline">
                                <li>
                                    <time class="cbp_tmtime" datetime="2017-11-04T03:45"><span>6 Июня, 18:00</span>
                                        <span></span></time>
                                    <div class="cbp_tmicon bg-primary"><i class="fa fa-users"></i></div>
                                    <div class="cbp_tmlabel">
                                        <h2>Конференция в Батуми</h2>
                                        <p class="text-sm">Не пропустите первую международную конференцию Grid Group
                                            в Батуми.</p>
                                    </div>
                                </li>
                                <li>
                                    <time class="cbp_tmtime" datetime="2017-11-03T13:22"><span>6 Июня, 18:00</span>
                                        <span></span></time>
                                    <div class="cbp_tmicon bg-success"> <i class="fa fa-video-camera"></i></div>
                                    <div class="cbp_tmlabel">
                                        <h2>Онлайн конференция</h2>
                                        <p class="text-sm">Презентация платформы по токенизации недвижимости Grid Realty
                                            1.0</p>
                                    </div>
                                </li>
                                <li>
                                    <time class="cbp_tmtime" datetime="2017-10-22T12:13"><span>4 Июня, 17:30</span>
                                        <span></span></time>
                                    <div class="cbp_tmicon bg-danger"><i class="zmdi zmdi-pin"></i></div>
                                    <div class="cbp_tmlabel">
                                        <h2>Земля под застройку комплекса Grid Residence Batumi</h2>
                                        <div class="row clearfix">
                                            <iframe
                                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5963.406872755791!2d41.7247089!3d41.6405413!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4067884e7fd5ac6d%3A0xf27f8ad66e4a8d1a!2zT3J0YWJhdHVtaSwg0JPRgNGD0LfQuNGP!5e0!3m2!1sru!2sua!4v1593718778950!5m2!1sru!2sua"
                                                width="2400" height="400" frameborder="0" style="border:0;"
                                                allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                        </div>
                                    </div>
                                </li>
                                <!--<li>
                                    <time class="cbp_tmtime" datetime="2017-10-22T12:13"><span>4 Июня, 17:30</span>
                                        <span></span></time>
                                    <div class="cbp_tmicon bg-info"><i class="zmdi zmdi-camera"></i></div>
                                    <div class="demo-gallery cbp_tmlabel">
                                        <h2>Фоторепортаж с конференции в Батуми</h2>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6 col-6"><a href="javascript:void(0);"><img
                                                        src="assets/grb/assets/images/media/1.jpg" alt=""
                                                        class="img-fluid img-thumbnail mt-4"></a> </div>
                                            <div class="col-lg-3 col-md-6 col-6"><a href="javascript:void(0);"> <img
                                                        src="assets/grb/assets/images/media/2.jpg" alt=""
                                                        class="img-fluid img-thumbnail mt-4"></a> </div>
                                            <div class="col-lg-3 col-md-6 col-6"><a href=""> <img
                                                        src="assets/grb/assets/images/media/3.jpg" alt=""
                                                        class="img-fluid img-thumbnail mt-4"> </a> </div>
                                        </div>
                                    </div>
                                </li>-->
                            </ul>
                        </div>
                    </div>
                    <!-- ROW-1 CLOSED -->
                </div>
            </div>
            <!-- CONTAINER CLOSED -->
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
        <!-- FOOTER CLOSED -->
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

    <!-- CHART-CIRCLE JS-->
    <script src="assets/grb/assets/js/circle-progress.min.js"></script>

    <!-- RATING STAR JS-->
    <script src="assets/grb/assets/plugins/rating/jquery.rating-stars.js"></script>

    <!-- INPUT MASK JS-->
    <script src="assets/grb/assets/plugins/input-mask/jquery.mask.min.js"></script>

    <!-- SIDE-MENU JS -->
    <script src="assets/grb/assets/plugins/sidemenu/sidemenu.js"></script>

    <!-- GALLERY JS -->
    <script src="assets/grb/assets/plugins/gallery/picturefill.js"></script>
    <script src="assets/grb/assets/plugins/gallery/lightgallery.js"></script>
    <script src="assets/grb/assets/plugins/gallery/lightgallery-1.js"></script>
    <script src="assets/grb/assets/plugins/gallery/lg-pager.js"></script>
    <script src="assets/grb/assets/plugins/gallery/lg-autoplay.js"></script>
    <script src="assets/grb/assets/plugins/gallery/lg-fullscreen.js"></script>
    <script src="assets/grb/assets/plugins/gallery/lg-zoom.js"></script>
    <script src="assets/grb/assets/plugins/gallery/lg-hash.js"></script>
    <script src="assets/grb/assets/plugins/gallery/lg-share.js"></script>

    <!-- CUSTOM SCROLL BAR JS-->
    <script src="assets/grb/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- SIDEBAR JS -->
    <script src="assets/grb/assets/plugins/sidebar/sidebar.js"></script>

    <!-- SELECT2 JS -->
    <script src="assets/grb/assets/plugins/select2/select2.full.min.js"></script>

    <!-- CUSTOM JS-->
    <script src="assets/grb/assets/js/custom.js"></script>

</body>

</html>