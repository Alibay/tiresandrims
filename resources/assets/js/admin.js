
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('metismenu/dist/metisMenu.min.js')
require('sb-admin-2-sass/dist/js/sb-admin-2.js');

window.Vue = require('vue');

const app = new Vue({
    el: '#app'
});
