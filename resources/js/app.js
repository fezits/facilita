require('./bootstrap');
window.Vue = require('vue').default;
import vSelect from 'vue-select';
import App from './views/App.vue'
import VueRouter from 'vue-router'
import routes from './routers/router'
import Vue from 'vue'
import axios from 'axios'
import DatePicker from 'vue2-datepicker';

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'vue2-datepicker/index.css';
import 'vue-select/dist/vue-select.css';
import '../css/app.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import {ptBR} from 'vue2-datepicker/locale/pt-br'

Vue.prototype.$axios = axios
Vue.component( 'v-select', vSelect );
Vue.component( 'date-picker', DatePicker );
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    linkActiveClass: "active",
    linkExactActiveClass: "exact-active",
    routes
})


const app = new Vue({
    el: '#app',
    components: {App},
    router
});
