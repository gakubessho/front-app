
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
Vue.use(VueRouter);

// vue-routerによるルーティング設定
const router = new VueRouter({
    mode: 'history',
    routes: [
        { path: '/', component: require('./components/spa/list.vue'), name: 'list' }, // ルートでアクセスしたら、List.vueを表示
        { path: '/create', component: require('./components/spa/Form.vue'), name: 'create' }, // createにアクセスしたらForm.vueを表示
        { path: '/:id', component: require('./components/spa/Detail.vue'), name: 'detail' }, // id番号でアクセスしたらDetail.vueを表示
    ]
});


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('navbar', require('./components/spa/Navbar.vue'));

const app = new Vue({
    router
}).$mount('#app');