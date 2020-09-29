<?$pn='adm_p_2_p'?>
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
                    <h2>Выводы</h2>
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
                                                <th>Operation</th>
                                                <th>Amount</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?//$statuses = Data::statuses();
                                 foreach($outcome as $jor){
                                     if($jor['user']){?>
                                            <tr>
                                            <td><a href="adm_user-<?=$jor['user']?>">
                                            <?=UserService::getById($jor['user'])['login']?></a> </td>
                                                <td><?=$jor['date']?></td>
                                                <td><?=$jor['operation']?></td>
                                                <td><?=$jor['amount']?></td>
                                                <td><button class="btn btn-danger"
                                                 onclick="confirmDelete(<?=$jor['id']?>,'<?=$jor['type']?>')">Delete</button></td>
                                               
                                            </tr>
                                            <?}}?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>User</th>
                                                <th>Date</th>
                                                <th>Operation</th>
                                                <th>Amount</th>
                                                <th>Actions</th>
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
                    <h2>Пополнения</h2>
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
                                                <th>Operation</th>
                                                <th>Amount</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?//$statuses = Data::statuses();
                                 foreach($income as $jor){
                                    if($jor['user']){?>
                                            <tr>
                                            <td><a href="adm_user-<?=$jor['user']?>">
                                            <?=UserService::getById($jor['user'])['login']?></a> </td>
                                                <td><?=$jor['date']?></td>
                                                <td><?=$jor['operation']?></td>
                                                <td><?=$jor['amount']?></td>
                                                <td><button class="btn btn-danger"
                                                 onclick="confirmDelete(<?=$jor['id']?>,'<?=$jor['type']?>')">Delete</button></td>
                                               
                                               
                                            </tr>
                                            <?}}?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>User</th>
                                                <th>Date</th>
                                                <th>Operation</th>
                                                <th>Amount</th>
                                                <th>Actions</th>
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

            <form action="" method="post" id="delete_jor">
                                                    <input type="hidden" name="delete" value="1">
                                                    <input id="delete_id" type="hidden" name="delete_id" value="">
                                                    <input id="delete_type" type="hidden" name="delete_type" value="">
                                                </form>
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

    <script>
     function confirmDelete(id,type) {
                    $('#delete_id').val(id)
                    $('#delete_type').val(type)
                    $('#delete_jor').submit()
               /*var retVal = confirm("Do you want to delete this record ?");
               if( retVal == true ) {
                   
                  return true;
               } else {
                    return false;
               }*/
            }
    </script>
</body>

</html>