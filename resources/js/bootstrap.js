import Vue from 'vue'
import router from './router'
import store from './store'
import App from './components/App'
import 'bootstrap/dist/css/bootstrap.min.css';
import axios from "axios";
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios = axios;

new Vue({
    router,
    store,
    render: h => h(App)
}).$mount('#root')
