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
                        <!-- Heard Card Start -->
                        <!--================================-->
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="card mg-b-30">
                                <div class="card-body">
                                    <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">Total Added</h5>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-dark tx-normal">
                                            $<?=round($countAdditions,2)?></h2>
                                    </div>
                                    <div class="d-flex align-items-center tx-gray-500 tx-11">All currencies</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="card mg-b-30">
                                <div class="card-body">
                                    <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">TOTAL TOK Added</h5>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-dark tx-normal">
                                            <?=round($countTOK,2)?> TOK</h2>
                                    </div>
                                    <div class="d-flex align-items-center tx-gray-500 tx-11">From USD</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="card mg-b-30">
                                <div class="card-body">
                                    <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">TOTAL bonuses</h5>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-dark tx-normal">
                                            <?=round($countBonusTOK,2)?> TOK</h2>
                                    </div>
                                    <div class="d-flex align-items-center tx-gray-500 tx-11">Referal bonuses</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="card mg-b-30">
                                <div class="card-body">
                                    <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mg-b-2">All users</h5>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-dark tx-normal">
                                            <?=count($users)?></h2>
                                    </div>
                                    <div class="d-flex align-items-center tx-gray-500 tx-11">Registered users</div>
                                </div>
                            </div>
                        </div>
                        <!--/ Heard Card End -->
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="card mg-b-30">
                                <div class="card-body">
                                    <h3>Enter login to search</h3>
                                    <form action="" method="post">
                                        <input name="login" type="text" placeholder="login...">
                                        <button type="submit">Search</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="card mg-b-30">
                                <div class="card-body">
                                    <h3>Set max withdrawal</h3>
                                    <form action="adm_set_opt" method="post">
                                        <input name="max_with" type="text" placeholder="USD" value=<?=Option::get('max_with');?>>
                                        <button type="submit">Submit</button>
                                    </form>
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
    <!--Modal Add BTC-->

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
    $(document).ready(function() {
        // Basic DataTable	
        $('#basicDataTable').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: ''
            }
        });
        $('#basicDataTable2').DataTable({
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

        $(function() {
            if (Clipboard.isSupported()) {
                new Clipboard('.clipboard-example-btn');
            } else {
                $('.clipboard-example-btn').prop('disabled', true);
            }
        });
    });
    </script>
</body>

</html>