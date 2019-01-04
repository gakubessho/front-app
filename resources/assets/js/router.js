import VueRouter from 'vue-router'
import Vue from 'vue'

Vue.use(VueRouter)

export default new VueRouter({
  mode: 'history',
  routes: [
    { path: '/', component: require('./components/Categories.vue') },
    { path: '/about', component: require('./components/About.vue') },
    { path: '/login', component: require('./components/Login.vue') },
    { path: '/records', component: require('./components/Records.vue') },
  ],
  scrollBehavior (to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition
    } else {
      return { x: 0, y: 0 }
    }
  },
})