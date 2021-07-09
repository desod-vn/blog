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
                                type="email"
                                class="form-control my-3 py-4 rounded-0"
                                v-model="user.email"
                                placeholder="Địa chỉ email"
                            />
                        </div>

                        <div class="form-group">
                            <input
                                type="email"
                                class="form-control my-3 py-4 rounded-0"
                                v-model="user.fullname"
                                placeholder="Tên tài khoản"
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

                        <div class="form-group">
                            <input
                                type="password"
                                class="form-control my-3 py-4 rounded-0"
                                v-model="user.password_confirmation"
                                placeholder="Xác nhận mật khẩu"
                            />
                        </div>

                        <p>
                            Kiểm tra 2 mật khẩu
                            <span v-if="user.password_confirmation != ''">
                                <span
                                v-if="user.password_confirmation == user.password"
                                class="h5 text-white float-right"
                                >
                                    <b-icon icon="check" class="rounded-circle bg-primary">
                                    </b-icon>
                                </span>

                                <span v-else class="h5 text-white float-right">
                                    <b-icon icon="exclamation" class="rounded-circle bg-danger">
                                    </b-icon>
                                </span>
                            </span>
                        </p>
                        <button 
                            type="submit" 
                            class="btn rounded-0 btn-block btn-lg btn-success"
                            @click="handle()"
                        >
                            Đăng ký
                        </button>

                        <p class="mt-4 text-right">
                            <router-link 
                                :to="{ name: 'login' }"
                                class="text-decoration-none"
                            >
                                <b-icon icon="arrow-left"></b-icon> Đã có tài khoản
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
                email: '',
                password: '',
                password_confirmation: '',
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
        ...mapActions(['register']),
        async handle() {
            await this.register(this.user)
            this.join = !true
        }
    },

    created() {
        if(this.getStatus == true)
            this.$router.push({ name: "home" });
    }
}
</script>