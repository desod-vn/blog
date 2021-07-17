<template>
    <div v-if="show">
        <CategoryList :categories="getPost.categories" />
        <div class="col-12">
            <div class="h1 title m-3">{{ getPost.name }}</div>
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <router-link 
                        :to="{ 
                            name: 'one-user',
                            params: {
                                id: getPost.user.id,
                                slug: getPost.user.slug
                            } 
                        }"
                        class="text-decoration-none text-dark font-weight-bold"            
                    >
                        <img 
                            height="40px"
                            width="40px"
                            :src="getPost.user.avatar || '/images/default-thumb.png'" 
                            class="fit rounded-circle mr-2" 
                            alt="" 
                        />
                        {{ getPost.user.fullname }}
                    </router-link>
                    đăng cách đây 
                    {{ moment(getPost.created_at).locale('vi').fromNow() }}
                </div>
                <div>
                    <b-icon icon="eye-fill" /> {{ getPost.view }} lượt xem
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="ml-lg-5 my-5 content">
                <p>{{ getPost.description }}</p>
                <img 
                    height="300px"
                    width="100%"
                    :src="getPost.image || '/images/default-thumb.png'" 
                    class="p-1 fit" 
                    alt="" 
                />
                <p v-html="getPost.content" class="p-3"></p>
            </div>
        </div>

        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <a 
                        :href="'https://www.facebook.com/sharer/sharer.php?u=' + url" 
                        class="me-4 text-reset"
                        target="_blank"
                    >
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a 
                        :href="'http://www.twitter.com/share?url=' + url" 
                        class="me-4 text-reset"
                        target="_blank"
                    >
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
                
            </div>
            <hr />
            <div class="text-center my-2">
                <router-link 
                    :to="{ name: 'update-post' }"
                    v-if="getPost.user.id == getUser.id"
                    class=" btn btn-dark rounded-0"
                >
                    <b-icon icon="pencil-square" /> 
                    <span class="d-none d-lg-inline">Sửa bài viết</span>
                </router-link>

                <router-link 
                    :to="{ name: 'update-post' }"
                    v-if="getPost.user.id == getUser.id"
                    class=" btn btn-danger rounded-0"
                >
                    <b-icon icon="trash" /> 
                    <span class="d-none d-lg-inline">Xóa bài viết</span>
                </router-link>
            </div>
        </div>

        <div class="alert alert-secondary">
            <div class="row">
                <div class="col-4 text-center">
                    <router-link 
                        :to="{ 
                            name: 'one-user',
                            params: {
                                id: getPost.user.id,
                                slug: getPost.user.slug
                            } 
                        }"
                        class="text-decoration-none "            
                    >
                        <img 
                            height="100px"
                            width="100px"
                            :src="getPost.user.avatar || '/images/default-thumb.png'" 
                            class="fit rounded-circle" 
                            alt="" 
                        />
                    </router-link>   
                </div>
                <div class="col-8">
                    <div class="text-dark h4 font-weight-bold">
                        Tác giả: 
                        <router-link 
                            :to="{ 
                                name: 'one-user',
                                params: {
                                    id: getPost.user.id,
                                    slug: getPost.user.slug
                                } 
                            }"
                            class="text-decoration-none text-dark"            
                        >
                            {{ getPost.user.fullname }}
                        </router-link> 
                    </div>
                    <div class="">
                        {{ getPost.user.story }}
                    </div>
                </div>
            </div>
        </div>
        <Comment :post="getPost.id" :comments="getPost.comments" />
    </div>
</template>


<script>
import { mapActions, mapGetters } from 'vuex'

/*****COMPONENTS*****/

import moment from 'moment'
import CategoryList from '../../components/CategoryList'
import Comment from '../../components/post/Comment'


export default {
    data() {
        return {
            moment: moment,
            id: this.$route.params.id,
            slug: this.$route.params.slug,
            show: false,
        }
    },

    components: {
        CategoryList,
        Comment,
    },

    computed: {
        ...mapGetters([
            'getPost',
            'getUser'
        ])
    },

    watch: {
        getPost() {
            this.show = true
            if(this.slug != this.getPost.slug)
                this.$router.push({ name: 'home' })
        }  
    },

    methods: {
        ...mapActions(['onePost']),
        handle() {
            this.onePost(this.id)
        },
    },

    created() {
        this.handle()
        this.url = window.location.href
    },

    metaInfo() {
        return { 
            title: `Bài viết ${this.getPost.name}`,
        }
    }
    
}
</script>

<style scoped>
.title {
    font-size: 2.5rem;
    font-weight: bold;
    letter-spacing: 3px;
}
.content {
    font-size: 1.25rem;
    padding: 20px;
    text-indent: 10px;
    font-family: 'Times New Roman', Times, serif;
    letter-spacing: 0.25px;
    line-height: 1.5;

}
.fit {
    object-fit: cover;
}
</style>