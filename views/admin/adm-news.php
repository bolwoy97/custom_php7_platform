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
                    <div class="pageheader pd-t-25 pd-b-10">
                        <button href="#create" data-toggle="modal" type="button"
                            class="btn btn-info btn-block mg-b-5 mg-sm-b-0 tx-uppercase">Create news</button>
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
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Action</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?foreach($news as $new){?>
                                            <input type="hidden" id="teaser_<?=$new['id']?>"
                                                value="<?=$new['teaser']?>">
                                            <input type="hidden" id="text_<?=$new['id']?>" value="<?=$new['text']?>">
                                            <tr>
                                                <td>
                                                    <?if(file_exists(IMG_ROOT.$new['img']) && $new['img']!=''){?> <a
                                                        href="javascript:void(0)"><img src="<?=IMG_ROOT.$new['img']?>"
                                                            alt="user" width="40" /> </a>
                                                    <?}else{echo "No image";}?>
                                                </td>
                                                <td id="title_<?=$new['id']?>"><?=$new['title']?></td>
                                                <td>
                                                    <a onclick="editNews(<?=$new['id']?>)" href="#edit"
                                                        data-toggle="modal" class="fa fa-edit tx-success mg-r-10"></a>
                                                    <a onclick="deleteNews(<?=$new['id']?>)" href="#delete"
                                                        data-toggle="modal" class="fa fa-trash-alt tx-danger"></a>
                                                </td>
                                                <td><?=$new['date']?></td>

                                            </tr>
                                            <?}?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Action</th>
                                                <th>Date</th>
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
    <!--Create news-->
    <div class="modal fade effect-scale" id="create" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                    <div class="d-sm-flex">
                        <form action="upd_news" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="id" value="new">
                            <!-- col -->
                            <div class="flex-fill">
                                <h5 class="tx-center">Editing news</h5>
                                <div class="form-group">
                                    <label>Enter title</label>
                                    <input name="title" type="text" class="form-control tx-14" placeholder="">
                                    <label>Teaser</label>
                                    <input name="teaser" type="text" class="form-control tx-14" placeholder="">
                                    <label>Text news</label>
                                    <textarea name="text" type="text" class="form-control" placeholder=""></textarea>
                                    <label>Upload image</label>
                                    <div class="file-group file-group-inline">
                                        <input name="newsImage" type="file">
                                    </div>
                                </div>
                            </div>
                            <!-- col -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info btn-block mg-b-5 mg-sm-b-0 tx-uppercase">Create
                        News</button>
                </div>
                </form>
                <!-- modal-footer -->
            </div>
            <!-- modal-content -->
        </div>
    </div>
    <!--/ Modal End-->
    <!--Edit news-->
    <div class="modal fade effect-scale" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                    <div class="d-sm-flex">
                        <form action="upd_news" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="news_upd_Id">
                            <!-- col -->
                            <div class="flex-fill">
                                <h5 class="tx-center">Editing news</h5>
                                <div class="form-group">
                                    <label>Enter title</label>
                                    <input name="title" type="text" class="form-control tx-14" placeholder="">
                                    <label>Teaser</label>
                                    <input name="teaser" type="text" class="form-control tx-14" placeholder="">
                                    <label>Text news</label>
                                    <textarea name="text" type="text" class="form-control" placeholder=""></textarea>
                                    <label>Upload image</label>
                                    <div class="file-group file-group-inline">
                                        <input name="newsImage" type="file">
                                    </div>
                                </div>
                            </div>
                            <!-- col -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-block mg-b-5 mg-sm-b-0 tx-uppercase">Edit
                        News</button>
                </div>
                </form>
                <!-- modal-footer -->
            </div>
            <!-- modal-content -->
        </div>
    </div>
    <!--/ Modal End-->
    <!--Delete news-->
    <div class="modal fade effect-scale" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                    <div class="d-sm-flex">
                        <form action="upd_news" method="post">
                            <input type="hidden" name="deleteId" id="news_del_Id">
                            <!-- col -->
                            <div class="flex-fill">
                                <h5 class="tx-center">Deleting news</h5>
                                <div class="alert alert-danger tx-20 tx-center" role="alert">
                                    Do you want to delete this news? It will be impossible to cancel the operation!
                                </div>
                            </div>
                            <!-- col -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-block mg-b-5 mg-sm-b-0 tx-uppercase">Yes, delete
                        this news</button>
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
    $(function() {
        if (Clipboard.isSupported()) {
            new Clipboard('.clipboard-example-btn');
        } else {
            $('.clipboard-example-btn').prop('disabled', true);
        }
    });
    </script>


    <script>
    function editNews(id) {
        $('#news_upd_Id').val(id);
    }

    function deleteNews(id) {
        $('#news_del_Id').val(id);
    }
    </script>


</body>

</html>