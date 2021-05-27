import Vue from 'vue'
import Router from 'vue-router'
import Form from './components/views/Form';
import Success from './components/views/Success';
import store from './store';

Vue.use(Router)

export default new Router({
    mode: 'history',
    base: process.env.BASE_URL,
    routes: [
        {
            path: '/',
            name: 'form',
            component: Form
        },
        {
            path: '/success',
            name: 'success',
            component: Success,
            beforeEnter(to, from, next) {
                const redirect = store.getters.getSuccessStatus ? true : {name: 'form'};
                next(redirect);
            }
        }
    ]
})
