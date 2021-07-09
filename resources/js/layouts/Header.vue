<template>
    <nav class="navbar bg-light-blue navbar-light navbar-expand">
    <div class="container-lg">
        <div class="nav-brand">
            <router-link :to="{ name: 'home' }">
                <img src="images/logo.png" alt="" class="d-block d-lg-none"/>
                <img src="images/logo-main.png" alt="" class="d-none d-lg-block"/>
            </router-link>
            
        </div>

        <div class="form-search">
            <input class="form-input" placeholder="Tìm kiếm bài viết" />
            <button type="submit" class="form-button">
                <b-icon icon="search" />
            </button>
        </div>

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
            <li class="nav-item" v-if="getUser.role == 'admin'">
                <router-link 
                    :to="{ name: 'dashboard' }"
                    class="nav-link text-decoration-none px-3 mr-2"            
                >
                    <b-icon icon="gear-wide-connected" />                         
                    <span class="d-none d-lg-inline-block">Quản trị</span>
                </router-link>
            </li>
            <li class="nav-item">
                <b-nav-item-dropdown>
                    <template #button-content>
                        <img
                            :src="getUser.avatar || 'images/default.png'"
                            class="rounded-circle img-center"
                            alt=""
                            height="30px"
                            width="30px"
                        />
                        <span class="d-none d-lg-inline">{{ getUser.fullname }}</span>
                    </template>
                    <b-dropdown-item>
                        <router-link 
                            :to="{ name: 'login' }"
                            class="text-decoration-none"            
                        >
                            <b-icon icon="person-square" /> Trang cá nhân
                        </router-link>
                    </b-dropdown-item>

                    <b-dropdown-item>
                        <router-link 
                            :to="{ name: 'login' }"
                            class="text-decoration-none"            
                        >
                            <b-icon icon="newspaper" /> Bài viết của bạn
                        </router-link>
                    </b-dropdown-item>

                    <b-dropdown-item>
                        <router-link 
                            :to="{ name: 'login' }"
                            class="text-decoration-none"            
                        >
                            <b-icon icon="chat-dots-fill" /> Bình luận của bạn
                        </router-link>
                    </b-dropdown-item>

                    <b-dropdown-item>
                        <router-link 
                            :to="{ name: 'login' }"
                            class="text-decoration-none"            
                        >
                            <b-icon icon="person-lines-fill" /> Thay đổi thông tin
                        </router-link>
                    </b-dropdown-item>
                       <hr />
                    <b-dropdown-item>
                        <router-link 
                            :to="{ name: 'logout' }"
                            class="text-decoration-none"            
                        >
                            <b-icon icon="arrow-left-circle" /> Đăng xuất
                        </router-link>
                    </b-dropdown-item>
                </b-nav-item-dropdown>
            </li>
            <li class="nav-item">
                <router-link 
                    :to="{ name: 'register' }"
                    class="nav-link d-none d-md-inline-block text-decoration-none border border-secondary text-white bg-dark px-5 rounded-pill ml-2"            
                >
                    Viết bài
                </router-link>
                <router-link 
                    :to="{ name: 'register' }"
                    class="nav-link d-md-none d-inline-block text-decoration-none border border-secondary text-white bg-dark rounded-pill ml-2"            
                >
                    <b-icon icon="plus-circle-fill" />
                </router-link>
            </li>
        </ul>
    </div>
  </nav>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';

/*****COMPONENTS*****/

export default {
    computed: {
        ...mapGetters(['getStatus', 'getUser'])
    },

    methods: {
        ...mapActions(['user']),
        async handle() {
            await this.user()
        }
    },

    created() {
        if(this.getStatus == false)
            this.handle()
        
    }

}
</script>

<style scoped>
.img-center {
    object-fit: cover;
}
.bg-light-blue {
    color: #fff;
    border-bottom: 1px dashed #ccc;
}

.bg-light-blue a{
    color: #2C3E50;
}

ul li:nth-last-child(1) > a{
    border-left: 1px dashed #ccc;
}
.form-search {
    display: flex;
    border-radius: 25px;
    border: 1px solid #ccc;
    padding: 0.5rem 1rem;
    flex-direction:row;
}
.form-md-search {
    max-width: 75%;
    display: flex;
    border-radius: 25px;
    border: 1px solid #ccc;
    padding: 0.5rem 1rem;
    flex-direction:row;
}
.form-input {
    flex-grow: 2;
    padding: 5px;
    border: none;
}
.form-input:focus {
    outline: none;
}
.form-button {
    background: transparent;
    border: none;
    color:black;
}
</style>