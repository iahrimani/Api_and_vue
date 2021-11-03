require('./bootstrap');

import Vue from 'vue'
// https://www.youtube.com/watch?v=lgMF-dTEZ_U&list=PLze7bMjv1CYtP6FSv6L60IpI3rynxAStr&index=2
import VueRouter from "vue-router";

Vue.use(VueRouter)

import App from './components/App'
import Home from './components/Home'
import Desks from './components/desks/Desks'
import ShowDesk from './components/desks/ShowDesk'

const router = new VueRouter({
    mode: 'history',
    routes:[
        {
            path: '/',
            name: 'home',
            component: Home
        },

        {
            path: '/desks',
            name: 'desks',
            component: Desks
        },

        {
            path: '/desks/:deskId',
            name: 'ShowDesk',
            component: ShowDesk,
            props: true
        },

    ]
})

// Подключает Vue компонент в шаблон из папки components
// Vue.component('App', require('./components/App').default)

const app = new Vue({
    el:'#app',
    components: {App},
    router
})
