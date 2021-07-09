<template>
    <section class="login">
        <div class="container">
            <div class="row">
                <div class="d-flex justify-content-center align-items-center min-vh-100">
                    <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-4">
                        <figure class="text-center mb-5">
                            <router-link :to="{ name: 'home' }">
                               <img src="images/logo-thumb.png" alt="" title="Trang chủ"/>
                            </router-link>
                        </figure>
                        <div class="form-group">
                            <input
                                type="text"
                                class="form-control my-3 py-4 rounded-0"
                                v-model="user.name"
                                placeholder="Tên đăng nhập"
                            />
                        </div>

                        <div class="form-group">
                            <input
                                type="password"
                                class="form-control my-3 py-4 rounded-0"
                                v-model="user.password"
                                placeholder="Mật khẩu"

                            />
                        </div>
                        <p class="text-right">
                            <router-link 
                                :to="{ name: 'register' }"
                                class="text-decoration-none"
                            >
                                Quên mật khẩu
                            </router-link>
                        </p>
                        <button 
                            type="submit" 
                            class="btn rounded-0 btn-block btn-lg btn-success"
                            @click="handle()"
                        >
                            Đăng nhập
                        </button>

                        <p class="mt-4">
                            Không có tài khoản ? 
                            <router-link 
                                :to="{ name: 'register' }"
                                class="text-decoration-none"
                            >
                                Tạo tài khoản mới <b-icon icon="arrow-right"></b-icon>
                            </router-link>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';

/*****COMPONENTS*****/

export default {
    data() { 
        return {
            user: {
                name: '',
                password: '',
            },
            join: false,
        }
    },

    computed: {
        ...mapGetters(['getStatus', 'getError', 'getToken'])
    },

    watch: {
        getStatus() {
            if(this.getStatus == true)
            {
                localStorage.setItem("token", this.getToken);
                this.$router.push({ name: "home" });
            }
        }
    },

    methods: {
        ...mapActions(['login']),
        async handle() {
            await this.login(this.user)
            this.join = !this.getStatus
        }
    },

    created() {
        if(this.getStatus == true)
            this.$router.push({ name: "home" });
    }
}
</script>