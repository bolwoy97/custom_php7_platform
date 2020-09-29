<!--<script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
<script src="res\custom\vue\vue.js"></script>-->
<script src="res\custom\vue\vue.min.js"></script>

<script>
Vue.component('loader', {
    template: ` <div style="display: flex;justify-content: center;align-items: center">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div> </div>`
})

function initVue(tabs){
    new Vue({
        el: '#app',
        data() {
            return {
                tabs:tabs
            }
        },
        computed: {
            /*canCreate() {
            return this.form.value.trim() && this.form.name.trim()
            }*/
        },
        methods: {
            async search(id) {
                if(!this.tabs[id].params.loading){
                    this.tabs[id].params.page = 0
                    this.load(id)
                }
            },
            async page(id,page) {
                if(!this.tabs[id].params.loading){
                    this.tabs[id].params.page = page
                    this.load(id)
                }
            },
            async load(id){
                this.tabs[id].params.loading = true
                //this.tabs[id].data = []
                    let res = await request('', 'POST', {
                        data: this.tabs[id].params.name,
                        search: this.tabs[id].params.search,
                        page: this.tabs[id].params.page,
                        perPage: this.tabs[id].params.perPage
                    })
                    this.tabs[id].data = res.data
                    this.tabs[id].params.page = parseInt(res.page)
                    this.tabs[id].params.pages = parseInt(res.pages)
                this.tabs[id].params.loading = false
            }
        },
        async mounted() {
            for (var tab in this.tabs) {
                this.load(""+tab)
            }
        }
    })
}

//////////////////////
async function request(url, method = 'GET', data = null) {
    try {
        const headers = {}
        let body

        if (data) {
            var fd = new FormData();
            for (var i in data) {
                fd.append(i, data[i]);
            }
            body = fd
            /* headers['Content-Type'] = 'application/json'
            body = JSON.stringify(data)*/
        }
        const response = await fetch(url, {
            method,
            headers,
            body
        })
        let res = await response.json()
        if(res.memory){
            console.log("memory = "+res.memory)
        }
        if(res.exec_time){
            console.log("exec_time = "+res.exec_time)
        }
        //console.log(res)
        return  res
    } catch (e) {
        console.warn('Error:', e.message)
    }
}
</script>