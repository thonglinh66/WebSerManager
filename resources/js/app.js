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
import Update from './components/pages/Update.vue'
import ChartLine from './components/pages/ChartLine.vue'
import ChartBar from './components/pages/ChartBar.vue'


import Vue from 'vue'
import VueRouter from 'vue-router'
import VueToast from 'vue-toast-notification'
import 'vue-toast-notification/dist/theme-sugar.css'
import { initialize } from "./modules/general"
import VueApexCharts from 'vue-apexcharts'
Vue.use(VueApexCharts)

Vue.component('apexchart', VueApexCharts)
Vue.use(VueToast,{
    position: 'top'
});
Vue.use(VueRouter)
const routes = [
    {  path: '/home', component: Home, props: true, meta: { requiresAuth: true }},
    {  path: '/login', component: Login, meta: { requiresAuth: false }},
    {  path: '/detail', component: Detail, props: true, meta: { requiresAuth: true } },
    {  path: '/create', component: Create, meta: { requiresAuth: true } },
    {  path: '/change', component: Update, meta: { requiresAuth: true } },
    {  path: '/chartline', component: ChartLine, meta: { requiresAuth: true } },
    {  path: '/chartbar', component: ChartBar, meta: { requiresAuth: true } },

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