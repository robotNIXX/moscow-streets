window.Vue = Vue;

import 'es6-promise/auto'
import "./bootstrap"
import axios from 'axios';
import Vue from 'vue';
import VueRouter from 'vue-router';
import YmapPlugin from 'vue-yandex-maps'
import VueAuth from "@websanova/vue-auth"
import VueAxios from 'vue-axios'
import PerfectScrollbar from 'vue2-perfect-scrollbar'
import 'vue2-perfect-scrollbar/dist/vue2-perfect-scrollbar.css'
import FileUpload from 'v-file-upload'

import router from "./app/config/routes"
import settings from "./app/config/settings"
import auth from "./app/config/auth"
import store from './app/stores/index';


import App from "./app/views/App"

Vue.router = router;
Vue.use(VueRouter);
Vue.use(YmapPlugin, settings.maps)
Vue.use(VueAxios, axios)
Vue.use(PerfectScrollbar)
Vue.use(FileUpload)
axios.defaults.baseURL = '/api/v1'

Vue.use(VueAuth, auth)

Vue.component('app', App)
const app = new Vue({
    el: '#app',
    router,
    store
});