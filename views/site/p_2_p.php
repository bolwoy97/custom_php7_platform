<? 
$pn='p_2_p';
$p_header='P2P'; 
?>

<?require_once(ROOT.'/views/layouts/head.php');?>

<body>

    <?require_once(ROOT.'/views/layouts/sidebar.php');?>

    <div class="content" id="app">

        <?require_once(ROOT.'/views/layouts/header.php');?>


        <div class="grid">
            <div class="sections sections4" >
                <section class="table last-operations float-left" style="width:48%; ">

                    <div class="head">
                        <div class="title"><img src="/assets/img/operations.svg" alt="">Выводы</div>

                        <div> <input type="text" v-on:keyup.enter="search('outcome')" v-model="tabs.outcome.params.search"
                            placeholder="Search.."  title="Search.."><br> <small>Нажмите Enter для поиска</small></div>
                    </div>
                    <div>

                        <div class="head">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item" v-if="tabs.outcome.params.page>0">
                                        <div class="page-link"  v-on:click="page('outcome',0)">1</div>
                                    </li>
                                    <li class="page-item" v-if="tabs.outcome.params.page>0">
                                        <div class="page-link"
                                            v-on:click="page('outcome',tabs.outcome.params.page-1)">&laquo;</div></li>

                                    <li class="page-item active"><div class="page-link" >{{tabs.outcome.params.page+1}}</div>
                                    </li>

                                    <li class="page-item"  v-if="tabs.outcome.params.page<tabs.outcome.params.pages" disabled>
                                        <div class="page-link" 
                                            v-on:click="page('outcome',tabs.outcome.params.page+1)">&raquo;</div></li>

                                    <li class="page-item" v-if="tabs.outcome.params.page<tabs.outcome.params.pages">
                                        <div class="page-link"  v-on:click="page('outcome',tabs.outcome.params.pages)">
                                            {{tabs.outcome.params.pages+1}}
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                        <div v-if="tabs.outcome.params.loading">
                            <loader />
                        </div>
                        <table cellpadding='0' cellspacing='0' v-else>
                            <thead>
                                <tr>
                                    <th><?= $lng['txt135'] ?></th>
                                    <th>Login</th>
                                    <th><?= $lng['txt136'] ?></th>
                                    <th><?= $lng['txt137'] ?></th>
                                    <th><?= $lng['txt138'] ?></th>
                                    <!--<th><?= $lng['txt84']?></th>-->
                                </tr>
                            </thead>
                            <tbody v-if="tabs.outcome.data.length" >
                                <tr v-for="action in tabs.outcome.data" style="font-size:10%;">
                                    <td><small>{{action.operation}}</small></td>
                                    <td class="green" :title="action.type+' user- '+action.user">{{action.user_show_hid}}</td>
                                    <td class="green">{{action.amount}}</td>
                                    <td> <small> {{action.date}}</small></td>
                                    <td class="complete" :title="action.coment">
                                        <img :src="'/assets/img/'+action.status_img" alt="">{{action.status_show}}</td>
                                    <!--<td class="green">{{action.stage_show}}</td>-->
                                </tr>
                               
                            </tbody>
                            <div v-else-if="!tabs.outcome.data.length">Ничего не найдено</div>
                        </table>
                    </div>
                </section>
                <div class="table last-operations float-left" style="width:2%;">
                </div>
                <section class="table last-operations float-left" style="width:48%;">

                    <div class="head">
                        <div class="title"><img src="/assets/img/operations.svg" alt="">Пополнения</div>

                        <div> <input type="text" v-on:keyup.enter="search('income')" v-model="tabs.income.params.search"
                            placeholder="Search.."  title="Search.."><br> <small>Нажмите Enter для поиска</small></div>
                    </div>
                    <div>

                        <div class="head">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item" v-if="tabs.income.params.page>0">
                                        <div class="page-link"  v-on:click="page('income',0)">1</div>
                                    </li>
                                    <li class="page-item" v-if="tabs.income.params.page>0">
                                        <div class="page-link"
                                            v-on:click="page('income',tabs.income.params.page-1)">&laquo;</div></li>

                                    <li class="page-item active"><div class="page-link" >{{tabs.income.params.page+1}}</div>
                                    </li>

                                    <li class="page-item"  v-if="tabs.income.params.page<tabs.income.params.pages" disabled>
                                        <div class="page-link" 
                                            v-on:click="page('income',tabs.income.params.page+1)">&raquo;</div></li>

                                    <li class="page-item" v-if="tabs.income.params.page<tabs.income.params.pages">
                                        <div class="page-link"  v-on:click="page('income',tabs.income.params.pages)">
                                            {{tabs.income.params.pages+1}}
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                        <div v-if="tabs.income.params.loading">
                            <loader />
                        </div>
                        <table cellpadding='0' cellspacing='0' v-else>
                            <thead>
                                <tr>
                                    <th><?= $lng['txt135'] ?></th>
                                    <th>Login</th>
                                    <th><?= $lng['txt136'] ?></th>
                                    <th><?= $lng['txt137'] ?></th>
                                    <th><?= $lng['txt138'] ?></th>
                                    <!--<th><?= $lng['txt84']?></th>-->
                                </tr>
                            </thead>
                            <tbody v-if="tabs.income.data.length">
                                <tr v-for="action in tabs.income.data">
                                    <td><small>{{action.operation}}</small></td><!---->
                                    <td class="green" :title="action.type+' user- '+action.user">{{action.user_show_hid}}</td>
                                    <td class="green">{{action.amount}}</td>
                                    <td><small>{{action.date}}</small></td>
                                    <td class="complete" :title="action.coment">
                                        <img :src="'/assets/img/'+action.status_img" alt="">{{action.status_show}}</td>
                                   <!-- <td class="green">{{action.stage_show}}</td>-->
                                </tr>
                               
                            </tbody>
                            <div v-else-if="!tabs.income.data.length">Ничего не найдено</div>
                        </table>
                    </div>
                </section>
            </div>
        </div>



    </div>

    <div class="milk-shadow"></div>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/script.js"></script>
    <script src="/assets/js/owl.carousel.min.js"></script>
    <script src="/assets/js/jquery.magnific-popup.js"></script>

    <?require_once(ROOT.'/views/scripts/vue.php');?>
    <script>
   initVue({ outcome:{
                    params: {
                        loading:false,
                        name:'outcome',
                        search: '',
                        page: 0,
                        perPage: 10,
                        pages: 0
                    },
                    data: [],
                },
                income:{
                    params: {
                        loading:false,
                        name:'income',
                        search: '',
                        page: 0,
                        perPage: 10,
                        pages: 0
                    },
                    data: [],
                },
   })
    </script>

   

</body>

</html>