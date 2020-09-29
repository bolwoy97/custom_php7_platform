<!-- Page Sidebar Start -->
<!--================================-->
<div class="page-sidebar">
    <div class="logo">
        <a class="logo-img" href="/">
            <img class="desktop-logo" src="/assets/img/logo.svg" alt="">
        </a>
        <i class="ion-ios-close-empty" id="sidebar-toggle-button-close"><svg xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" class="feather feather-x wd-20">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg></i>
    </div>
    <!--================================-->
    <!-- Sidebar Menu Start -->
    <!--================================-->
    <div class="page-sidebar-inner">
        <div class="page-sidebar-menu">
            <ul class="accordion-menu">
                <li class="mg-l-20-force mg-t-25-force menu-navigation"></li>
                <li class="<?=($pn==1)?'active':''?>">
                    <a href="tw_admin"><i data-feather="credit-card"></i>
                        <span>Home</span>
                        <?if($pn==1){?><i class="accordion-icon fal fa-angle-right"></i>
                        <?}?></a>
                </li>

                <li class="<?=($pn=='adm_all_users')?'active':''?>">
                    <a href="adm_all_users"><i data-feather="users"></i>
                        <span>All users </span>
                </li>


                <li class="<?=($pn=='adm_tg_purchases')?'active':''?>">
                    <a href="adm_tg_purchases"><i data-feather="users"></i>
                        <span>Telegram purchases </span>
                        <?if($pn=='adm_tg_purchases'){?><i class="accordion-icon fal fa-angle-right"></i>
                        <?}?></a>
                </li>

                <li class="<?=($pn=='adm_unact_users')?'active':''?>">
                    <a href="adm_unact_users"><i data-feather="users"></i>
                        <span>Unactive users </span>
                </li>

                <li class="<?=($pn=='additions')?'active':''?>">
                    <a href="adm_additions"><i data-feather="credit-card"></i>
                        <span>Additions</span>
                        <?if($pn=='additions'){?><i class="accordion-icon fal fa-angle-right"></i>
                        <?}?></a>
                </li>
                <li class="<?=($pn=='adm_sales')?'active':''?>">
                    <a href="adm_sales"><i data-feather="credit-card"></i>
                        <span>Token sales</span>
                        <?if($pn=='adm_sales'){?><i class="accordion-icon fal fa-angle-right"></i>
                        <?}?></a>
                </li>
                <li class="<?=($pn=='adm_bonus')?'active':''?>">
                    <a href="adm_bonus"><i data-feather="credit-card"></i>
                        <span>Set bonus</span>
                        <?if($pn=='adm_bonus'){?><i class="accordion-icon fal fa-angle-right"></i>
                        <?}?></a>
                </li>


                <li class="<?=($pn=='adm_tok2')?'active':''?>">
                    <a href="adm_tok2"><i data-feather="credit-card"></i>
                        <span>Set GRD2</span>
                        <?if($pn=='adm_tok2'){?><i class="accordion-icon fal fa-angle-right"></i>
                        <?}?></a>
                </li>

                <li class="<?=($pn=='adm_ref_prog')?'active':''?>">
                    <a href="adm_ref_prog"><i data-feather="users"></i>
                        <span>Bonus program </span>
                        <?if($pn=='adm_ref_prog'){?><i class="accordion-icon fal fa-angle-right"></i>
                        <?}?></a>
                </li>

                <li class="<?=($pn=='adm_partner_prog')?'active':''?>">
                    <a href="adm_partner_prog"><i data-feather="users"></i>
                        <span>Leader program </span>
                        <?if($pn=='adm_partner_prog'){?><i class="accordion-icon fal fa-angle-right"></i>
                        <?}?></a>
                </li>


                <?if($_SESSION['user']['login']=='tester1'){?>
                <li>
                    <a href="adm_flags_partner_prog">--
                        <span>Leader program flags </span>
                        <?if($pn=='adm_flags_partner_prog'){?><i class="accordion-icon fal fa-angle-right"></i>
                        <?}?></a>
                </li>
                <?}?>
                <li>
                    <a href="adm_script_partner_prog">--
                        <span>Leader program custom script </span>
                    </a>
                </li>
                
                <li class="<?=($pn=='adm_p_2_p')?'active':''?>">
                    <a href="adm_p_2_p">P2P
                        <span> Edit P to P </span>
                    </a>
                </li>


                <li class="<?=($pn=='adm_refadm_gr_orders_prog')?'active':''?>">
                    <a href="adm_gr_orders"><i data-feather="users"></i>
                        <span>Residence orders </span>
                </li>


                <li class="<?=($pn=='gridpay')?'active':''?>">
                    <a href="adm_gridpay"><i data-feather="users"></i>
                        <span>GridPay </span>
                        <?if($pn=='gridpay'){?><i class="accordion-icon fal fa-angle-right"></i>
                        <?}?></a>
                </li>
                <!---->
                <li class="<?=($pn=='adm_gridpay_transfers')?'active':''?>">
                    <a href="adm_gridpay_transfers">--
                        <span>GridPay transfers </span>
                        <?if($pn=='adm_gridpay_transfers'){?><i class="accordion-icon fal fa-angle-right"></i>
                        <?}?></a>
                </li>



                <li class="<?=($pn==3)?'active':''?>">
                    <a href="adm_orders"><i data-feather="users"></i>
                        <span>Orders</span>
                        <?if($pn==3){?><i class="accordion-icon fal fa-angle-right"></i>
                        <?}?></a>
                </li>

                <li class="<?=($pn==4)?'active':''?>">
                    <a href="adm_user-0"><i data-feather="users"></i>
                        <span>User</span>
                        <?if($pn==3){?><i class="accordion-icon fal fa-angle-right"></i>
                        <?}?></a>
                </li>
                <li class="<?=($pn=='adm_verifications')?'active':''?>">
                    <a href="adm_verifications"><i data-feather="users"></i>
                        <span>Verifications</span>
                        <?if($pn=='adm_verifications'){?><i class="accordion-icon fal fa-angle-right"></i>
                        <?}?></a>
                </li>
                <li class="<?=($pn==2)?'active':''?>">
                    <a href="adm_news"><i data-feather="monitor"></i>
                        <span>News</span>
                        <?if($pn==3){?><i class="accordion-icon fal fa-angle-right"></i>
                        <?}?></a>
                </li>

                <li class="">
                    <a href="logout"><i data-feather="log-out"></i>
                        <span>Log Out</a>
                </li>
            </ul>
        </div>
    </div>
    <!--/ Sidebar Menu End -->
    <!--================================-->
</div>
<!--/ Page Sidebar End -->