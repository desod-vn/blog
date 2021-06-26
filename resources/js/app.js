require('./bootstrap');

import Vue from 'vue'
import App from './App.vue'
import Router from './router'
import Store from './store'

Router.beforeEach((to, from, next) => {
    document.title = to.meta.title || 'TOP TRAVEL';
    next();
})

new Vue({
    router: Router,
    store: Store,
    render: h => h(App),
  }).$mount('#app')
  