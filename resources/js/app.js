require('./bootstrap');
window.Vue = require('vue').default;

import App from './views/App.vue'
import VueRouter from 'vue-router'
import routes from './routers/router'
import Vue from 'vue';

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
import 'bootstrap/dist/css/bootstrap.css'
import '../css/app.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
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
