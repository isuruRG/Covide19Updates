import Vue from 'vue'
import App from './App.vue'
import router from './router.js'
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap';
import axios from 'axios';

Vue.config.productionTip = false
axios.defaults.baseURL = 'http://127.0.0.1:8000/'
new Vue({
    el: '#app',
    router,
    components:{ App},
  render: h => h(App),
}).$mount('#app')

