import Vue from 'vue';
import Vuex from 'vuex';
import Auth from './modules/auth';
import Temp from './modules/temp';
Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        Auth,
        Temp,
    }
})