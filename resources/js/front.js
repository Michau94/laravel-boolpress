/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// IMPORTAZIONE GLOBALE DI AXIOS
window.axios = require('axios');
window.dayjs = require('dayjs');

import Vue from 'vue';
import App from './views/App.vue';

const app = new Vue({

    el: '#root',
    render: h => h(App)
})