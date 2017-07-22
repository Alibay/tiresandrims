
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

const vueResource = require('vue-resource');

Vue.use(vueResource);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('search-rims-by-car', require('./components/car/rim/SearchRimsByCar.vue'));
Vue.component('search-tires-by-car', require('./components/car/tire/SearchTiresByCar.vue'));
Vue.component('select-modification', require('./components/car/modification/SelectModification.vue'));

const app = new Vue({
    el: '#app'
});
