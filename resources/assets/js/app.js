require('./bootstrap');

window.Vue = require('vue');
import router from './router';
import VueRouter from 'vue-router';
Vue.use(VueRouter);


const app = new Vue({
  router,
  el: '#app',
  render: h => h(require('./app.vue')),
})