import Vue from 'vue'
import VueRouter from 'vue-router'
import VueMeta from 'vue-meta'

Vue.use(VueMeta)
Vue.use(VueRouter)

import Home from '../pages/test'

// AUTHENTICATION
import Auth from '../pages/auth/Index'
import Login from '../pages/auth/Login'
import Register from '../pages/auth/Register'
import Logout from '../pages/auth/Logout'

// USER
import User from '../pages/user/Index'
import OneUser from '../pages/user/OneUser'



import Dashboard from '../pages/dashboard/Dashboard'
import CreateCategory from '../pages/dashboard/category/Create'



const Router = new VueRouter({
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
            path: '/auth',
            component: Auth,
            name: 'auth',
            children: [
                {
                    path: 'login',
                    component: Login,
                    name: 'login',
                    meta: {
                        title: 'Đăng nhập',
                    }
                },
                {
                    path: 'register',
                    component: Register,
                    name: 'register',
                    meta: {
                        title: 'Đăng ký tài khoản',
                    }
                },
                {
                    path: 'logout',
                    component: Logout,
                    name: 'logout',
                    meta: {
                        title: 'Đăng xuất tài khoản',
                    }
                },
            ]
        },
        {
            path: '/user',
            component: User,
            name: 'user',
            children: [
                {
                    path: ':id-:slug',
                    component: OneUser,
                    name: 'one-user',
                    meta: {
                        title: '',
                    }
                },
            ]
        },
        {
            path: '/dashboard',
            component: Dashboard,
            name: 'dashboard',
            meta: {
                title: 'Trang quản trị',
            },
            children: [
                {
                    path: 'category/create',
                    component: CreateCategory,
                    name: 'create-category',
                    meta: {
                        title: 'Tạo thư mục mới',
                    },
                },
            ]
        }
    ]
})

Router.beforeEach((to, from, next) => {
    document.title = to.meta.title || 'DESOD';
    next();
})

export default Router;