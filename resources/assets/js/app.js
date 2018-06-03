
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
const taha = require('./components/tahaComponent.vue')
// let MyHeader = require('./components/MyHeaderComponent.vue')

import MyHeader from './components/MyHeaderComponent.vue'
import myFooter from './components/FooterComponent.vue'
import Phonebook from './components/PhonebookComponent.vue'
import About from './components/AboutComponent.vue'


const app = new Vue({
    el: '#app',
    components: {
        MyHeader,
        taha,
        myFooter,
        About,
        Phonebook
    },
});
