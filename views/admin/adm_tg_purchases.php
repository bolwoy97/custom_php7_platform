<?$pn='adm_tg_purchases'?>

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
                                <div class="card-body pd-0">
                                    <table id="basicDataTable" class="table hover responsive display nowrap">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Login</th>
                                                <th>Sum</th>
                                                <th>Address</th>
                                                <th>Ref link</th>
                                            </tr>
                                        </thead>
                                        <tbody id="act_table1">
                                            <?
                                   $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
                                 foreach($tg_purchases as $tg_purchase){
                                    ?>
                                            <tr>
                                            <td style="width:10%"><?=$tg_purchase['date']?></td>
                                            <?$user = UserService::getById($tg_purchase['user']);
                                                $refLink = $protocol.$_SERVER['HTTP_HOST'].'/r-'.$user['login'];
                                                 ?>
                                            <td><a href="adm_user-<?=$tg_purchase['user']?>">
                                            <?=$user['login']?></a> </td>
                                                <td><?=$tg_purchase['sum']?></td>
                                                <td style="max-width:15%"><?= mb_substr($tg_purchase['adr'],0,50)?></td>
                                                <td><?=$refLink?></td>
                                            </tr>
                                            <?}?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Date</th>
                                                <th>Login</th>
                                                <th>Sum</th>
                                                <th>Address</th>
                                                <th>Ref link</th>
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
    function array_chunk(input, size) {
        for (var x, i = 0, c = -1, l = input.length, n = []; i < l; i++) {
            (x = i % size) ? n[c][x] = input[i]: n[++c] = [input[i]];
        }
        return n;
    }

    function applyTables() {
        //alert('test')
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

        /*$(function() {
            if (Clipboard.isSupported()) {
                new Clipboard('.clipboard-example-btn');
            } else {
                $('.clipboard-example-btn').prop('disabled', true);
            }
        });*/
    }


    


    $(document).ready(function() {
        applyTables()
        /*var pageURL = $(location).attr("href");
        var check = false;
        var offset = 200;
        var table = $("#act_table1");
        var params = {
            users_count: 1
        }

        var request = $.ajax({
            url: pageURL,
            method: "POST",
            data: params,
            dataType: "html",
            async:false
        });
        request.done(function(data) {
            var users_count = jQuery.parseJSON(data);
            var packs = users_count / offset +1
            console.log(packs)
            var t = 0;
            for (let index = 0; index <= packs; index++) {
                params = {
                    unact_users: 1,
                    offset: offset,
                    pack: index
                }
                $.ajax({
                    url: pageURL,
                    method: "POST",
                    data: params,
                    dataType: "html",
                    async:false
                }).done(function(data1) {
                    let unact_users = jQuery.parseJSON(data1);
                    console.log('--' + index + '--')
                    console.log(unact_users)
                    var html = ''
                    $.each(unact_users, function(index, user) {
                        html += "<tr><td><a href='adm_user-" + user['id'] + "'>" + user[
                                'login'] + "</a></td>" +
                            "<td>" + user['email'] + "</td>" +
                            "<td>" + user['date'] + "</td>" +
                            "<td>" + user['balance'] + "</td>" +
                            "<td>" + user['usd_to_tok_sum'] + "</td></tr>";
                    });
                    table.html(table.html() + html)
                    t++
                    if (t > packs) {
                        applyTables()
                    }
                });
                
            }
        });
        request.fail(function(jqXHR, textStatus) {
            console.log("Request failed: " + textStatus)
        });*/

        /*$.post(pageURL, params, function(data) {
            var users_count = jQuery.parseJSON(data);
            var packs = users_count / offset
            console.log(packs)
            for (let index = 0; index <= packs + 1; index++) {
                params = {
                    unact_users: 1,
                    offset: offset,
                    pack: index
                }
                $.post(pageURL, params, function(data1) {
                    let unact_users = jQuery.parseJSON(data1);
                    console.log('--' + index + '--')
                    console.log(unact_users)
                    var html = ''
                    $.each(unact_users, function(index, user) {
                        html += "<tr><td><a href='adm_user-" + user['id'] + "'>" + user[
                                'login'] + "</a></td>" +
                            "<td>" + user['email'] + "</td>" +
                            "<td>" + user['date'] + "</td>" +
                            "<td>" + user['balance'] + "</td>" +
                            "<td>" + user['TOKbalance'] + "</td></tr>";
                    });
                    table.html(table.html() + html)
                    if (index > packs) {
                        applyTables()
                    }
                });
            }

        });*/
    });
    </script>
</body>

</html>