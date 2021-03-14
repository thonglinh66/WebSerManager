require('./bootstrap');


window.Vue = require('vue');
import VueAxios from 'vue-axios';
import axios from 'axios';
import store from './store'
Vue.use(VueAxios, axios);
import Home from './components/pages/Home.vue'
import Detail from './components/pages/Detail.vue'
import Create from './components/pages/Add.vue'
import Login from './components/pages/Login.vue'

import Vue from 'vue'
import VueRouter from 'vue-router'
import VueToast from 'vue-toast-notification'
import 'vue-toast-notification/dist/theme-sugar.css'
import { initialize } from "./modules/general"

Vue.use(VueToast,{
    position: 'top'
});
Vue.use(VueRouter)
const routes = [
    {  path: '/home', component: Home, props: true, meta: { requiresAuth: true }},
    {  path: '/login', component: Login, meta: { requiresAuth: false }},
    { name: 'detail', path: '/detail', component: Detail, props: true, meta: { requiresAuth: true } },
    {  path: '/create', component: Create, meta: { requiresAuth: true } },
  ]

const router = new VueRouter({
    mode: 'history',
    routes 
})
initialize(store, router);
Vue.config.devtools = false
Vue.component('mainapp', require('./App.vue'))
const app = new Vue({
    el: '#app',
    router,
    store
});