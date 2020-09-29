<?$pn='adm_sales'?>
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
                    <!--================================-->
                    <!-- dataTables Start -->
                    <!--================================-->
                    <div class="row clearfix">
                        <!--================================-->
                        <!-- Hoverable dataTable Start -->
                        <!--================================-->
                        <div class="col-12 ">
                            <div class="card mg-b-40">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="card-header-title tx-13 mb-0 text-uppercase">Pending orders</h6>
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
                                    <table id="basicDataTable" class="table hover responsive display nowrap">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Login</th>
                                                <th>Currency</th>
                                                <th>Amount</th>
                                                <th>Address</th>
                                                <th>Rate</th>
                                                <th>In USD</th>
                                                <th>Act</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?foreach($pending as $with){?>
                                            <tr>
                                                <td><?=$with['date']?></td>
                                                <?$usr = UserService::getById($with['user']);
                                                //$usr = User::getUserInfo($with['user']);?>
                                                <td><a target="_blank"
                                                        href="adm_user-<?=$usr['id']?>"><?=$usr['login']?></a></td>
                                                <td><?=($with['cur']!='tok')?strtoupper($with['cur']):'GRD';?></td>
                                                <td><?=$with['sum']?> GRD</td>
                                                <td><?=$with['address']?></td>
                                                <td>1GRD = <?=$with['rate']?> USD</td>
                                                <td><?=$with['sum']*$with['rate']?> USD</td>
                                                <td>
                                                    <a onclick="confirmWith(<?=$with['id']?>,<?=$with['sum']*$with['rate']?>
                                                    ,'<?=$usr['login']?>','<?=$with['address']?>','<?=$with['cur']?>')"
                                                        href="#confirmOrder" data-toggle="modal"
                                                        class="fa fa-check-circle tx-success mg-r-10">confirn</a>
                                                    <a onclick="cancelWith(<?=$with['id']?>,<?=$with['sum']*$with['rate']?>
                                                    ,'<?=$usr['login']?>')" href="#cancelOrder" data-toggle="modal"
                                                        class="fa fa-do-not-enter tx-danger">cancel</a>
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
                                                <th>In USD</th>
                                                <th>Act</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--/ Hoverable dataTable End -->
                        <!--================================-->
                    </div>
                    <div class="row clearfix">
                        <!--================================-->
                        <!-- Hoverable dataTable Start -->
                        <!--================================-->
                        <div class="col-12 ">
                            <div class="card mg-b-40">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="card-header-title tx-13 mb-0 text-uppercase">Canceled orders</h6>
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
                                                <th>Rate</th>
                                                <th>In USD</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?foreach($canceled as $with){?>
                                            <tr>
                                                <td><?=$with['date']?></td>
                                                <?$usr = UserService::getById($with['user']);
                                                //$usr = User::getUserInfo($with['user']);?>
                                                <td><a target="_blank"
                                                        href="adm_user-<?=$usr['id']?>"><?=$usr['login']?></a></td>
                                                <td><?=strtoupper($with['cur'])?></td>
                                                <td><?=$with['sum']?></td>
                                                <td><?=$with['address']?></td>
                                                <td>1GRD = <?=$with['rate']?> USD</td>
                                                <td><?=$with['sum']*$with['rate']?> USD</td>
                                                <td><span class="badge badge-outline-danger">Canceled</span></td>
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
                                                <th>In USD</th>
                                                <th>Status</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--/ Hoverable dataTable End -->
                        <!--================================-->
                    </div>
                    <div class="row clearfix">
                        <!--================================-->
                        <!-- Hoverable dataTable Start -->
                        <!--================================-->
                        <div class="col-12 ">
                            <div class="card mg-b-40">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="card-header-title tx-13 mb-0 text-uppercase">Confirmed orders</h6>
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
                                    <table id="basicDataTable2" class="table hover responsive  nowrap">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Login</th>
                                                <th>Currency</th>
                                                <th>Amount</th>
                                                <th>Address</th>
                                                <th>Rate</th>
                                                <th>In USD</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?foreach($confirmed as $with){?>
                                            <tr>
                                                <td><?=$with['date']?></td>
                                                <?$usr = UserService::getById($with['user']);
                                                //$usr = User::getUserInfo($with['user']);?>
                                                <td><a target="_blank"
                                                        href="adm_user-<?=$usr['id']?>"><?=$usr['login']?></a></td>
                                                <td><?=strtoupper($with['cur'])?></td>
                                                <td><?=$with['sum']?></td>
                                                <td><?=$with['address']?></td>
                                                <td>1GRD = <?=$with['rate']?> USD</td>
                                                <td><?=$with['sum']*$with['rate']?> USD</td>
                                                <td><span class="badge badge-outline-info">Completed</span></td>
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
                                                <th>In USD</th>
                                                <th>Status</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--/ Hoverable dataTable End -->
                        <!--================================-->
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
                        <p class="pd-y-10 mb-0">Copyright&copy; 2019s</p>
                    </div>
                </div>
            </footer>
            <!--/ Page Footer End -->
        </div>
    </div>
    <!--Modal Withdraw BTC-->
    <div class="modal fade effect-scale" id="cancelOrder" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="cancelWith" method="post">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                        <div class="d-sm-flex">
                            <!-- col -->
                            <div class="flex-fill">
                                <h5 class="tx-center">You cancel the token sale request for <br><strong
                                        id="cancelLogin">business-leader</strong>?</h5>
                                <div id="cancelSum" class="alert alert-danger tx-20 tx-center tx-uppercase"
                                    role="alert">
                                    $100
                                </div>
                            </div>
                            <input id="cancelId" type="hidden" name="id">
                            <!-- col -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger btn-block mg-b-5 mg-sm-b-0 tx-uppercase">Cancel
                            withdrawal</button>
                    </div>
                </form>
                <!-- modal-footer -->
            </div>
            <!-- modal-content -->
        </div>
    </div>
    <!--/ Modal End-->
    <!--Modal Withdraw BTC-->
    <div class="modal fade effect-scale" id="confirmOrder" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="confirmWith" method="post">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                        <div class="d-sm-flex">
                            <!-- col -->
                            <div class="flex-fill">
                                <h5 class="tx-center">Do you confirm token sale in <strong id="confCur">-</strong> for
                                    <br><strong id="confLogin">business-leader</strong>?<br>
                                    to adress <strong id="confAdr">
                                        -
                                    </strong>
                                </h5>
                                <div id="confSum" class="alert alert-success tx-20 tx-center tx-uppercase" role="alert">
                                    -
                                </div>

                            </div>
                            <input id="confId" type="hidden" name="id">
                            <!-- col -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-block mg-b-5 mg-sm-b-0 tx-uppercase">Confirm
                            withdrawal</button>
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
    <!-- Required Script -->
    <script src="res/assets/js/app.js"></script>
    <script src="res/assets/js/wolf.js"></script>
    <script src="res/assets/js/wolf-customizer.js"></script>
    <script>
    // Basic DataTable	
    $('#basicDataTable').DataTable({
        responsive: false,
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
    $(function() {
        if (Clipboard.isSupported()) {
            new Clipboard('.clipboard-example-btn');
        } else {
            $('.clipboard-example-btn').prop('disabled', true);
        }
    });
    </script>

    <script>
    var confirmWith = function(id, sum, login, adr, cur) {
        $("#confId").val(id);
        $("#confSum").html('$' + sum + '');
        $("#confLogin").html(login);
        $("#confAdr").html(adr);
        $("#confCur").html(cur);
    }

    var cancelWith = function(id, sum, login) {
        $("#cancelId").val(id);
        $("#cancelSum").html('$' + sum + '');
        $("#cancelLogin").html(login);
    }
    </script>

</body>

</html>