import './bootstrap';
import Vue from 'vue';

import flash from './components/flash.vue';
// Vue.component('flash', flash);

Vue.component('flash',require('./components/flash.vue'))


const app = new Vue({
    el :'#app'
})





