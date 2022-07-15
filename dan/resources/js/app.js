require('./bootstrap');

import Vue from 'vue'
import VueSession from 'vue-session'

//window.Vue = require('Vue');

Vue.component('pool-wizard-plot', require('./components/pool-wizard/Plot.vue').default);
Vue.use(VueSession)

const app = new Vue({
    el: '#app',
});