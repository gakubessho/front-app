require('./bootstrap');


window.Vue = require('vue');
import router from './router';
import http from './services/http'
import userStore from './stores/userStore'

const app = new Vue({
  router,
  el: '#app',
  created () {
    http.init()
    userStore.init()
  },
  render: h => h(require('./app.vue')),
})