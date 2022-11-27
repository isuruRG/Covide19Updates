import Vue from 'vue'
import App from './App.vue'
import router from './router.js'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
import axios from 'axios';
Vue.config.productionTip = false
axios.defaults.baseURL = 'http://127.0.0.1:8000/'
if (localStorage.getItem("SET_TOKEN")) {
    axios.defaults.headers.common['Authorization'] = `Bearer ${JSON.parse(localStorage.getItem("SET_TOKEN"))}`
} else {
    axios.defaults.headers.common['Authorization'] = null
    localStorage.removeItem('SET_TOKEN')
}

new Vue({
    el: '#app',
    router,
    components: { App },
    render: h => h(App),
}).$mount('#app')

