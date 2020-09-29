<?$lng=Language::get();?>

<!DOCTYPE HTML>
<html lang="ru">

<head>

    <!-- Global site tag (gtag.js) - Google Analytics 
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-169618338-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-169618338-1');
    </script>-->

    <?//require_once(ROOT.'/views/layouts/chat.php');?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta property="og:title" content="Grid Group">
    <meta property="og:type" content="article" />
    <meta property="og:image" content="https://gridgroup.cc/res/url_img/img_1.png">
    <meta property="og:description" content="<?=$lng['txt1']?>">
    <meta property="og:url" content="https://gridgroup.cc/res/url_img/img_1.png">
    <meta name="twitter:card" content="summary_large_image">

    <!-- Style CSS -->
    <link rel="stylesheet" href="/assets/land/css/style.css?v=prod">
    <link rel="shortcut icon" href="/assets/img/favicon.png" type="image/png">
    <title><?=$lng['txt1']?></title>
    <script charset="UTF-8" src="//web.webpushs.com/js/push/c2cc1592a837d516f8259639a98cf886_1.js" async></script>
    <link rel="stylesheet" href="/res/custom/css/style.css">
</head>

<body>

    <div class="fixed-nav-mobile" style="">
        <div>
            <a class="navbar-brand" href="#"><img src="assets/img/logo.svg"></a>
            <button class="navbar-toggler" type="button" style="">
                <img src="/assets/land/image/times.png">
            </button>
        </div>
        <div class="navbar-nav__wrap">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#aboutus"><?=$lng['txt2']?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#roadmap"><?=$lng['txt3']?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#howwork"><?=$lng['txt4']?></a>
                </li>
                <?/*<li class="nav-item">
                    <a class="nav-link" href="#team"><?=$lng['txt5']?></a>
                </li>*/?>
                <li class="nav-item">
                    <a class="nav-link" href="#epresale"><?=$lng['txt6']?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#decision"><?=$lng['txt7']?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-outline-primary" href="res/docs/whitepaper.pdf" target="_blank">
                        <img src="/assets/land/image/paper-icon.png"><?=$lng['txt8']?>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropbtn" href="#">
                        <img src="/assets/land/image/<?=strtolower(Language::curLang())?>.png">
                    </a>
                    <div class="dropdown-content">
                        <a href="/language-ru"><img src="/assets/land/image/ru.png"></a>
                        <a href="/language-en"><img src="/assets/land/image/en.png"></a>
                    </div>
                </li>

            </ul>
        </div>
    </div>
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="assets/img/logo.svg"></a>
            <a class="btn-default-login mobile" href="login"><?=$lng['txt9']?></a>
            <a class="btn-primary mobile" href="register"><?=$lng['txt10']?></a>
            <button class="navbar-toggler mobile" type="button" style="">
                <img src="/assets/land/image/menu.png">
            </button>


            <div class="navbar-nav__wrap">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#aboutus"><?=$lng['txt2']?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#roadmap"><?=$lng['txt3']?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#howwork"><?=$lng['txt4']?></a>
                    </li>
                    <?/*<li class="nav-item">
                        <a class="nav-link" href="#team"><?=$lng['txt5']?></a>
                    </li>*/?>
                    <li class="nav-item">
                        <a class="nav-link" href="#epresale"><?=$lng['txt6']?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#decision"><?=$lng['txt7']?></a>
                    </li>


                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link btn-default-login" href="login"><?=$lng['txt9']?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-primary" href="register">
                            <?=$lng['txt10']?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-outline-primary" href="res/docs/whitepaper.pdf" target="_blank">
                            <img src="/assets/land/image/paper-icon.png"> <?=$lng['txt8']?>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropbtn" href="#">
                            <img src="/assets/land/image/<?=strtolower(Language::curLang())?>.png">
                        </a>
                        <div class="dropdown-content">
                            <a href="/language-ru"><img src="/assets/land/image/ru.png"></a>
                            <a href="/language-en"><img src="/assets/land/image/en.png"></a>
                        </div>

                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <header class="header">
        <div class="header__overlay"></div>
        <section class="container-flex">
            <div class="col-flex header__desc">
                <h1 class="header__title">
                    <?=$lng['txt11']?>
                    <span>Grid Group</span>
                </h1>
                <img src="/assets/land/image/header-line.png" class="header__title_margin">
                <div class="header__text">
                    <p><?=$lng['txt12']?></p>
                </div>
                <!--<div class="container-flex header__labels">
                        <div class="col-flex">
                            <img src="/assets/land/image/foundico.png">
                        </div>
                        <div class="col-flex">
                            <img src="/assets/land/image/trackico.png">
                        </div>
                        <div class="col-flex">
                            <img src="/assets/land/image/icobench.png">
                        </div>
                    </div>-->
            </div>
            <div class="col-flex presale">
                <div class="presale__wrap">
                    <div>
                        <h3 class="presale__title">Stage <?=Option::get('stage')+1//$lng['txt13']?></h3>
                        <img src="/assets/land/image/small-line.png">
                        <!-- CountDownDate script function -->
                        <div class="counter"></div>
                        <!-- CountDownDate script function -->
                        <p class="presale__counter_text"><?=$lng['txt14']?> </p>
                        <hr />
                        <div class="presale__reg_btn" style="">
                            <a href="register" class="btn-primary-width" style=""><?=$lng['txt15']?></a>
                        </div>
                        <p class="presale__start">
                            <?=$lng['txt16']?> <a href="#">25.05.2020</a>
                        </p>
                        <p><?=$lng['txt17']?></p>
                    </div>
                </div>
            </div>
        </section>
    </header>

    <main>
        <section id="aboutus" class="aboutus">
            <div class="aboutus__overlay"></div>
            <div class="container" style="">
                <h2 class="aboutus__title"><?=$lng['txt2']?></h2>
                <img src="/assets/land/image/small-line.png" class="aboutus__title_line" style="">
                <div class="container-flex">
                    <div class="col-flex aboutus__text">
                        <div>
                            <div>
                                <?=$lng['txt18']?>
                            </div>
                            <div class="aboutus__social">
                                <a href="https://instagram.com/gridgroup_official?igshid=1qcxwh4x360y1" target="_blank">
                                    <img src="/assets/land/image/instagram.png"></a>
                                <a href="https://vk.com/gridofficial" target="_blank"> <img
                                        src="/assets/land/image/vk.png"></a>
                                <a href="https://www.facebook.com/gridgroupofficial" target="_blank"><img
                                        src="/assets/land/image/facebook.png"></a>
                                <a href="https://www.youtube.com/channel/UCt-fD7bhVEUN5fmy2Cz3s-g/" target="_blank"><img
                                        src="/assets/land/image/youtube.png"></a>
                                <a href="https://t.me/gridgroupofficiall" target="_blank"><img
                                        src="/assets/land/image/tg.png"></a>

                            </div>
                        </div>
                    </div>
                    <div class="col-flex aboutus__video">
                        <iframe width="460" height="250" src="https://www.youtube.com/embed/u7c-MHqkyH4" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </section>

        <section id="problems" class="problems">
            <div class="container problems__wrap">
                <h2 class="problems__title"><?=$lng['txt19']?></h2>
                <img src="/assets/land/image/small-line-w.jpg" class="problems__title_line">
                <div class="container-flex">
                    <div class="col-flex">
                        <div class="problems__item">
                            <div class="problems__item_image_wrap" style="">
                                <img src="/assets/land/image/money-icon.png" alt="">
                            </div>
                            <div class="problems__item_text_wrap" style="">
                                <h3 class="problems__item_title" style=""> <?=$lng['txt20']?><br /></h3>
                                <br />
                                <p><?=$lng['txt21']?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-flex">
                        <div class="problems__item">
                            <div class="problems__item_image_wrap">
                                <img src="/assets/land/image/user-ask-icon.png" alt="">
                            </div>
                            <div class="problems__item_text_wrap">
                                <h3 class="problems__item_title"> <?=$lng['txt22']?><br /></h3>
                                <br />
                                <p><?=$lng['txt23']?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-flex">
                        <div class="problems__item">
                            <div class="problems__item_image_wrap">
                                <img src="/assets/land/image/globus-icon.png" alt="">
                            </div>
                            <div class="problems__item_text_wrap">
                                <h3 class="problems__item_title"> <?=$lng['txt24']?><br /></h3>
                                <br />
                                <p><?=$lng['txt25']?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-flex">
                        <div class="problems__item">
                            <div class="problems__item_image_wrap">
                                <img src="/assets/land/image/problem4.png" alt="">
                            </div>
                            <div class="problems__item_text_wrap">
                                <h3 class="problems__item_title"> <?=$lng['txt26']?> <br /></h3>
                                <br />
                                <p><?=$lng['txt27']?></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section id="decision" class="decision">
            <div class="container decision__wrap">
                <h2 class="decision__title"><?=$lng['txt28']?></h2>
                <img src="/assets/land/image/small-line.png" class="decision__title_line" style="">
                <p class="decision__desc">
                    <?=$lng['txt29']?>
                </p>
                <div class="container-flex">
                    <div class="col-flex" style="">
                        <div class="decision__item">
                            <div class="decision__item_image_wrap" style="">
                                <img src="/assets/land/image/decision/decision1.png" alt="">
                            </div>
                            <div class="decision__item_text_wrap" style="">
                                <h3 class="decision__item_title" style=""> <?=$lng['txt30']?></h3>
                                <div class="decision__item_desc">
                                    <p>
                                        <?=$lng['txt31']?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-flex">
                        <div class="decision__item">
                            <div class="decision__item_image_wrap">
                                <img src="/assets/land/image/decision/decision2.png" alt="">
                            </div>
                            <div class="decision__item_text_wrap">
                                <h3 class="decision__item_title"> <?=$lng['txt32']?></h3>
                                <div class="decision__item_desc">
                                    <p>
                                        <?=$lng['txt33']?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-flex">
                        <div class="decision__item">
                            <div class="decision__item_image_wrap">
                                <img src="/assets/land/image/decision/decision3.png" alt="">
                            </div>
                            <div class="decision__item_text_wrap">
                                <h3 class="decision__item_title"> <?=$lng['txt34']?></h3>
                                <div class="decision__item_desc">
                                    <p>
                                        <?=$lng['txt35']?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-flex">
                        <div class="decision__item">
                            <div class="decision__item_image_wrap">
                                <img src="/assets/land/image/decision/decision4.png" alt="">
                            </div>
                            <div class="decision__item_text_wrap">
                                <h3 class="decision__item_title"> <?=$lng['txt36']?></h3>
                                <div class="decision__item_desc">
                                    <p>
                                        <?=$lng['txt37']?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section id="features" class="features">
            <div class="container features__wrap">
                <h2 class="features__title"><?=$lng['txt38']?></h2>
                <img src="/assets/land/image/small-line.png" class="features__title_line">
                <div class="container-flex">
                    <div class="col-flex">
                        <div class="features__item">
                            <img src="/assets/land/image/check-icon.png" alt="" class="features__item_img">
                            <div class="features__item_desc">
                                <h3 class="features__item_title"><?=$lng['txt39']?></h3>
                                <p class="features__item_text">
                                    <?=$lng['txt40']?>
                                </p>
                                <img src="/assets/land/image/simple-line.png">
                            </div>
                        </div>
                    </div>
                    <div class="col-flex">
                        <div class="features__item">
                            <img src="/assets/land/image/check-icon.png" alt="" class="features__item_img">
                            <div class="features__item_desc">
                                <h3 class="features__item_title"><?=$lng['txt41']?></h3>
                                <p class="features__item_text">
                                    <?=$lng['txt42']?>
                                </p>
                                <img src="/assets/land/image/simple-line.png">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="container-flex">
                    <div class="col-flex">
                        <div class="features__item">
                            <img src="/assets/land/image/check-icon.png" alt="" class="features__item_img">
                            <div class="features__item_desc">
                                <h3 class="features__item_title"><?=$lng['txt43']?></h3>
                                <p class="features__item_text">
                                    <?=$lng['txt44']?>
                                </p>
                                <img src="/assets/land/image/simple-line.png">
                            </div>

                        </div>
                    </div>
                    <div class="col-flex">
                        <div class="features__item">
                            <img src="/assets/land/image/check-icon.png" alt="" class="features__item_img">
                            <div class="features__item_desc">
                                <h3 class="features__item_title"><?=$lng['txt45']?></h3>
                                <p class="features__item_text">
                                    <?=$lng['txt46']?>
                                </p>
                                <img src="/assets/land/image/simple-line.png">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-flex">
                    <div class="col-flex">
                        <div class="features__item">
                            <img src="/assets/land/image/check-icon.png" alt="" class="features__item_img">
                            <div class="features__item_desc">
                                <h3 class="features__item_title"><?=$lng['txt47']?></h3>
                                <p class="features__item_text">
                                    <?=$lng['txt48']?>
                                </p>
                                <img src="/assets/land/image/simple-line.png">
                            </div>
                        </div>
                    </div>
                    <div class="col-flex">
                        <div class="features__item">
                            <img src="/assets/land/image/check-icon.png" alt="" class="features__item_img">
                            <div class="features__item_desc">
                                <h3 class="features__item_title"><?=$lng['txt49']?></h3>
                                <p class="features__item_text">
                                    <?=$lng['txt50']?>
                                </p>
                                <img src="/assets/land/image/simple-line.png">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section id="invest" class="invest">
            <div class="container invest__wrap">
                <h2 class="invest__title"><?=$lng['txt51']?></h2>
                <img src="/assets/land/image/small-line.png" class="invest__title_line">
                <p class="invest__desc"><?=$lng['txt52']?> </p>
                <div class="container-flex">
                    <div class="col-flex">
                        <div class="invest__item">
                            <img src="/assets/land/image/comercial1.png" alt="" class="invest__item_img">
                            <div>
                                <h3 class="invest__item_title"><?=$lng['txt53']?></h3>

                                <div class="invest__item_desc">
                                    <p>
                                        <?=$lng['txt54']?>
                                    </p>
                                </div>
                                <img src="/assets/land/image/simple-line.png">
                            </div>
                        </div>
                    </div>
                    <div class="col-flex">
                        <div class="invest__item">
                            <img src="/assets/land/image/comercial2.png" alt="" class="invest__item_img">
                            <div>
                                <h3 class="invest__item_title"><?=$lng['txt55']?></h3>

                                <div class="invest__item_desc">
                                    <p>
                                        <?=$lng['txt56']?>
                                    </p>
                                </div>
                                <img src="/assets/land/image/simple-line.png">
                            </div>
                        </div>
                    </div>
                    <div class="col-flex">
                        <div class="invest__item">
                            <img src="/assets/land/image/comercial3.png" alt="" class="invest__item_img">
                            <div>
                                <h3 class="invest__item_title"><?=$lng['txt57']?></h3>

                                <div class="invest__item_desc">
                                    <p><?=$lng['txt58']?>

                                    </p>
                                </div>
                                <img src="/assets/land/image/simple-line.png">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-flex">
                    <div class="col-flex">
                        <div class="invest__item">
                            <img src="/assets/land/image/comercial4.png" alt="" class="invest__item_img">
                            <div>
                                <h3 class="invest__item_title"><?=$lng['txt59']?></h3>

                                <div class="invest__item_desc">
                                    <p><?=$lng['txt60']?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-flex">
                        <div class="invest__item">
                            <img src="/assets/land/image/comercial5.png" alt="" class="invest__item_img">
                            <div>
                                <h3 class="invest__item_title">Privilege club</h3>

                                <div class="invest__item_desc">
                                    <p><?=$lng['txt61']?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-flex">
                        <div class="invest__item">
                            <img src="/assets/land/image/comercial6.png" alt="" class="invest__item_img">
                            <div>
                                <h3 class="invest__item_title"><?=$lng['txt62']?></h3>

                                <div class="invest__item_desc">
                                    <p><?=$lng['txt63']?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="howwork" class="howwork">
            <div class="container howwork__wrap">
                <h2 class="howwork__title"><?=$lng['txt64']?></h2>
                <img src="/assets/land/image/small-line-w.jpg" class="howwork__title_line">
                <div class="container-flex howwork__item_wrap">
                    <div class="col-flex howwork__item">
                        <div>
                            <div class="howwork__item_img">
                                <img src="/assets/land/image/how-work1.png" alt="">
                            </div>
                            <div class="howwork__item_desc"><?=$lng['txt65']?></div>
                        </div>
                    </div>
                    <div class="col-flex howwork__item">
                        <div>
                            <div class="howwork__item_img">
                                <img src="/assets/land/image/how-work2.png" alt="">
                            </div>
                            <div class="howwork__item_desc"><?=$lng['txt66']?></div>
                        </div>
                    </div>
                    <div class="col-flex howwork__item">
                        <div>
                            <div class="howwork__item_img">
                                <img src="/assets/land/image/how-work3.png" alt="">
                            </div>
                            <div class="howwork__item_desc"><?=$lng['txt67']?></div>
                        </div>
                    </div>
                    <div class="col-flex howwork__item">
                        <div>
                            <div class="howwork__item_img">
                                <img src="/assets/land/image/how-work4.png" alt="">
                            </div>
                            <div class="howwork__item_desc"><?=$lng['txt68']?></div>
                        </div>
                    </div>
                    <div class="col-flex howwork__item">
                        <div>
                            <div class="howwork__item_img">
                                <img src="/assets/land/image/how-work5.png" alt="">
                            </div>
                            <div class="howwork__item_desc"><?=$lng['txt69']?></div>
                        </div>
                    </div>
                    <div class="col-flex howwork__item">
                        <div>
                            <div class="howwork__item_img">
                                <img src="/assets/land/image/how-work6.png" alt="">
                            </div>
                            <div class="howwork__item_desc"><?=$lng['txt70']?></div>
                        </div>
                    </div>
                    <div class="col-flex howwork__item">
                        <div>
                            <div class="howwork__item_img">
                                <img src="/assets/land/image/how-work7.png" alt="">
                            </div>
                            <div class="howwork__item_desc"><?=$lng['txt71']?></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="about" class="about">
            <div class="container about__wrap">
                <div class="container-flex about__content">
                    <div class="col-flex about__item">
                        <h2 class="about__title"><?=$lng['txt72']?> </h2>
                        <img src="/assets/land/image/small-line.png" class="about__title_line">
                        <ul class="about__list">
                            <?=$lng['txt73']?>
                        </ul>
                        <p><?=$lng['txt74']?> </p>
                    </div>
                    <div class="col-flex about__item">
                        <img src="/assets/land/image/img-about.png" class="img-fluid">
                    </div>
                </div>
                <div class="container-flex about__quote">
                    <div class="col-flex about__quote_item">
                        <p></p>
                        <p><?=$lng['txt75']?>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section id="roadmap" class="roadmap">
            <div class="container roadmap__wrap">

                <h2 class="roadmap__title">Road Map</h2>
                <img src="/assets/land/image/small-line-w.jpg" class="roadmap__title_line">
                <p class="roadmap__description"><?=$lng['txt76']?></p>
                <div class="container-flex roadmap__content">
                    <div class="col-flex roadmap__item">
                        <div class="roadmap__item_bridge">
                            <!-- mobile -->
                            <img src="/assets/land/image/roadmap-line.png" class="bridge-m">
                            <!-- desktop -->
                            <img src="/assets/land/image/roadmap-line-d.png" class="bridge-d">
                        </div>
                        <div class="roadmap__item_desc">
                            <img src="/assets/land/image/step-check.png">
                            <h3 class="roadmap__item_title">Step I</h3>
                            <div class="roadmap__item_text"><?=$lng['txt77']?></div>
                            <!-- <div class="roadmap__item_date">03.07.19</div>-->
                        </div>
                    </div>
                    <div class="col-flex roadmap__item">
                        <div class="roadmap__item_bridge">
                            <!-- mobile -->
                            <img src="/assets/land/image/roadmap-line.png" class="bridge-m">
                            <!-- desktop -->
                            <img src="/assets/land/image/roadmap-line-d.png" class="bridge-d">
                        </div>
                        <div class="roadmap__item_desc">
                            <img src="/assets/land/image/step-check.png">
                            <h3 class="roadmap__item_title">Step III</h3>
                            <div class="roadmap__item_text"><?=$lng['txt78']?>
                            </div>
                            <!-- <div class="roadmap__item_date">10.08.19</div>-->
                        </div>
                    </div>
                    <div class="col-flex roadmap__item">
                        <div class="roadmap__item_bridge">
                            <!-- mobile -->
                            <img src="/assets/land/image/roadmap-line.png" class="bridge-m">
                            <!-- desktop -->
                            <img src="/assets/land/image/roadmap-line-d.png" class="bridge-d">
                        </div>
                        <div class="roadmap__item_desc">
                            <img src="/assets/land/image/step-check.png">
                            <h3 class="roadmap__item_title">Step V</h3>
                            <div class="roadmap__item_text">Private Sale</div>
                            <!-- <div class="roadmap__item_date">22.11.19</div>-->
                        </div>
                    </div>
                    <div class="col-flex roadmap__item">
                        <div class="roadmap__item_bridge">
                            <!-- desktop -->
                            <img src="/assets/land/image/roadmap-line-d-dis.png" class="bridge-d">
                        </div>
                        <div class="roadmap__item_bridge">
                            <!-- mobile -->
                            <img src="/assets/land/image/roadmap-line-dis.png" class="bridge-m">
                        </div>
                        <div class="roadmap__item_desc disabled">
                            <img src="/assets/land/image/step-uncheck.png">
                            <h3 class="roadmap__item_title">Step VII</h3>
                            <div class="roadmap__item_text">Beta-Version Platform Pre Launch</div>
                            <!--   <div class="roadmap__item_date">15.03.20</div>-->
                        </div>
                    </div>
                    <div class="col-flex roadmap__item bridge-d"></div>
                    <div class="col-flex roadmap__item_small bridge-d"></div>
                    <div class="col-flex roadmap__item">
                        <div class="roadmap__item_bridge">
                            <!-- mobile -->
                            <img src="/assets/land/image/roadmap-line.png" class="bridge-m">
                            <!-- desktop -->
                            <img src="/assets/land/image/roadmap-line-d.png" class="bridge-d">
                        </div>
                        <div class="roadmap__item_desc">
                            <img src="/assets/land/image/step-check.png">
                            <h3 class="roadmap__item_title">Step II</h3>
                            <div class="roadmap__item_text"><?=$lng['txt79']?></div>
                            <!--<div class="roadmap__item_date">10.08.19</div>-->
                        </div>
                    </div>
                    <div class="col-flex roadmap__item">
                        <div class="roadmap__item_bridge">
                            <!-- mobile -->
                            <img src="/assets/land/image/roadmap-line.png" class="bridge-m">
                            <!-- desktop -->
                            <img src="/assets/land/image/roadmap-line-d.png" class="bridge-d">
                        </div>
                        <div class="roadmap__item_desc">
                            <img src="/assets/land/image/step-check.png">
                            <h3 class="roadmap__item_title">Step IV</h3>
                            <div class="roadmap__item_text"><?=$lng['txt80']?></div>
                            <!--     <div class="roadmap__item_date">12.10.19</div>-->
                        </div>

                    </div>
                    <div class="col-flex roadmap__item">
                        <div class="roadmap__item_bridge">
                            <!-- mobile -->
                            <img src="/assets/land/image/roadmap-line-dis.png" class="bridge-m">
                            <!-- desktop -->
                            <img src="/assets/land/image/roadmap-line-d.png" class="bridge-d">
                        </div>
                        <div class="roadmap__item_desc">
                            <img src="/assets/land/image/step-check.png">
                            <h3 class="roadmap__item_title">Step VI</h3>
                            <div class="roadmap__item_text">STAGE 1-4 PRE-SALE</div>
                            <!--  <div class="roadmap__item_date">27.01.20</div>-->
                        </div>

                    </div>
                    <div class="col-flex roadmap__item">
                        <div class="roadmap__item_bridge">
                            <!-- desktop -->
                            <img src="/assets/land/image/roadmap-line-d-dis.png" class="bridge-d">
                        </div>
                        <div class="roadmap__item_desc disabled">
                            <img src="/assets/land/image/step-uncheck.png">
                            <h3 class="roadmap__item_title">Step VIII</h3>
                            <div class="roadmap__item_text">Launch Platform</div>
                            <!-- <div class="roadmap__item_date">10.08.20</div>-->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="news" class="news-section">
            <div class="container news-section__wrap">
                <h2 class="news-section__title"><?=$lng['txt90']?></h2>
                <img src="/assets/land/image/small-line.png" class="news-section__title_line">
                <div class="container-flex">
                    <?foreach($news as $new){?>
                    <div class="col-flex">
                        <div class="news-section__item">
                            <div class="news-section__item_image">
                                <?if(file_exists(IMG_ROOT.$new['img'])){?>
                                <img src="<?=IMG_ROOT.$new['img']?>" alt="">
                                <?}?>
                                <div class="news-section__item_wrap">
                                    <h3 class="news-section__item_title"><?=$new['title']?></h3>
                                    <p class="news-section__item_date"><?=$new['date']?></p>
                                </div>
                            </div>
                            <div>
                                <p>
                                    <?=mb_substr($new['text'], 0, 300,'UTF-8').'...'?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?}?>
                    <!--<div class="col-flex">
                        <div class="news-section__item">
                            <div class="news-section__item_image">
                                <img src="/assets/land/image/news/news1.png">
                                <div class="news-section__item_wrap">
                                    <h3 class="news-section__item_title">У девелоперов кризис закончился</h3>
                                    <p class="news-section__item_date">25.05.2020</p>
                                </div>
                            </div>
                            <div>
                                <p>
                                    В Москве снижается объем пустующих офисных и торговых помещений, что дало повод
                                    столичным чиновникам говорить о росте деловой активности.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-flex">
                        <div class="news-section__item">
                            <div class="news-section__item_image">
                                <img src="/assets/land/image/news/news2.png">
                                <div class="news-section__item_wrap">
                                    <h3 class="news-section__item_title">Петербург обошел Москву по объему инвестиций
                                    </h3>
                                    <p class="news-section__item_date">25.05.2020</p>
                                </div>
                            </div>
                            <div>
                                <p>
                                    В первом квартале 2018 года Санкт-Петербург впервые за историю рынка вышел на первое
                                    место в России по объему инвестиций в недвижимость.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-flex">
                        <div class="news-section__item">
                            <div class="news-section__item_image">
                                <img src="/assets/land/image/news/news1.png">
                                <div class="news-section__item_wrap">
                                    <h3 class="news-section__item_title">У девелоперов кризис закончился</h3>
                                    <p class="news-section__item_date">25.05.2020</p>
                                </div>
                            </div>
                            <div>
                                <p>
                                    В Москве снижается объем пустующих офисных и торговых помещений, что дало повод
                                    столичным чиновникам говорить о росте деловой активности.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-flex">
                        <div class="news-section__item">
                            <div class="news-section__item_image">
                                <img src="/assets/land/image/news/news2.png">
                                <div class="news-section__item_wrap">
                                    <h3 class="news-section__item_title">Петербург обошел Москву по объему инвестиций
                                    </h3>
                                    <p class="news-section__item_date">25.05.2020</p>
                                </div>
                            </div>
                            <div>
                                <p>
                                    В первом квартале 2018 года Санкт-Петербург впервые за историю рынка вышел на первое
                                    место в России по объему инвестиций в недвижимость.
                                </p>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </section>
        <?/*<section id="team" class="team-section">
            <div class="container team-section__wrap">
                <h2 class="team-section__title"><?=$lng['txt107']?></h2>
                <img src="/assets/land/image/small-line.png" class="team-section__title_line">
                <p class="team-section__description">
                    <?=$lng['txt91']?>
                </p>
                <div class="container-flex">
                    <div class="col-flex">
                        <div class="team-section__item">
                            <img src="/assets/land/image/photo_1.png">
                            <h3 class="team-section__item_title"><?=$lng['txt92']?></h3>
                            <img src="/assets/land/image/small-line.png" class="team-section__item_title_line">
                            <div class="team-section__item_subtitle">

                            </div>
                            <div class="team-section__item_description">
                                <?=$lng['txt94']?>
                            </div>
                        </div>
                    </div>
                    <div class="col-flex">
                        <div class=" team-section__item">
                            <img src="/assets/land/image/photo_2.png">
                            <h3 class="team-section__item_title"><?=$lng['txt93']?></h3>
                            <img src="/assets/land/image/small-line.png" class="team-section__item_title_line">
                            <div class="team-section__item_subtitle">

                            </div>
                            <div class="team-section__item_description">
                                <?=$lng['txt95']?>
                            </div>
                        </div>
                    </div>
                    <div class="col-flex">
                        <div class=" team-section__item">
                            <img src="/assets/land/image/photo_3.png">
                            <h3 class="team-section__item_title"><?=$lng['txt96']?></h3>
                            <img src="/assets/land/image/small-line.png" class="team-section__item_title_line">
                            <div class="team-section__item_subtitle">

                            </div>
                            <div class="team-section__item_description">
                                <?=$lng['txt97']?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-flex">
                    <div class="col-flex">
                        <div class="team-section__item">
                            <img src="/assets/land/image/photo_4.png">
                            <h3 class="team-section__item_title">Давид Бабенко</h3>
                            <img src="/assets/land/image/small-line.png" class="team-section__item_title_line">
                            <div class="team-section__item_subtitle">

                            </div>
                            <div class="team-section__item_description">
                                <?=$lng['txt184']?>
                            </div>
                        </div>
                    </div>
                    <div class="col-flex">
                        <div class=" team-section__item">
                            <img src="/assets/land/image/photo_5.png">
                            <h3 class="team-section__item_title">Сандро Абесламидзе</h3>
                            <img src="/assets/land/image/small-line.png" class="team-section__item_title_line">
                            <div class="team-section__item_subtitle">

                            </div>
                            <div class="team-section__item_description">
                                <?=$lng['txt185']?>
                            </div>
                        </div>
                    </div>
                    <div class="col-flex">
                        <div class=" team-section__item">
                            <img src="/assets/land/image/photo_6.png">
                            <h3 class="team-section__item_title">Финогенов Валентин</h3>
                            <img src="/assets/land/image/small-line.png" class="team-section__item_title_line">
                            <div class="team-section__item_subtitle">

                            </div>
                            <div class="team-section__item_description">
                                <?=$lng['txt186']?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>*/?>

    </main>

    <footer class="footer">
        <section class="container-flex">
            <div class="col-flex footer__item">
                <div class="footer__form_wrap">
                    <div class="footer__form_digit">1</div>
                    <h2 class="footer__form_title"><?=$lng['txt98']?></h2>
                    <img src="/assets/land/image/small-line.png" class="footer__form_title_line">
                    <div class="footer__text">
                        <p><?=$lng['txt99']?>
                        </p>
                    </div>
                    <div class="footer__form_wrapper">
                        <form class="form-inline">
                            <input type="text" name="email" class="subscribe_email" placeholder="Введите свой e-mail">
                            <button type="submit" class="subscribe_submit btn-primary"><?=$lng['txt100']?></button>
                        </form>
                    </div>
                    <div>
                        <p class="footer__form_subtext"><?=$lng['txt101']?></p>
                        <hr />
                        <p class="example_email"><?=$lng['txt102']?>: name@mail.com</p>
                    </div>
                </div>
            </div>
            <div class="col-flex footer__item">
                <div class="presale__wrap">
                    <div>
                        <h3 class="presale__title"><?=$lng['txt103']?>:</h3>
                        <img src="/assets/land/image/small-line.png">
                        <!-- CountDownDate script function -->
                        <div class="counter"></div>
                        <!-- CountDownDate script function -->
                        <p class="presale__counter_text"><?=$lng['txt104']?></a> </p>
                        <hr />
                        <div class="presale__reg_btn" style="">
                            <a href="register" class="btn-primary-width" style=""><?=$lng['txt15']?></a>
                        </div>
                        <p class="presale__start">
                            <?=$lng['txt105']?> <a href="#">25.05.2020</a>
                        </p>
                        <p>
                            <?=$lng['txt106']?>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <nav class="navbar">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="/assets/land/image/logo-w.png"></a>
                <a class="btn-default-login mobile" href="#"><?=$lng['txt9']?></a>
                <button class="navbar-toggler mobile" type="button">
                    <img src="/assets/land/image/menu.png">
                </button>
                <div class="navbar-nav__wrap">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#aboutus"><?=$lng['txt2']?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#roadmap"><?=$lng['txt3']?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#howwork"><?=$lng['txt4']?></a>
                        </li>
                        <?/*<li class="nav-item">
                            <a class="nav-link" href="#team"><?=$lng['txt107']?></a>
                        </li>*/?>
                        <li class="nav-item">
                            <a class="nav-link" href="#epresale"><?=$lng['txt6']?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#decision"><?=$lng['txt7']?></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link btn-default-login" href="login"><?=$lng['txt9']?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-primary" href="register">
                                <?=$lng['txt10']?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary" href="res/docs/whitepaper.pdf" target="_blank">
                                <img src="/assets/land/image/paper-icon-w.png"> <?=$lng['txt8']?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </footer>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js "
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="/assets/land/js/scripts.js"></script>
    <script type="text/javascript">
    CountDownDate("<?=(new DateTime('tomorrow'))->format('Y-m-d')//$curStage['start']?>");
    </script>

    <script src="/res/js/serviceworker.js"></script>
    <script src="/res/js/serviceworker-update.js"></script>

    <script>
    ! function(e, t, d, s, a, n, c) {
        e[a] = {}, e[a].date = (new Date).getTime(), n = t.createElement(d), c = t.getElementsByTagName(d)[0], n.type =
            "text/javascript", n.async = !0, n.src = s, c.parentNode.insertBefore(n, c)
    }(window, document, "script", "https://gridgroupcc.push.world/https.embed.js", "pw"), pw.websiteId =
        "5867ff08720e65096907c07c897102a03594860b5b40c46db7e692f8b6e81232";
    </script>

</body>

</html>