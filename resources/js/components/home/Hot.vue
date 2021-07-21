<template>
    <section v-if="show">
        <div class="h1 title"> BÀI VIẾT HOT </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-4">
                <router-link 
                    :to="{
                        name: 'one-post', 
                        params: {
                            id: getHotPost[0].id, 
                            slug: getHotPost[0].slug
                            }
                        }"
                    class="text-decoration-none"
                >
                    <img 
                        :src="getHotPost[0].image" 
                        alt=""
                        height="300px"
                        width="100%"
                        class="fit d-block"
                    />
                    <div class="h2 mt-2 mb-5 text-dark font-weight-bold">
                        {{ getHotPost[0].name }}
                    </div>
                </router-link>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-8">
                <div 
                    v-for="(post, index) in getHotPost.slice(1,4)"
                    :key="index"
                    class="mb-3"
                >
                <div class="row">
                    <div class="col-4">
                        <router-link 
                        :to="{
                            name: 'one-post', 
                            params: {
                                id: post.id, 
                                slug: post.slug
                                }
                            }"
                        class="text-decoration-none"
                        >
                            <img 
                                :src="post.image" 
                                alt=""
                                height="100px"
                                width="100%"
                                class="fit d-block"
                        />
                        </router-link>
                    </div>
                    <div class="col-8">
                        <router-link 
                            :to="{
                                name: 'one-post', 
                                params: {
                                    id: post.id, 
                                    slug: post.slug
                                    }
                                }"
                            class="text-decoration-none h3 text-dark"
                        >
                            {{ post.name }}
                        </router-link>
                        <p class="m-2 small">
                            {{ post.description ? post.description.substr(0, 150) + '...' : '' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</template>

<style scoped>
.title {
    font-size: 1.5rem;
    letter-spacing: 2px;
    text-transform: uppercase;
    padding: 0 0 0 10px;
    margin-bottom: 3rem;
    border-left: 5px solid #07d107; 
}
.fit {
    object-fit: cover;
}
</style>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
    data(){
        return {
            show: false,
        }
    },
    
    computed: {
        ...mapGetters(['getHotPost'])
    },

    watch: {
        getHotPost() {
            this.show = true
        }
    },

    methods: {
        ...mapActions(['getHottestPost'])
    },

    created(){
        this.getHottestPost()
    },
}
</script>