<?$pn='adm_ref_prog'?>
<?require_once(ROOT.'/views/layouts/adm/head.php');?>

<body>
    <!--================================-->
    <!-- Page Container Start -->
    <!--================================-->
    <div class="page-container">
        <!--================================-->
        <?
                require_once(ROOT.'/views/layouts/adm/sidebar.php');
            ?>
        <!--================================-->
        <!-- Page Content Start -->
        <!--================================-->
        <div class="page-content">
            <!--================================-->
            <?
                require_once(ROOT.'/views/layouts/adm/header.php');
            ?>
            <!--================================-->
            <!-- Page Inner Start -->
            <!--================================-->
            <div class="page-inner">
                <!-- Wrapper -->
                <div class="wrapper">
                    <!--================================-->
                    <!-- Breadcrumb Start -->
                    <!--================================-->
                    <div class="pageheader pd-t-25 pd-b-10">
                        <? 
                        require_once(ROOT.'/views/layouts/messages.php');
                    ?>
                    </div>
                    <!--/ Breadcrumb End -->
                    <div class="row clearfix">
                        <!--================================-->
                        <div class="col-8">
                            <div class="card mg-b-30">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="card-header-title tx-13 mb-0 text-uppercase">Set bonus
                                        </h6>

                                    </div>
                                </div>
                                <div class="card-body pd-0">
                                    <?if(!$cur_ref_prog){?>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <form action="adm_set_ref_prog" method="post">
                                            <label>Start </label>
                                            <input type="datetime-local" name="start" required>
                                            <br>
                                            <label>End </label>
                                            <input type="datetime-local" name="end" required>
                                            <hr>

                                            <label>% on Lvl </label><br>
                                            1-<input type="number" step="0.01" name="rates[1]" min="0" required>
                                            2-<input type="number" step="0.01" name="rates[2]" min="0" required>
                                            3-<input type="number" step="0.01" name="rates[3]" min="0" required>
                                            4-<input type="number" step="0.01" name="rates[4]" min="0" required>
                                            5-<input type="number" step="0.01" name="rates[5]" min="0" required>
                                            6-<input type="number" step="0.01" name="rates[6]" min="0" required>
                                            7-<input type="number" step="0.01" name="rates[7]" min="0" required>
                                            <hr>

                                            <label>Rewards </label><br>
                                            <input type="number" step="0.01" name="rewards[1][amount]" min="0"
                                                placeholder="Min" required>-
                                            <input type="number" step="0.01" name="rewards[1][reward]" min="0"
                                                placeholder="Revard" required>
                                            <br>
                                            <input type="number" step="0.01" name="rewards[2][amount]" min="0"
                                                placeholder="Amount2" required>-
                                            <input type="number" step="0.01" name="rewards[2][reward]" min="0"
                                                placeholder="Revard" required>
                                            <br>
                                            <input type="number" step="0.01" name="rewards[3][amount]" min="0"
                                                placeholder="Amount3" required>-
                                            <input type="number" step="0.01" name="rewards[3][reward]" min="0"
                                                placeholder="Revard" required>
                                            <br>
                                            <input type="number" step="0.01" name="rewards[4][amount]" min="0"
                                                placeholder="Max" required>-
                                            <input type="number" step="0.01" name="rewards[4][reward]" min="0"
                                                placeholder="Revard" required>
                                            <hr>
                                            <button type="submit">Start program</button>

                                        </form>

                                    </div>
                                    <?}else{?>
                                    <hr>
                                    <div class="d-flex justify-content-between align-items-center">

                                        Start: <?=$cur_ref_prog['start']?><br>
                                        End: <?=$cur_ref_prog['end']?>
                                        <hr>
                                        % on Lvl <br>
                                        <?foreach ($cur_ref_prog['rates'] as $k=>$rate) {?>
                                        <?="$k lvl => $rate%"?><br>
                                        <?}?>
                                        <hr>
                                        Rewards <br>
                                        <?foreach ($cur_ref_prog['rewards'] as $k=>$reward) {?>
                                        <?="{$reward['amount']} USD => {$reward['reward']}$"?><br>
                                        <?}?>
                                        <hr>

                                        <hr>
                                        <br>
                                        <form action="adm_set_ref_prog" method="post">
                                            <input type="hidden" name="abort" value="1">
                                            <button type="submit">Abort program</button>
                                        </form>
                                    </div>
                                    <?}?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-12">

                            <div class="card mg-b-30">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="card-header-title tx-13 mb-0 text-uppercase">Current referal program purchases
                                        </h6>
                                        <div class="text-right">
                                            <div class="d-flex">
                                                <div class="dropdown" data-toggle="dropdown">
                                                    <a href=""><i class="ti-more-alt"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="" class="dropdown-item"><i data-feather="info"
                                                                class="wd-16 mr-2"></i>Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mg-b-40">
                                    <div class="card-body pd-0">
                                        <table id="basicDataTable" class="table hover responsive display nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Login</th>
                                                    <th>Ammount</th>
                                                    <th>Rate</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?foreach($cur_recs as $bon){?>
                                                <?$usr = UserService::getById($bon['user']);?>
                                                <tr>
                                                    <td><?=$bon['date']?></td>
                                                    <td><a target="_blank"
                                                            href="adm_user-<?=$usr['id']?>"><?=$usr['login']?></a> </td>
                                                    <td><?=$bon['sum']?></td>
                                                    <td><?=$bon['rate']?></td>
                                                </tr>
                                                <?}?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Login</th>
                                                    <th>Ammount</th>
                                                    <th>Rate</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="card mg-b-30">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="card-header-title tx-13 mb-0 text-uppercase">All referal program purchases
                                        </h6>
                                        <div class="text-right">
                                            <div class="d-flex">
                                                <div class="dropdown" data-toggle="dropdown">
                                                    <a href=""><i class="ti-more-alt"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="" class="dropdown-item"><i data-feather="info"
                                                                class="wd-16 mr-2"></i>Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mg-b-40">
                                    <div class="card-body pd-0">
                                        <table id="basicDataTable1" class="table hover responsive display nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Login</th>
                                                    <th>Ammount</th>
                                                    <th>Rate</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?foreach($all_recs as $bon){?>
                                                <?$usr = UserService::getById($bon['user']);
                                                //$usr = User::getUserInfo($bon['user']);?>
                                                <tr>
                                                    <td><?=$bon['date']?></td>
                                                    <td><a target="_blank"
                                                            href="adm_user-<?=$usr['id']?>"><?=$usr['login']?></a> </td>
                                                    <td><?=$bon['sum']?></td>
                                                    <td><?=$bon['rate']?></td>
                                                </tr>
                                                <?}?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Login</th>
                                                    <th>Ammount</th>
                                                    <th>Rate</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!--/ dataTables End -->
            </div>
            <!--/ Wrapper End -->
        </div>
        <!--/ Page Inner End -->
        <!--================================-->
        <!-- Page Footer Start -->
        <!--================================-->
        <!--<footer class="page-footer">
            <div class="pd-t-4 pd-b-0 pd-x-20">
                <div class="tx-10 tx-uppercase tx-gray-500 tx-spacing-1">
                    <p class="pd-y-10 mb-0">Copyright&copy; 2020
                </div>
            </div>
        </footer>-->
        <!--/ Page Footer End -->
        <!--</div> -->
    </div>
    </div>
    <!--Modal Twitter-->
    <div class="modal fade effect-scale" id="signIn" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="admprs-<?=$user['id']?>" method="post">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                        <h5 class="tx-18 tx-sm-20 mg-b-30">Access to Sign In</h5>
                        <div class="d-sm-flex">
                            <!-- col -->
                            <div class="flex-fill">
                                <div class="custom-control custom-checkbox">
                                    <input name="ban_enter" <?=$user['ban_enter']?'checked':''?> type="checkbox"
                                        class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Prohibition of Sign
                                        In</label>
                                </div>
                            </div>
                            <input type="hidden" name="ch_ban_enter" value="1">
                            <!-- col -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mg-b-5 mg-sm-b-0">Save</button>
                    </div>
                </form>
                <!-- modal-footer -->
            </div>
            <!-- modal-content -->
        </div>
    </div>
    <!--/ Modal End-->
    <!--Modal Twitter-->
    <div class="modal fade effect-scale" id="withdrawal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="admprs-<?=$user['id']?>" method="post">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                        <h5 class="tx-18 tx-sm-20 mg-b-30">Access to Withdrawal</h5>
                        <div class="d-sm-flex">
                            <!-- col -->
                            <div class="flex-fill">
                                <div class="custom-control custom-checkbox">
                                    <input name="ban_width" <?=$user['ban_width']?'checked':''?> type="checkbox"
                                        class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label" for="customCheck2">Prohibition of
                                        Withdrawal</label>
                                </div>
                            </div>
                            <input type="hidden" name="ch_ban_width" value="1">
                            <!-- col -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mg-b-5 mg-sm-b-0">Save</button>
                    </div>
                </form>
                <!-- modal-footer -->
            </div>
            <!-- modal-content -->
        </div>
    </div>
    <!--/ Modal End-->
    <!--Modal Investing-->
    <div class="modal fade effect-scale" id="investing" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="admprs-<?=$user['id']?>" method="post">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                        <h5 class="tx-18 tx-sm-20 mg-b-30">Access to Investing</h5>
                        <div class="d-sm-flex">
                            <!-- col -->
                            <div class="flex-fill">
                                <div class="custom-control custom-checkbox">
                                    <input name="ban_deps" <?=$user['ban_deps']?'checked':''?> type="checkbox"
                                        class="custom-control-input" id="customCheck3">
                                    <label class="custom-control-label" for="customCheck3">Prohibition of
                                        Withdrawal</label>
                                </div>
                            </div>
                            <input type="hidden" name="ch_ban_deps" value="1">
                            <!-- col -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mg-b-5 mg-sm-b-0">Save</button>
                    </div>
                </form>
                <!-- modal-footer -->
            </div>
            <!-- modal-content -->
        </div>
    </div>
    <!--/ Modal End-->
    <!--Modal Twitter-->
    <div class="modal fade effect-scale" id="twitter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="admprs-<?=$user['id']?>" method="post">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                        <h5 class="tx-18 tx-sm-20 mg-b-30">Twitter</h5>
                        <div class="d-sm-flex">
                            <!-- col -->
                            <div class="flex-fill">
                                <div class="input-group mg-b-10">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon4"><i
                                                class="fab fa-twitter tx-twitter wd-16"></i></span>
                                    </div>
                                    <input name="twit" type="text" class="form-control" placeholder="<?=$user['twit']?>"
                                        aria-label="twitter" aria-describedby="basic-addon4">
                                </div>
                            </div>
                            <!-- col -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mg-b-5 mg-sm-b-0">Change Twitter</button>
                    </div>
                </form>
                <!-- modal-footer -->
            </div>
            <!-- modal-content -->
        </div>
    </div>
    <!--/ Modal End-->
    <!--Modal Twitter-->
    <div class="modal fade effect-scale" id="facebook" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="admprs-<?=$user['id']?>" method="post">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                        <h5 class="tx-18 tx-sm-20 mg-b-30">Facebook</h5>
                        <div class="d-sm-flex">
                            <!-- col -->
                            <div class="flex-fill">
                                <div class="input-group mg-b-10">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon4"><i
                                                class="fab fa-facebook tx-facebook wd-16"></i></span>
                                    </div>
                                    <input name="fb" type="text" class="form-control" placeholder="<?=$user['fb']?>"
                                        aria-label="twitter" aria-describedby="basic-addon4">
                                </div>
                            </div>
                            <!-- col -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mg-b-5 mg-sm-b-0">Change Facebook</button>
                    </div>
                </form>
                <!-- modal-footer -->
            </div>
            <!-- modal-content -->
        </div>
    </div>
    <!--/ Modal End-->
    <!--Modal Instagram-->
    <div class="modal fade effect-scale" id="instagram" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="admprs-<?=$user['id']?>" method="post">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                        <h5 class="tx-18 tx-sm-20 mg-b-30">Instagram</h5>
                        <div class="d-sm-flex">
                            <!-- col -->
                            <div class="flex-fill">
                                <div class="input-group mg-b-10">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon4"><i
                                                class="fab fa-instagram tx-instagram wd-16"></i></span>
                                    </div>
                                    <input name="inst" type="text" class="form-control" placeholder="<?=$user['inst']?>"
                                        aria-label="instagram" aria-describedby="basic-addon4">
                                </div>
                            </div>
                            <!-- col -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mg-b-5 mg-sm-b-0">Change Instagram</button>
                    </div>
                </form>
                <!-- modal-footer -->
            </div>
            <!-- modal-content -->
        </div>
    </div>
    <!--/ Modal End-->
    <!--Modal Vkontakte-->
    <div class="modal fade effect-scale" id="vkontakte" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="admprs-<?=$user['id']?>" method="post">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                        <h5 class="tx-18 tx-sm-20 mg-b-30">Vkontakte</h5>
                        <div class="d-sm-flex">
                            <!-- col -->
                            <div class="flex-fill">
                                <div class="input-group mg-b-10">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon4"><i
                                                class="fab fa-vk tx-vkontakte wd-16"></i></span>
                                    </div>
                                    <input name="vk" type="text" class="form-control" placeholder="<?=$user['vk']?>"
                                        aria-label="vkontakte" aria-describedby="basic-addon4">
                                </div>
                            </div>
                            <!-- col -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mg-b-5 mg-sm-b-0">Change Vkontakte</button>
                    </div>
                </form>
                <!-- modal-footer -->
            </div>
            <!-- modal-content -->
        </div>
    </div>
    <!--/ Modal End-->
    <!--Modal Vkontakte-->
    <div class="modal fade effect-scale" id="telegram" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="admprs-<?=$user['id']?>" method="post">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                        <h5 class="tx-18 tx-sm-20 mg-b-30">Telegram</h5>
                        <div class="d-sm-flex">
                            <!-- col -->
                            <div class="flex-fill">
                                <div class="input-group mg-b-10">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon4"><i
                                                class="fab fa-telegram tx-telegram wd-16"></i></span>
                                    </div>
                                    <input name="tg" type="text" class="form-control" placeholder="<?=$user['tg']?>"
                                        aria-label="telegram" aria-describedby="basic-addon4">
                                </div>
                            </div>
                            <!-- col -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mg-b-5 mg-sm-b-0">Change Telegram</button>
                    </div>
                </form>
                <!-- modal-footer -->
            </div>
            <!-- modal-content -->
        </div>
    </div>
    <!--/ Modal End-->
    <!--Modal Current Balance-->
    <div class="modal fade effect-scale" id="changeLogin" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="admprs-<?=$user['id']?>" method="post">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                        <h5 class="tx-18 tx-sm-20 mg-b-30">Change Login</h5>
                        <div class="d-sm-flex">
                            <!-- col -->
                            <div class="flex-fill">
                                <div class="input-group mg-b-10">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa fa-user tx-20 tx-primary"></i></span>
                                    </div>
                                    <input name="login" type="text" class="form-control"
                                        placeholder="<?=$user['login']?>" aria-label="Login"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <!-- col -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mg-b-5 mg-sm-b-0">Change Login</button>
                    </div>
                </form>
                <!-- modal-footer -->
            </div>
            <!-- modal-content -->
        </div>
    </div>
    <!--/ Modal End-->
    <!--Modal Current Balance-->
    <div class="modal fade effect-scale" id="changeEmail" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="admprs-<?=$user['id']?>" method="post">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                        <h5 class="tx-18 tx-sm-20 mg-b-30">Change Email</h5>
                        <div class="d-sm-flex">
                            <!-- col -->
                            <div class="flex-fill">
                                <div class="input-group mg-b-10">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa fa-envelope tx-20 tx-primary"></i></span>
                                    </div>
                                    <input name="email" type="email" class="form-control"
                                        placeholder="<?=$user['email']?>" aria-label="Login"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <!-- col -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mg-b-5 mg-sm-b-0">Change Email</button>
                    </div>
                </form>
                <!-- modal-footer -->
            </div>
            <!-- modal-content -->
        </div>
    </div>
    <!--/ Modal End-->
    <!--Modal Current Balance-->
    <div class="modal fade effect-scale" id="changeBalance" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="admprs-<?=$user['id']?>" method="post">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                        <h5 class="tx-18 tx-sm-20 mg-b-30">Change Current Balance</h5>
                        <div class="d-sm-flex">
                            <!-- col -->
                            <div class="flex-fill">
                                <div class="input-group mg-b-10">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa fa-dollar-sign tx-20 tx-primary"></i></span>
                                    </div>
                                    <input name="adm_sum" type="number" class="form-control"
                                        placeholder="$<?=round($user['balance'],2)?>" aria-label="FirstName"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <!-- col -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mg-b-5 mg-sm-b-0">Change Balance</button>
                    </div>
                </form>
                <!-- modal-footer -->
            </div>
            <!-- modal-content -->
        </div>
    </div>
    <!--/ Modal End-->
    <!--Modal Sponsor-->
    <div class="modal fade effect-scale" id="changeSponsor" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="admprs-<?=$user['id']?>" method="post">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                        <h5 class="tx-18 tx-sm-20 mg-b-30">Change Sponsor</h5>
                        <div class="d-sm-flex">
                            <!-- col -->
                            <div class="flex-fill">
                                <div class="input-group mg-b-10">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa fa-user tx-20 tx-danger"></i></span>
                                    </div>
                                    <input name="spons_login" type="text" class="form-control"
                                        placeholder="New sponsor login" aria-label="FirstName"
                                        aria-describedby="basic-addon1">

                                </div>
                            </div>
                            <!-- col -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mg-b-5 mg-sm-b-0">Change Sponsor</button>
                    </div>
                </form>
                <!-- modal-footer -->
            </div>
            <!-- modal-content -->
        </div>
    </div>
    <!--/ Modal End-->
    <!--Modal Start-->
    <div class="modal fade effect-scale" id="changeName" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="admprs-<?=$user['id']?>" method="post">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                        <h5 class="tx-18 tx-sm-20 mg-b-30">Change Personal Data</h5>
                        <div class="d-sm-flex">
                            <!-- col -->
                            <div class="flex-fill">
                                <div class="input-group mg-b-10">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="far fa-user wd-16"></i></span>
                                    </div>
                                    <input name='name' type="text" class="form-control" placeholder="<?=$user['name']?>"
                                        aria-label="FirstName" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mg-b-10">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i
                                                class="far fa-user wd-16"></i></span>
                                    </div>
                                    <input name='lastname' type="text" class="form-control"
                                        placeholder="<?=$user['lastname']?>" aria-label="LasttName"
                                        aria-describedby="basic-addon2">
                                </div>
                            </div>
                            <!-- col -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mg-b-5 mg-sm-b-0">Save Changes</button>
                    </div>
                </form>
                <!-- modal-footer -->
            </div>
            <!-- modal-content -->
        </div>
    </div>
    <!--/ Modal End-->
    <!--Modal Start BTC address-->
    <div class="modal fade effect-scale" id="addBtcAddress" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="admprs-<?=$user['id']?>" method="post">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                        <h5 class="tx-18 tx-sm-20 mg-b-30">Change BTC Adress</h5>
                        <div class="d-sm-flex">
                            <!-- col -->
                            <div class="flex-fill">
                                <div class="input-group mg-b-10">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="cf cf-btc tx-20 tx-primary"></i></span>
                                    </div>
                                    <input name="btc" type="text" class="form-control"
                                        placeholder="Enter New BTC Address" aria-label="FirstName"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <!-- col -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mg-b-5 mg-sm-b-0">Save BTC Address</button>
                    </div>
                </form>
                <!-- modal-footer -->
            </div>
            <!-- modal-content -->
        </div>
    </div>
    <!--/ Modal End-->
    <!--Modal Start ETH address-->
    <div class="modal fade effect-scale" id="addEthAddress" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="admprs-<?=$user['id']?>" method="post">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                        <h5 class="tx-18 tx-sm-20 mg-b-30">Change ETH Adress</h5>
                        <div class="d-sm-flex">
                            <!-- col -->
                            <div class="flex-fill">
                                <div class="input-group mg-b-10">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="cf cf-eth tx-20 tx-primary"></i></span>
                                    </div>
                                    <input name="eth" type="text" class="form-control"
                                        placeholder="Enter New ETH Address" aria-label="FirstName"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <!-- col -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mg-b-5 mg-sm-b-0">Save ETH Address</button>
                    </div>
                </form>
                <!-- modal-footer -->
            </div>
            <!-- modal-content -->
        </div>
    </div>
    <!--/ Modal End-->
    <!--Modal Start BCH address-->
    <div class="modal fade effect-scale" id="addBchAddress" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="admprs-<?=$user['id']?>" method="post">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                        <h5 class="tx-18 tx-sm-20 mg-b-30">Change BCH Adress</h5>
                        <div class="d-sm-flex">
                            <!-- col -->
                            <div class="flex-fill">
                                <div class="input-group mg-b-10">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="cf cf-btc tx-20 tx-danger"></i></span>
                                    </div>
                                    <input name="bch" type="text" class="form-control"
                                        placeholder="Enter New BCH Address" aria-label="FirstName"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <!-- col -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mg-b-5 mg-sm-b-0">Save BCH Address</button>
                    </div>
                </form>
                <!-- modal-footer -->
            </div>
            <!-- modal-content -->
        </div>
    </div>
    <!--/ Modal End-->
    <!--Modal Start USD address-->
    <div class="modal fade effect-scale" id="addUsdAddress" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="admprs-<?=$user['id']?>" method="post">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                        <h5 class="tx-18 tx-sm-20 mg-b-30">Change Perfect Money USD Adress</h5>
                        <div class="d-sm-flex">
                            <!-- col -->
                            <div class="flex-fill">
                                <div class="input-group mg-b-10">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="far fa-dollar-sign tx-20 tx-primary"></i></span>
                                    </div>
                                    <input name="usd" type="text" class="form-control"
                                        placeholder="Enter New Perfect Money USD" aria-label="FirstName"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <!-- col -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mg-b-5 mg-sm-b-0">Save Perfect Money USD</button>
                    </div>
                </form>
                <!-- modal-footer -->
            </div>
            <!-- modal-content -->
        </div>
    </div>
    <!--/ Modal End-->
    <!--Modal Change Pin-code-->
    <div class="modal fade effect-scale" id="changePincode" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="admprs-<?=$user['id']?>" method="post">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                        <h5 class="tx-18 tx-sm-20 mg-b-30">Change Pin-code</h5>
                        <div class="d-sm-flex">
                            <!-- col -->
                            <div class="flex-fill">
                                <div class="input-group mg-b-10">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="far fa-key wd-16"></i></span>
                                    </div>
                                    <input name="chPin" type="password" class="form-control"
                                        placeholder="Enter New Pin-code" aria-label="Password"
                                        aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <!-- col -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary mg-b-5 mg-sm-b-0">Save New Pin-code</button>
                    </div>
                </form>
                <!-- modal-footer -->
            </div>
            <!-- modal-content -->
        </div>
    </div>
    <!--/ Modal End-->
    <!--/ Page Content End -->
    <!--/ Page Container End -->
    <!--================================-->
    <!-- Scroll To Top Start-->
    <!--================================-->
    <a href="" data-click="scroll-top" class="btn-scroll-top fade"><i class="fal fa-arrow-up"></i></a>
    <!--/ Scroll To Top End -->
    <!--================================-->
    <!-- Footer Script -->
    <!--================================-->
    <script src="res/assets/plugins/jquery/jquery.min.js"></script>
    <script src="res/assets/plugins/jquery-ui/jquery-ui.js"></script>
    <script src="res/assets/plugins/popper/popper.js"></script>
    <script src="res/assets/plugins/feather/feather.min.js"></script>
    <script src="res/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="res/assets/plugins/typeahead/typeahead.js"></script>
    <script src="res/assets/plugins/typeahead/typeahead-active.js"></script>
    <script src="res/assets/plugins/pace/pace.min.js"></script>
    <script src="res/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="res/assets/plugins/highlight/highlight.min.js"></script>
    <!-- dataTables Script -->
    <script src="res/assets/plugins/dataTable/datatables.min.js"></script>
    <script src="res/assets/plugins/dataTable/responsive/dataTables.responsive.js"></script>
    <script src="res/assets/plugins/dataTable/extensions/dataTables.jqueryui.min.js"></script>
    <script src="res/assets/plugins/uikit/js/uikit.min.js"></script>
    <script src="res/assets/plugins/uikit/js/uikit-icons.min.js"></script>
    <script src="res/assets/plugins/flow.js/flow.min.js"></script>
    <!-- Required Script -->
    <script src="res/assets/js/app.js"></script>
    <script src="res/assets/js/wolf.js"></script>
    <script src="res/assets/js/wolf-customizer.js"></script>
    <script>
    // Basic DataTable	
    $('#basicDataTable').DataTable({
        responsive: true,
        language: {
            searchPlaceholder: 'Search...',
            sSearch: ''
        }
    });

    // Basic DataTable	
    $('#basicDataTable1').DataTable({
        responsive: true,
        language: {
            searchPlaceholder: 'Search...',
            sSearch: ''
        }
    });

    // Basic DataTable	
    $('#basicDataTable2').DataTable({
        responsive: true,
        language: {
            searchPlaceholder: 'Search...',
            sSearch: ''
        }
    });

    // Basic DataTable	
    $('#basicDataTable3').DataTable({
        responsive: true,
        language: {
            searchPlaceholder: 'Search...',
            sSearch: ''
        }
    });
    // Scrollable Table DataTable	1
    $('#scrollableTable').DataTable({
        responsive: true,
        language: {
            searchPlaceholder: 'Search...',
            sSearch: ''
        },
        "order": [
            [1, "desc"]
        ],
        "scrollY": "155px",
        "scrollCollapse": true,
        "paging": false
    });
    $('#scrollableTable1').DataTable({
        responsive: true,
        language: {
            searchPlaceholder: 'Search...',
            sSearch: ''
        },
        "order": [
            [1, "desc"]
        ],
        "scrollY": "155px",
        "scrollCollapse": true,
        "paging": false
    });
    $('#scrollableTable11').DataTable({
        responsive: true,
        language: {
            searchPlaceholder: 'Search...',
            sSearch: ''
        },
        "order": [
            [1, "desc"]
        ],
        "scrollY": "155px",
        "scrollCollapse": true,
        "paging": false
    });
    </script>
</body>

</html>