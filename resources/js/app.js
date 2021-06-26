require('./bootstrap');

import Vue from 'vue'
import App from './App.vue'
import Router from './router'
import VueAxios from 'vue-axios';
import axios from 'axios';

Vue.use(VueAxios, axios);

Router.beforeEach((to, from, next) => {
    document.title = to.meta.title || 'TOP TRAVEL';
    next();
})

new Vue({
    router: Router,
    render: h => h(App),
  }).$mount('#app')
  