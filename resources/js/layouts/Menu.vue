<template>
    <div>
        <ul 
            class="navbar-nav"
            v-if="!getStatus"
        >
            <li class="nav-item">
                <router-link 
                    :to="{ name: 'register' }"
                    class="nav-link text-decoration-none"            
                >
                    Đăng ký
                </router-link>
            </li>
            <li class="nav-item">
                <router-link 
                    :to="{ name: 'login' }"
                    class="nav-link text-decoration-none"            
                >
                    Đăng nhập
                </router-link>
            </li>
        </ul>

        <ul 
            class="navbar-nav"
            v-else
        >
            <li class="nav-item">
                <router-link 
                    :to="{ name: 'create-post' }"
                    class="nav-link text-decoration-none border border-secondary text-white bg-dark px-md-5 rounded-pill"            
                >
                    <i class="fas fa-plus-circle"></i> 
                    <span class="d-none d-md-inline"> BÀI VIẾT</span>
                </router-link>
            </li>

            <li class="nav-item mx-3">
                <b-nav-item-dropdown right>
                    <template #button-content>
                        <img
                            :src="getUser.avatar || '/images/default.png'"
                            class="rounded-circle img-center"
                            alt=""
                            height="30px"
                            width="30px"
                        />
                        <span class="d-none d-lg-inline">{{ getUser.fullname }}</span>
                    </template>
                    <b-dropdown-item>
                        <router-link 
                            :to="{ 
                                name: 'one-user',
                                params: {
                                    id: getUser.id,
                                    slug: getUser.slug
                                } 
                            }"
                            class="text-decoration-none"            
                        >
                            <i class="fas fa-user-alt"></i> Trang cá nhân
                        </router-link>
                    </b-dropdown-item>

                    <b-dropdown-item>
                        <router-link 
                            :to="{ 
                                name: 'one-user',
                                params: {
                                    id: getUser.id,
                                    slug: getUser.slug
                                },
                                query: {
                                    action: 'posts'
                                }
                            }"
                            class="text-decoration-none"            
                        >
                            <i class="far fa-newspaper"></i> Bài viết của bạn
                        </router-link>
                    </b-dropdown-item>

                    <b-dropdown-item>
                        <router-link 
                            :to="{
                                name: 'one-user',
                                params: {
                                    id: getUser.id,
                                    slug: getUser.slug
                                },
                                query: {
                                    action: 'comments'
                                }
                            }"
                            class="text-decoration-none"            
                        >
                            <i class="fas fa-comments"></i> Bình luận của bạn
                        </router-link>
                    </b-dropdown-item>

                    <b-dropdown-item>
                        <router-link 
                            :to="{ name: 'update-user' }"
                            class="text-decoration-none"            
                        >
                            <i class="fas fa-user-cog"></i> Thay đổi thông tin
                        </router-link>
                    </b-dropdown-item>
                    <b-dropdown-item>
                        <router-link 
                            :to="{ name: 'change-password' }"
                            class="text-decoration-none"
                        >
                            <i class="fas fa-lock"></i> Đổi mật khẩu
                        </router-link>
                    </b-dropdown-item>
                        <hr />
                    <b-dropdown-item>
                        <router-link 
                            :to="{ name: 'logout' }"
                            class="text-decoration-none"            
                        >
                            <i class="fas fa-sign-out-alt"></i> Đăng xuất
                        </router-link>
                    </b-dropdown-item>
                </b-nav-item-dropdown>
            </li>

        </ul>
    </div>
</template>

<script>
export default {
    props: ['getStatus', 'getUser', 'getLogStatus']
}
</script>

<style scoped>
.bg-light-blue a{
    color: #2C3E50;
}

ul li:nth-last-child(1) > a{
    border-left: 1px dashed #ccc;
}

.img-center {
    object-fit: cover;
}
</style>