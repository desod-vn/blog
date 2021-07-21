<template>
    <section v-if="show">
        <div class="h1 title"> BÀI VIẾT MỚI NHẤT </div>
            <div class="row">
                <div 
                    class="col-6 mb-5" 
                    v-for="(post, index) in getNewPost.data" 
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
        <div class="text-center">
            <div class="d-flex p-2 justify-content-center">
            <pagination
              v-model="page"
              :records="getNewPost.total"
              :per-page="getNewPost.per_page"
              @paginate="getLatestPost"
              :options="{ texts: { count: '' } }"
            />
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
.card-h {
    height: 300px;
}
</style>

<script>
import { mapActions, mapGetters } from 'vuex'

import Pagination from 'vue-pagination-2'
export default {
    data(){
        return {
            page: 1,
            show: false,
        }
    },
    components: {
        Pagination,
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