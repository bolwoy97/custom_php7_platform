<?
$pn='adm_verifications'
//echo FileService::multiservSearch(IMG_ROOT.$Verif['doc_img']);exit;

?>


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
                        <div class="col-lg-6">
                            <div class="card mg-b-30">
                                <div class=" text-center mg-t-20">
                                    <!--<h5 class=""><a href="#changeName" data-toggle="modal"> </a></h5>-->
                                    <p class="tx-gray-500 small"><a href="#changeLogin" data-toggle="modal"
                                            class="tx-semibold"><?=$User['login']?></a></p>
                                    <p class="tx-gray-500 small"><a href="#changeEmail" data-toggle="modal"
                                            class="tx-semibold"><?=$User['email']?></a></p>
                                </div>
                                <div class="card-body">
                                    <p class="text-center tx-uppercase">Personal info</p>
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <td>Name:</td>
                                                <td><?=$Verif['name']?></td>
                                            </tr>
                                            <tr>
                                                <td>Surname:</td>
                                                <td><?=$Verif['lastname']?></td>
                                            </tr>

                                            <tr>
                                                <td>Birth date:</td>
                                                <td><?=$Verif['birth_date']?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p class="text-center tx-uppercase">Passport data</p>
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <td>Serial:</td>
                                                <td><?=$Verif['pasp_num']?></td>
                                            </tr>
                                            <tr>
                                                <td>Authority:</td>
                                                <td><?=$Verif['pasp_given']?></td>
                                            </tr>

                                            <tr>
                                                <td>Date of issue:</td>
                                                <td><?=$Verif['pasp_given_date']?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p class="text-center tx-uppercase">Address</p>
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <td>Country:</td>
                                                <td><?=$Verif['country']?></td>
                                            </tr>
                                            <tr>
                                                <td>State:</td>
                                                <td><?=$Verif['state']?></td>
                                            </tr>

                                            <tr>
                                                <td>City:</td>
                                                <td><?=$Verif['city']?></td>
                                            </tr>
                                            <tr>
                                                <td>Address:</td>
                                                <td><?=$Verif['adres']?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <form action="" method="post" id="verif_submit">
                                <input type="hidden" name="confirm" value=1>
                            </form>
                            <button type="submit" form="verif_submit" class="btn btn-success">Confirm verification</button>


                            <button type="button" href="#cancel-verification" data-toggle="modal"
                                class="btn btn-danger">Cancel verification</button>

                                <hr>
                            <div>
                                <form action="" method="post" id="verif_pending">
                                    <input type="hidden" name="pending" value=1>
                                </form>
                                <button type="submit" form="verif_pending" class="btn btn-info">Set to pending</button>
                            </div>
                            
                        </div>
                        <div class="col-xs-12 col-sm-6 col-lg-6">
                            <div class="card mg-b-30">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="card-header-title tx-13 mb-0 text-uppercase">Passport</h6>
                                    </div>
                                </div>
                                <div class="card ">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <img src="<?=FileService::getImage($Verif['doc_img'])?>"
                                                onerror="this.style.display='none'">
                                            <!--<img src="http://185.177.92.103/<?=IMG_ROOT.$Verif['doc_img']?>"
                                                onerror="this.style.display='none'">-->
                                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mg-b-30">
                                <div class="card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="card-header-title tx-13 mb-0 text-uppercase">Bill for the service at
                                            residence</h6>
                                    </div>
                                </div>
                                <div class="card ">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <img src="<?=FileService::getImage($Verif['bill_img'])?>"
                                                onerror="this.style.display='none'">
                                            <!--<img src="http://185.177.92.112/<?=IMG_ROOT.$Verif['bill_img']?>"
                                                onerror="this.style.display='none'">-->
                                            <!--<img src="http://185.177.92.103/<?=IMG_ROOT.$Verif['bill_img']?>"
                                                onerror="this.style.display='none'">-->
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
    <!--Modal Current Balance-->
    <div class="modal fade effect-scale" id="cancel-verification" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="" method="post">
                    <input type="hidden" name="cancel" value=1>
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                        <h5 class="tx-18 tx-sm-20 mg-b-30">Reason for canceling verification</h5>
                        <div class="d-sm-flex">
                            <!-- col -->
                            <div class="flex-fill">
                                <div class="input-group mg-b-10">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="fa fa-info tx-20 tx-primary"></i></span>
                                    </div>
                                    <textarea name="coment" type="text" class="form-control" placeholder=""
                                        aria-label="Login" aria-describedby="basic-addon1"></textarea>
                                </div>
                            </div>
                            <!-- col -->
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary mg-b-5 mg-sm-b-0">Cancel and send message</button>
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