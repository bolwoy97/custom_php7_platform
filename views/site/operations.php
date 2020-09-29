<? $p_header=$lng['txt177']; ?>

<?require_once(ROOT.'/views/layouts/head.php');?>

<body>

    <?require_once(ROOT.'/views/layouts/sidebar.php');?>

    <div class="content" id="app">

        <?require_once(ROOT.'/views/layouts/header.php');?>


        <div class="grid">
            <div class="sections sections4">
                <section class="table last-operations">

                    <div class="head">
                        <div class="title"><img src="/assets/img/operations.svg" alt=""><?= $lng['txt182'] ?></div>

                        <div> <input type="text" v-on:keyup.enter="search('actions')"
                                v-model="tabs.actions.params.search" placeholder="Search.." title="Search.."><br>
                            <small>Нажмите Enter для поиска</small></div>
                    </div>
                    <div>

                        <div class="head">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item" v-if="tabs.actions.params.page>0">
                                        <div class="page-link" v-on:click="page('actions',0)">1</div>
                                    </li>
                                    <li class="page-item" v-if="tabs.actions.params.page>0">
                                        <div class="page-link" v-on:click="page('actions',tabs.actions.params.page-1)">
                                            &laquo;</div>
                                    </li>

                                    <li class="page-item active">
                                        <div class="page-link">{{tabs.actions.params.page+1}}</div>
                                    </li>

                                    <li class="page-item" v-if="tabs.actions.params.page<tabs.actions.params.pages"
                                        disabled>
                                        <div class="page-link" v-on:click="page('actions',tabs.actions.params.page+1)">
                                            &raquo;</div>
                                    </li>

                                    <li class="page-item" v-if="tabs.actions.params.page<tabs.actions.params.pages">
                                        <div class="page-link" v-on:click="page('actions',tabs.actions.params.pages)">
                                            {{tabs.actions.params.pages+1}}
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                        <div v-if="tabs.actions.params.loading">
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
                                    <th><?= $lng['txt84']?></th>
                                </tr>
                            </thead>
                            <tbody v-if="tabs.actions.data.length">
                                <tr v-for="action in tabs.actions.data">
                                    <td>{{action.operation}}</td>
                                    <td class="green">{{action.user_show_hid}}</td>
                                    <td class="green">{{action.amount}}</td>
                                    <td>{{action.date}}</td>
                                    <td class="complete" :title="action.coment">
                                        <img :src="'/assets/img/'+action.status_img" alt="">{{action.status_show}}</td>
                                    <td class="green">{{action.stage_show}}</td>
                                </tr>

                            </tbody>
                            <div v-else-if="!tabs.actions.data.length">Ничего не найдено</div>
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
    initVue({
        actions: {
            params: {
                loading: false,
                name: 'actions',
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