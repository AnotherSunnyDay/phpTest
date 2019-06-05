

require('./bootstrap');

window.Vue = require('vue');
window.VueRouter = require('vue-router')

Vue.component('example', require('./components/Example.vue'));
Vue.component('formv', require('./components/Form.vue'));

const app = new Vue({
    el: '#app'
});
