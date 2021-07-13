<template>
    <section id="one-user">
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
                        <div class="row mt-2 mb-5 p-2">

                            <div class="col-4">
                                <router-link to="">
                                    <img 
                                        height="200px"
                                        width="100%"
                                        :src="getUserInfo.avatar || '/images/default-thumb.png'" 
                                        class="border p-1 fit" 
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

                        <b-tabs
                            active-nav-item-class="mb-1 text-primary" 
                            content-class="bg-white"
                            fill
                        >
                        
                            <b-tab 
                                title="Thông tin" 
                                :active="action == '' ? true : false"
                                title-link-class="border-white"
                            >
                                <InfoUser :moment="moment" :getUserInfo="getUserInfo" />
                            </b-tab>
                        
                            <b-tab 
                                title="Bài viết" 
                                :active="action == 'posts' ? true : false"
                                title-link-class="border-white"
                            >
                                <Post 
                                    v-if="show"
                                    :moment="moment" 
                                    :posts="getUserPost"
                                />
                            </b-tab>

                            <b-tab 
                                title="Bình luận" 
                                :active="action == 'comments' ? true : false"
                                title-link-class="border-white"
                            >
                                <Comment 
                                    v-if="show"
                                    :moment="moment" 
                                    :comments="getUserComment" 
                                    :user="getUser"
                                    :userInfo="getUserInfo"
                                />
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
import Post from '../../components/user/oneUser/Post';
import Comment from '../../components/user/oneUser/Comment';

export default {
    data() {
        return {
            moment: moment,
            id: this.$route.params.id,
            slug: this.$route.params.slug,
            action: this.$route.query.action,
            show: false,
        }
    },

    components: {
        InfoUser,
        Post,
        Comment,
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
        ...mapGetters([
            'getStatus',
            'getUserInfo',
            'getUser',
            'getUserPost', 
            'getUserComment'
        ])
    },

    methods: {
        ...mapActions(['oneUser']),
        handle() {
            this.oneUser(this.id)
        },

    },

    created(){
        this.handle()
    },

    mounted() {
        setTimeout(() =>
        {
            this.show = true
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
.fit {
    object-fit: cover;
}
.stick {
    top: 0;
    right: 0;
    z-index: 1;
    display: inline-block;
    transform: translateX(-10%);
}
.user-name {
    font-size: 2rem;
    font-weight: 500;
}
.on:hover, .on:focus{
    border: none;
}
.on {
    border: orangered;
    background: olivedrab!important;
}

</style>