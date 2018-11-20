require('./bootstrap');

window.Vue = require('vue');
import router from './routes'
import store from './store'
import common from './common'
Vue.mixin(common)

Vue.component('master', require('./layout/master.vue'));

const app = new Vue({
	router,
	store,
    el: '#app'
});