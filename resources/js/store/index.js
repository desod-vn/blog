import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

import auth from './modules/auth'
import user from './modules/user'
import post from './modules/post'
import category from './modules/category'



export default new Vuex.Store({
    modules: {
        auth,
        post,
        user,
        category,
    }
})