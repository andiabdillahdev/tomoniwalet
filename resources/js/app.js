/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue'
import router from './router.js'
import store from './store.js'
import App from './App.vue'

window.Vue = require('vue');


// Vue.component('mainapp', require('./components/mainapp.vue').default);





new Vue({
    el: '#dw',
    router,
    store,
    components: {
        App
    }
})

// const app = new Vue({
//     el: '#app',
//     router
// });
