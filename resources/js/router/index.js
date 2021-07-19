import Vue from 'vue'
import VueRouter from 'vue-router'
import VueMeta from 'vue-meta'

Vue.use(VueMeta)
Vue.use(VueRouter)

import Home from '../pages/Home'

// AUTHENTICATION
import Auth from '../pages/auth/Index'
import Login from '../pages/auth/Login'
import Register from '../pages/auth/Register'
import Logout from '../pages/auth/Logout'

// USER
import User from '../pages/user/Index'
import OneUser from '../pages/user/OneUser'
import UpdateUser from '../pages/user/UpdateUser'
import PasswordUser from '../pages/user/Password'

// POST
import Post from '../pages/post/Index'
import OnePost from '../pages/post/OnePost'
import UpdatePost from '../pages/post/UpdatePost'
import CreatePost from '../pages/post/CreatePost'

// CATEGORY
import Category from '../pages/category/Index'
import OneCategory from '../pages/category/OneCategory'
// import AllCategory from '../pages/category/AllCategory'


const Router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: Home,
            name: 'home',
            meta: {
                title: 'Trang chủ',
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
                },
                {
                    path: 'update',
                    component: UpdateUser,
                    name: 'update-user',
                    meta: {
                        title: 'Chỉnh sửa thông tin',
                    }
                },
                {
                    path: 'password',
                    component: PasswordUser,
                    name: 'change-password',
                    meta: {
                        title: 'Đổi mật khẩu',
                    }
                },
            ]
        },
        {
            path: '/post',
            component: Post,
            name: 'post',
            children: [
                {
                    path: ':id-:slug',
                    component: OnePost,
                    name: 'one-post',
                },
                {
                    path: 'update/:id',
                    component: UpdatePost,
                    name: 'update-post',
                    meta: {
                        title: 'Chỉnh sửa bài viết',
                    }
                },
                {
                    path: 'create',
                    component: CreatePost,
                    name: 'create-post',
                    meta: {
                        title: 'Tạo bài vỉết mới',
                    }
                },
            ]
        },
        {
            path: '/category',
            component: Category,
            name: 'category',
            children: [
                {
                    path: ':id-:slug',
                    component: OneCategory,
                    name: 'one-category',
                },
                // {
                //     path: 'update/:id',
                //     component: UpdatePost,
                //     name: 'update-post',
                //     meta: {
                //         title: 'Chỉnh sửa bài viết',
                //     }
                // },
                // {
                //     path: 'create',
                //     component: CreatePost,
                //     name: 'create-post',
                //     meta: {
                //         title: 'Tạo bài vỉết mới',
                //     }
                // },
            ]
        },
    ],
    scrollBehavior (to, from, savedPosition) {
        return { x: 0, y: 0 }
    }

})

Router.beforeEach((to, from, next) => {
    document.title = to.meta.title || 'DESOD';
    next();
})

export default Router;