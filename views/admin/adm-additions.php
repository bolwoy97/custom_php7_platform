<?$pn='additions'?>
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
                    <h2>User additions</h2>
                    <div class="row clearfix">
                        <!--================================-->
                        <!-- Hoverable dataTable Start -->
                        <!--================================-->
                        <div class="col-12 ">
                            <div class="card mg-b-40">
                                <div class="card-body pd-0">
                                    <table id="basicDataTable" class="table hover responsive display nowrap">
                                        <thead>
                                            <tr>
                                                <th>User</th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                                <th>Currrency</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?//$statuses = Data::statuses();
                                 foreach($realAdditions as $add){
                                     if($add['user']){?>
                                            <tr>
                                            <td><a href="adm_user-<?=$add['user']?>">
                                            <?=UserService::getById($add['user'])['login']?></a> </td>
                                                <td><?=$add['date']?></td>
                                                <td><?=round($add['sum'],2)?></td>
                                                <td><?=$add['cur']?></td>
                                            </tr>
                                            <?}}?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>User</th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                                <th>Currrency</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--/ Hoverable dataTable End -->
                        <!--================================-->
                    </div>
                    <!--================================-->
                    <!--================================-->
                    <!--================================-->
                    <h2>Admin additions</h2>
                    <div class="row clearfix">
                        <!--================================-->
                        <!-- Hoverable dataTable Start -->
                        <!--================================-->
                        <div class="col-12 ">
                            <div class="card mg-b-40">
                                <div class="card-body pd-0">
                                    <table id="basicDataTable2" class="table hover responsive display nowrap">
                                    <thead>
                                            <tr>
                                                <th>User</th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                                <th>Currrency</th>
                                                <th>Admin</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?//$statuses = Data::statuses();
                                 foreach($admAdditions as $add){?>
                                            <tr>
                                            <td><a href="adm_user-<?=$add['user']?>">
                                            <?=UserService::getById($add['user'])['login']?></a> </td>
                                                <td><?=$add['date']?></td>
                                                <td><?=round($add['sum'],2)?></td>
                                                <td><?=$add['cur']?></td>
                                                <td><a href="adm_user-<?=UserService::getById($add['detail'])['id']?>">
                                            <?=UserService::getById($add['detail'])['login']?></a> </td>
                                               
                                            </tr>
                                            <?}?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>User</th>
                                                <th>Date</th>
                                                <th>Amount</th>
                                                <th>Currrency</th>
                                                <th>Admin</th>
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
    $( document ).ready(function() {
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
    });
    // Scrollable Table DataTable	1
    /*$('#scrollableTable').DataTable({
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
    $(function() {
        if (Clipboard.isSupported()) {
            new Clipboard('.clipboard-example-btn');
        } else {
            $('.clipboard-example-btn').prop('disabled', true);
        }
    });*/
    </script>
</body>

</html>