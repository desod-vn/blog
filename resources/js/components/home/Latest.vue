<template>
    <section v-if="show">
        <div class="h1 title"> BÀI VIẾT MỚI NHẤT </div>
            <div class="row">
                <div 
                    class="col-6 mb-5" 
                    v-for="(post, index) in getNewPost" 
                    :key="index">
                <div class="card card-h">
                    <router-link
                        :to="{
                        name: 'one-post',
                        params: { id: post.id, slug: post.slug },
                        }"
                        class="text-decoration-none h5 text-dark"
                    >
                        <img
                            class="card-img-top fit"
                            :src="post.image"
                            height="200px"
                            alt="Card image cap"
                        />
                    </router-link>
                <div class="card-body">
                    <h4 class="card-title">
                    <router-link
                        :to="{
                        name: 'one-post',
                        params: { id: post.id, slug: post.slug },
                        }"
                        class="text-decoration-none h5 text-dark"
                    >
                        {{ post.name }}
                    </router-link>
                    </h4>
                    
                </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.title {
    font-size: 2.5rem;
    letter-spacing: 2px;
    padding: 0 0 0 10px;
    border-left: 5px solid #07d107; 
}
.fit {
    object-fit: cover;
}
.card-h {
    height: 300px;
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
        ...mapGetters(['getNewPost'])
    },

    watch: {
        getNewPost() {
            this.show = true
        }
    },

    methods: {
        ...mapActions(['getLatestPost'])
    },

    created(){
        this.getLatestPost()
    },
}
</script>