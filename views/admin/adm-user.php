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
                        <div class="col-6">
                            <div class="card mg-b-30">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="card-header-title tx-13 mb-0 text-uppercase">Addition
                                        </h6>

                                    </div>
                                </div>
                                <div class="card-body pd-0">
                                    <div class="data-table">
                                        <form action="admprs-<?=$user['id']?>" method="post">
                                            <input type="hidden" name="addition" value="1">
                                            <input type="number" name="sum" placeholder="Ammount(USD)" min="0" required>
                                            <!--<input type="datetime-local" name="date" required>-->
                                            <button type="submit">Confirm</button>
                                        </form>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <!--================================-->
                        <div class="col-lg-4">
                            <div class="card mg-b-30">
                                <div class=" text-center mg-t-20">
                                    <!--<h5 class=""><a href="#changeName" data-toggle="modal"><?=$user['name'].' '.$user['lastname']?></a></h5>-->
                                    <p class="tx-gray-500 small"><a href="#changeLogin" data-toggle="modal"
                                            class="tx-semibold"><?=$user['login']?></a></p>
                                    <p class="tx-gray-500 small"><a href="#changeEmail" data-toggle="modal"
                                            class="tx-semibold"><?=$user['email']?></a></p>

                                    <!--  <a href="#twitter" data-toggle="modal" class="tx-twitter mr-3"><span class="fab fa-twitter"></span></a>
			 <a href="#facebook" data-toggle="modal" class="tx-facebook mr-3"><span class="fab fa-facebook"></span></a>
			 <a href="#instagram" data-toggle="modal" class="tx-instagram mr-3"><span class="fab fa-instagram"></span></a>
			 <a href="#vkontakte" data-toggle="modal" class="tx-vkontakte mr-3"><span class="fab fa-vk"></span></a>
			 <a href="#telegram" data-toggle="modal" class="tx-telegram mr-3"><span class="fab fa-telegram"></span></a>
         -->
                                </div>
                                <div class="card-body">
                                    <?if($user['chPasHash']=='unprn'){?>
                                    <form action="admprs-<?=$user['id']?>" method="post">

                                        <input type="hidden" name="activate" value="1">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success ">Activate user</button>
                                </div>
                                </form>
                                <?}?>
                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <td>Balance:</td>
                                            <td>$<?=round($user['balance'],2)?></td>
                                            <td class="tx-right"><a href="#changeBalance" data-toggle="modal"
                                                    class="fa fa-edit tx-success"></a></td>
                                        </tr>
                                        <tr>
                                            <td>Token:</td>
                                            <td><?=round($user['TOKbalance'],2)?></td>
                                        </tr>
                                        <tr>
                                            <td>Hold:</td>
                                            <td><?=round($user['TOK_2balance'],2)?></td>
                                        </tr>
                                        <tr>
                                            <td>Allowed to withdraw:</td>
                                            <td><?=round($TokForSale,2)?> GRD</td>
                                        </tr>
                                        <tr>
                                            <td>GridPay:</td>
                                            <td><?=round($user['gridPay'],2)?></td>
                                        </tr>

                                        <tr>
                                            <td>Bonus:</td>
                                            <td><?=round($user['bonus'],2)?></td>
                                        </tr>

                                        <tr>
                                            <td>Sponsor:</td>
                                            <td><?=$upline[count($upline)-1]['login']?></td>
                                            <?if($user['persTurnover']==0 && $user['teamTurnover']==0 && $user['invProfit']==0 && 
                                        $user['refProfit']==0  && $user['totalWith']==0 && 
                                        $user['totalBon']==0 ){?>
                                            <td class="tx-right"><a href="#changeSponsor" data-toggle="modal"
                                                    class="fa fa-edit tx-success"></a></td>
                                            <?}else{?>
                                            <td class="tx-right"><a href="javascript:void(0)" data-toggle="modal"
                                                    class="fa fa-edit tx-gray-400"></a></td>
                                            <?}?>
                                        </tr>
                                        <tr>
                                            <td>Sign In:</td>
                                            <?if($user['ban_enter']){?>
                                            <td><i class="fa fa-do-not-enter tx-danger mr-3"></i></td>
                                            <?}else{?>
                                            <td><i class="fa fa-check-circle tx-success mr-3"></i></td>
                                            <?}?>

                                            <td class="tx-right"><a href="#signIn" data-toggle="modal"
                                                    class="fa fa-edit tx-success"></a></td>
                                        </tr>


                                        <!--<tr>
                                    <td>Turnover:</td>
                                    <td>
                                       <div class="tx-rubik">
                                          <p class="mg-b-0 tx-warning">$<?=round($user['persTurnover'],2)?></p>
                                          <p class="tx-10 mg-b-0 tx-gray-500"><?=ucfirst($statuses[$user['status']]['name'])?></p>
                                       </div>
                                    </td>
                                    <td class="tx-right"><a href="javascript:void(0)" data-toggle="modal" class="fa fa-edit tx-gray-400"></a></td>
                                 </tr>
								  <tr>
                                    <td>Withdraw:</td> 
                                    <?if($user['ban_width']){?>
                                            <td><i class="fa fa-do-not-enter tx-danger mr-3"></i></td>
                                        <?}else{?>
                                            <td><i class="fa fa-check-circle tx-success mr-3"></i></td>
                                        <?}?>
                                    <td class="tx-right"><a href="#withdrawal" data-toggle="modal" class="fa fa-edit tx-success"></a></td>
                                 </tr>
								  <tr>
                                    <td>Investing:</td> 
                                    <?if($user['ban_deps']){?>
                                            <td><i class="fa fa-do-not-enter tx-danger mr-3"></i></td>
                                        <?}else{?>
                                            <td><i class="fa fa-check-circle tx-success mr-3"></i></td>
                                        <?}?>
                                    <td class="tx-right"><a href="#investing" data-toggle="modal" class="fa fa-edit tx-success"></a></td>
                                 </tr>
								  <tr>
                                    <td>Pincode:</td>
                                    <td></td>
                                    <td class="tx-right"><a href="#changePincode" data-toggle="modal" class="fa fa-edit tx-success"></a></td>
                                 </tr>-->
                                    </tbody>
                                </table>
                                <div class="media align-items-center pb-1 mb-2">
                                    <div class="media-body ml-2">
                                        <a href="javascript:void(0)" class="tx-semibold tx-danger" data-toggle="tooltip"
                                            title="" data-placement="top" data-original-title="Can not be edited">
                                            <?foreach($upline as $up){?>
                                            /<a href="adm_user-<?=$up['id']?>"><?=$up['login']?></a>
                                            <?}?>
                                        </a><br>
                                        <div class="tx-gray-500 small">Uplines</div>
                                    </div>
                                </div>
                                <!-- <table class="table mb-0">
                              <tbody>
                                 <tr>
                                    <td>
										<div class="wd-20 ht-20 bd bd-1 bd-warning tx-warning rounded-circle align-items-center justify-content-center d-none d-sm-flex">
                                       <i class="cf cf-btc tx-12"></i>
                                    </div></td>
									 <td><a href="javascript:void(0)" data-container="body" data-toggle="popover" data-placement="top" data-content="<?=$user['btcWith']?>">BTC Address</a></td>
                                    <td class="tx-right"><a href="#addBtcAddress" data-toggle="modal" class="fa fa-edit tx-success"></a></td>
                                 </tr>
                                 <tr>
                                    <td>
										<div class="wd-20 ht-20 bd bd-1 bd-primary tx-primary rounded-circle align-items-center justify-content-center d-none d-sm-flex">
                                       <i class="cf cf-eth tx-12"></i>
                                    </div></td>
									 <td><a href="javascript:void(0)" data-container="body" data-toggle="popover" data-placement="top" data-content="<?=$user['ethWith']?>">ETH Address</a></td>
                                    <td class="tx-right"><a href="#addEthAddress" data-toggle="modal" class="fa fa-edit tx-success"></a></td>
                                 </tr>
                                 <tr>
                                    <td>
										<div class="wd-20 ht-20 bd bd-1 bd-danger tx-danger rounded-circle align-items-center justify-content-center d-none d-sm-flex">
                                       <i class="cf cf-btc tx-12"></i>
                                    </div></td>
									 <td><a href="javascript:void(0)" data-container="body" data-toggle="popover" data-placement="top" data-content="<?=$user['bchWith']?>">BCH Address</a></td>
                                    <td class="tx-right"><a href="#addBchAddress" data-toggle="modal" class="fa fa-edit tx-success"></a></td>
                                 </tr>
								  <tr>
                                    <td>
										<div class="wd-20 ht-20 bd bd-1 bd-teal tx-teal rounded-circle align-items-center justify-content-center d-none d-sm-flex">
                                       <i class="fa fa-dollar-sign tx-12"></i>
                                    </div></td>
									  <td><a href="javascript:void(0)" data-container="body" data-toggle="popover" data-placement="top" data-content="<?=$user['usdWith']?>">PM Address</a></td>
                                    <td class="tx-right"><a href="#addUsdAddress" data-toggle="modal" class="fa fa-edit tx-success"></a></td>
                                 </tr>
                              </tbody>
                           </table>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-8">
                        <div class="card mg-b-30">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="card-header-title tx-13 mb-0 text-uppercase">Investment Portfolio</h6>
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
                            <div class="card-body pd-0">
                                <div class="data-table">
                                    <table id="basicDataTable2" class="table hover responsive display nowrap">
                                        <thead class="tx-10 tx-uppercase bd-t">
                                            <tr>
                                                <th>Text</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Stage</th>
                                                <th>Rate</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?foreach($Journal as $jor){?>
                                            <tr>
                                                <td><?=$jor['name']?></td>
                                                <td class="green"><?=round($jor['sum'],2)?> <?=strtoupper($jor['cur'])?>
                                                </td>
                                                <td><?=$jor['date']?></td>
                                                <td class="complete"><img src="/assets/img/complete.svg"
                                                        alt="">Выполнено</td>
                                                <td><?=$jor['stage']+1?></td>
                                                <td><?=($jor['rate']>0)?$jor['rate']:'-'?></td>
                                            </tr>
                                            <?}?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card mg-b-30">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="card-header-title tx-13 mb-0 text-uppercase">Hold tokens</h6>
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
                            <div class="card-body pd-0">
                                <div class="data-table">
                                    <table id="basicDataTable3" class="table hover responsive display nowrap">
                                        <thead class="tx-10 tx-uppercase bd-t">
                                            <tr>
                                                <th>Text</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Stage</th>
                                                <th>Rate</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?foreach($tok2_jor as $jor){?>
                                            <tr>
                                                <td><?=$jor['name']?></td>
                                                <td class="green"><?=round($jor['sum'],2)?> <?=strtoupper($jor['cur'])?>
                                                </td>
                                                <td><?=$jor['date']?></td>
                                                <td class="complete"><img src="/assets/img/complete.svg"
                                                        alt="">Выполнено</td>
                                                <td><?=$jor['stage']+1?></td>
                                                <td><?=($jor['rate']>0)?$jor['rate']:'-'?></td>
                                            </tr>
                                            <?}?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card mg-b-30">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="card-header-title tx-13 mb-0 text-uppercase">Partners</h6>
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
                                                <th>Login</th>
                                                <th>Level</th>
                                                <!--  <th>Name</th>-->
                                                <th>Sponsor</th>
                                                <th>Date reg</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?  $t = 0;
                                            foreach($levels as $lvl){
                                                $t++;
                                                foreach($lvl as $usr){?>
                                            <tr>
                                                <td><?=$usr['login']?> </td>
                                                <td><?=$t?></td>
                                                <!-- <td><?=$usr['name']?> <?=$usr['lastname']?></td>-->
                                                <?$usrSpon = User::getUserInfo($usr['sponsor']);
                                                    ?>
                                                <td><?=$usrSpon['login']?> </td>
                                                <td><?=$usr['date']?></td>

                                            </tr>
                                            <?}
                                            }?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Login</th>
                                                <th>Level</th>
                                                <!--   <th>Name</th>-->
                                                <th>Sponsor</th>
                                                <th>Date reg</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card mg-b-40">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="card-header-title tx-13 mb-0 text-uppercase">Token sales</h6>
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
                            <div class="card-body pd-0">
                                <table id="basicDataTable1" class="table hover responsive display nowrap">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Login</th>
                                            <th>Currency</th>
                                            <th>Amount</th>
                                            <th>Address</th>
                                            <th>Rate </th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?foreach($sales as $with){?>
                                        <tr>
                                            <td><?=$with['date']?></td>
                                            <?$usr = User::getUserInfo($with['user']);?>
                                            <td><a target="_blank"
                                                    href="adm_user-<?=$usr['id']?>"><?=$usr['login']?></a></td>
                                            <td><?=($with['cur']!='tok')?strtoupper($with['cur']):'GRD';?></td>
                                            <td><?=$with['sum']?> GRD</td>
                                            <td><?=$with['address']?></td>
                                            <td><?=$with['rate']?></td>
                                            <!--<td><?=$with['sum']*$with['rate']?> USD</td>-->
                                            <td>
                                                <?=$with['status']?>
                                            </td>
                                        </tr>
                                        <?}?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Date</th>
                                            <th>Login</th>
                                            <th>Currency</th>
                                            <th>Amount</th>
                                            <th>Address</th>
                                            <th>Rate</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="card mg-b-40">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h6 class="card-header-title tx-13 mb-0 text-uppercase">GridPay operations</h6>
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
                            <div class="card-body pd-0">
                                <table id="basicDataTable4" class="table hover responsive display nowrap">
                                    <thead>
                                        <tr>
                                            <th>Operation</th>
                                            <th>sum</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?foreach($GP_journal as $jor){?>
                                        <tr>
                                            <td><?=$jor['operation']?></td>
                                            <td class="green"><?=$jor['amount']?></td>
                                            <td><?=$jor['date']?></td>
                                            <td class="complete" title="<?=$jor['coment']?>">
                                                <img src="/assets/img/<?=$jor['status_img']?>"
                                                    alt=""><?=$jor['status_show']?></td>


                                        </tr>
                                        <?}?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Operation</th>
                                            <th>sum</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                </table>
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
        <footer class="page-footer">
            <div class="pd-t-4 pd-b-0 pd-x-20">
                <div class="tx-10 tx-uppercase tx-gray-500 tx-spacing-1">
                    <p class="pd-y-10 mb-0">Copyright&copy; 2020
                </div>
            </div>
        </footer>
        <!--/ Page Footer End -->
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
    $(document).ready(function() {
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

        $('#basicDataTable4').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: ''
            }
        });
    });
    // Scrollable Table DataTable	1
    /* $('#scrollableTable').DataTable({
         responsive: true,
         language: {
             searchPlaceholder: 'Search...',
             sSearch: ''
         },
         "order": [
             [1, "desc"]
         ],
         "scrollY": "450px",
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
         "scrollY": "250px",
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
     });*/
    </script>
</body>

</html>