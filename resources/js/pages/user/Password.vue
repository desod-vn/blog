<template>
    <div class="container">
        <div class="mx-auto col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 col-xxl-6">
            <div class="h2 mb-3 text-center">Đổi mật khẩu</div>

            <div class="form-group">
                <label class="form-control-label">
                    Mật khẩu cũ: 
                    <span class="text-danger">*</span>
                </label>
                <input
                    type="password"
                    name="oldPassword"
                    class="form-control border rounded-0"
                    v-model="user.oldPassword"
                />
            </div>

            <div class="form-group">
                <label class="form-control-label">
                    Mật khẩu mới: 
                    <span class="text-danger">*</span>
                </label>
                <input
                    type="password"
                    name="password"
                    class="form-control border rounded-0"
                    v-model="user.password"
                />
            </div>

            <div class="form-group">
                <label class="form-control-label">
                    Xác nhận mật khẩu mới: 
                    <span class="text-danger">*</span>
                </label>
                <input
                    type="password"
                    name="password_confirmation"
                    class="form-control border rounded-0"
                    v-model="user.password_confirmation"
                />
            </div>

            <Error v-if="errors" :errors="errors" />
            <div class="alert alert-info" v-if="getUserUpdate">
                Đổi mật khẩu thành công !
            </div>
            <div class="d-flex align-items-center">
                <button 
                    type="submit" 
                    @click="handle()" 
                    class="btn btn-lg rounded-0 btn-block btn-success"
                >
                    Đổi mật khẩu
                </button>
            </div>

        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters, mapMutations } from 'vuex';

/*****COMPONENTS*****/

import Error from '../../components/Error'

export default {
    data() {
        return {
            user: {
                oldPassword: '',
                password: '',
                password_confirmation: '',
                id: '',
            },
            errors: {},
        };
    },

    computed: {
        ...mapGetters(['getUser', 'getError', 'getUserUpdate'])
    },

    watch: {
        getError () {
            this.errors = this.getError
        },

        getUser (){
            this.user.id = this.getUser.id
        },

        getUserUpdate() {
            if(this.getUserUpdate == true)
            {
                for (let key in this.user) {
                    if(key != 'id')
                        this.user[key] = ''
                }
                setTimeout(() => this.SET_USERUPDATE(false), 3000)
            }
        }
    },

    components: {
        Error,
    },
    
    methods: {
        ...mapMutations(['SET_USERUPDATE']),
        ...mapActions(['passwordUser']),
        handle() {
            this.passwordUser(this.user)
        },
    },

    created() {
        this.user.id = this.getUser.id
    }

}
</script>

<style scoped>
.login {
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}
.login--main {
    background: #fff;
    padding: 2rem 2rem 4rem 2rem;
    border-radius: 10px;
}
.login--title {
    text-align: center;
    font-size: 2rem;
    font-weight: bold;
    padding: 2rem 0 2rem;
}
</style>