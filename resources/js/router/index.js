import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Home from '../pages/test'

import Login from '../pages/auth/Login'
import Register from '../pages/auth/Register'
import Logout from '../pages/auth/Logout'




export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: Home,
            name: 'home',
            meta: {
                title: 'Website hỗ trợ và tổ chức tham gia hoạt động du lịch',
            }
        },
        {
            path: '/login',
            component: Login,
            name: 'login',
            meta: {
                title: 'Đăng nhập',
            }
        },
        {
            path: '/register',
            component: Register,
            name: 'register',
            meta: {
                title: 'Đăng ký tài khoản',
            }
        },
        {
            path: '/logout',
            component: Logout,
            name: 'logout',
            meta: {
                title: 'Đăng xuất tài khoản',
            }
        }
    ]
})