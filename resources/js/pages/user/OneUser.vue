<template>
    <section id="one-user" class="mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                    <div class="border shadow">
                        <router-link 
                            :to="{ name: 'update-user' }"
                            v-if="getUserInfo.id == getUser.id"
                            class="position-absolute btn btn-dark rounded-0 stick"
                        >
                            <b-icon icon="pencil-square" /> Sửa thông tin  
                        </router-link>
                        <div class="row mb-5 p-2">

                            <div class="col-4">
                                <router-link to="">
                                    <img 
                                        :src="getUserInfo.avatar || '/images/default-thumb.png'" 
                                        class="img-thumbnail" 
                                        alt="" 
                                    />
                                </router-link>
                            </div>

                            <div class="col-8 p-2">
                                <div class="user-name">
                                    {{ getUserInfo.fullname }}
                                </div>
                                <hr>
                                <p>{{ getUserInfo.story }}</p>
                            </div>
                        </div>
                        
                        <b-tabs content-class="bg-white" fill>
                            <b-tab title="Thông tin" :active="action == '' ? true : false">
                                <InfoUser :moment="moment" :getUserInfo="getUserInfo" />
                            </b-tab>
                            <b-tab title="Bài viết" :active="action == 'posts' ? true : false">
                                <p id="post">I'm the second tab</p>
                            </b-tab>
                            <b-tab title="Bình luận" :active="action == 'comments' ? true : false">
                                <p>I'm the tab with the very, very long title</p>
                            </b-tab>
                        </b-tabs>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';

/*****COMPONENTS*****/
import moment from 'moment';

import InfoUser from '../../components/user/oneUser/Info';


export default {
    data() {
        return {
            moment: moment,
            id: this.$route.params.id,
            slug: this.$route.params.slug,
            action: this.$route.query.action
        }
    },
    components: {
        InfoUser,
    },

    watch: {
        getUserInfo() {
            if(this.slug != this.getUserInfo.slug)
                this.$router.push({ name: 'home' })
        },

        getStatus() {
            if(!this.getStatus)
                this.$router.push({ name: 'home' })
        }
    },
    computed: {
        ...mapGetters(['getStatus', 'getUserInfo', 'getUser'])
    },

    methods: {
        ...mapActions(['oneUser']),
        handle() {
            this.oneUser(this.id)
        }
    },

    created(){
        this.handle()
    },

    mounted() {
        setTimeout(() =>
        {
            if(!this.getStatus)
                this.$router.push({ name: 'home' })
        }, 500)
    },

    metaInfo() {
        return { 
            title: `Trang cá nhân của ${this.getUserInfo.fullname}`,
        }
    }
}
</script>

<style scoped>
.shadow {
    box-shadow: 2px 2px 3px #ccc;
}
.stick {
    top: 0;
    right: 0;
    transform: translateX(-10%);
}
.user-name {
    font-size: 2rem;
    font-weight: bold;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}
</style>