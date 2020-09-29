<!--APP-SIDEBAR-->
<div class="app-header ">
    <div class="header-style1">
        <a class="header-brand" href="dashboard">
            <img src="assets/grb/assets/images/brand/logo.svg" class="header-brand-img desktop-logo" alt="logo">
        </a><!-- LOGO -->
    </div>
    <div class="app-sidebar__toggle" data-toggle="sidebar">
        <a class="open-toggle" href="#"><i class="icon icon-arrow-left"></i></a>
        <a class="close-toggle" href="#"><i class="icon icon-arrow-right"></i></a>
    </div>
    <div class="d-flex  ml-auto header-right-icons">
        <!-- SEARCH -->
        <div class="dropdown d-md-flex message">
            <a class="nav-link icon text-center" data-toggle="dropdown">
                <i class="icon icon-logout"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                <a class="dropdown-item" href="/dashboard"> В Grid Group
                </a>
            </div>
        </div><!-- SIDE-MENU -->
    </div>
</div>
<!--APP-SIDEBAR-->

<!--APP-SIDEBAR-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="sidebar-user-settings">
        <div class="app-sidebar__user mb-4 mt-4">
            <div class="dropdown user-pro-body text-center">
                <div class="wideget-user-rating">
                    <a href="#"><i class="fa fa-home text-info"></i></a>
                    <a href="#"><i class="fa fa-home text-info"></i></a>
                    <a href="#"><i class="fa fa-home text-info"></i></a>
                    <a href="#"><i class="fa fa-home text-light"></i></a>
                    <a href="#"><i class="fa fa-home text-light"></i></a>
                    <a href="#"><i class="fa fa-home text-light"></i></a>
                    <a href="#"><i class="fa fa-home text-light"></i></a>
                    <a href="#"><i class="fa fa-home text-light"></i></a>
                    <a href="#"><i class="fa fa-home text-light"></i></a>
                    <a href="#"><i class="fa fa-home text-light"></i></a>
                </div>
                <div class="user-info">
                    <h5 class=" mb-1 font-weight-bold text-dark"><?=$_SESSION['user']['login']?></h5>
                    <!--<p>Статус</p>-->

                </div>
            </div>
        </div>
    </div>
    <ul class="side-menu">
        <li>
            <h3>Личный кабинет</h3>
        </li>
        <li>
            <a class="side-menu__item" href="/gr_dashboard"><span class="side-menu__label">Обзор</span><i
                    class="side-menu__icon fa fa-tv"></i></a>
        </li>
        <li>
            <a class="side-menu__item" href="/gr_events"><span class="side-menu__label">События</span><i
                    class="side-menu__icon fe fe-bell"></i></a>
        </li>
        <li>
            <h3>Grid Residence Batumi</h3>
        </li>
        <li>
            <a class="side-menu__item" href="/gr_complex"><span class="side-menu__label">Комплекс</span><i
                    class="side-menu__icon fe fe-home"></i></a>
        </li>
        <!--<li>
            <a class="side-menu__item" href="#"><span class="side-menu__label">BGRT</span><i
                    class="side-menu__icon fe fe-book-open"></i></a>
        </li>
        <li>
            <h3>Поддержка</h3>
        </li>
        <li>
            <a class="side-menu__item" href="#"><span class="side-menu__label">Telegram</span><i
                    class="side-menu__icon ion ion-paper-airplane"></i></a>
        </li>-->
    </ul>
</aside>
<!--/APP-SIDEBAR-->

<!-- Mobile Header -->
<div class="mobile-header">
    <div class="container-fluid">
        <div class="d-flex">
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="icon icon-arrow-left"></i></a>
                <a class="close-toggle" href="#"><i class="icon icon-arrow-right"></i></a>
            </div>
            <a class="header-brand" href="index.html">
                <img src="assets/grb/assets/images/brand/logo.svg" class="header-brand-img desktop-logo" alt="logo">
            </a>
            <div class="d-flex order-lg-2 ml-auto header-right-icons">
                <div class="dropdown profile-1">
                    <a  class="nav-link icon text-center" data-toggle="dropdown">
                        <i class="icon icon-logout"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <div class="dropdown-divider m-0"></div>
                        <a class="dropdown-item" href="/dashboard"> В Grid Group
                        </a>
                    </div>
                </div><!-- SIDE-MENU -->
            </div>
        </div>
    </div>
</div>
<!-- /Mobile Header -->