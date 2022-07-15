require('./bootstrap');

import Vue from 'vue'
import VueSession from 'vue-session'

import 'bootstrap/dist/js/bootstrap.bundle.min'

//window.Vue = require('Vue');

Vue.component('pool-wizard-plot', require('./components/pool-wizard/Plot.vue').default);
Vue.component('forms-swimming-pool', require('./components/forms/SwimmingPool.vue').default);
Vue.use(VueSession)

const app = new Vue({
    el: '#app',
});