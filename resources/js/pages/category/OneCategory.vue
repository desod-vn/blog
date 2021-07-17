 <template>
    <div class="col-12">
        <div class="h1 title">{{ getOneCat.name }}</div>
        <div class="p-2 text-primary">
            {{  getOneCat.posts ? getOneCat.posts.length : 0 }} bài viết
        </div>
        <div 
            class="row mb-5"
            v-for="(post, index) in getOneCat.posts.slice(0, more)" 
            :key="index"
        >
            <div class="col-4">
                <router-link
                    :to="{
                        name: 'one-post',
                        params: { id: post.id, slug: post.slug },
                    }"
                    class="text-decoration-none h5 text-dark font-weight-bold"
                >
                    <img 
                        height="200px" 
                        width="100%" 
                        :src="post.image" 
                        class="fit" 
                        alt="" 
                    />
                </router-link>
            </div>
        
            <div class="col-8">
                <router-link
                    :to="{
                        name: 'one-post',
                        params: { id: post.id, slug: post.slug },
                    }"
                    class="text-decoration-none h4 text-dark font-weight-bold"
                >
                    {{ post.name }}
                </router-link>
                <div>
                    <span 
                        v-for="(category, index) in post.categories"
                        :key="index"
                        class="small"
                    >
                        <router-link 
                            :to="{
                                name: 'one-category',
                                params: { id: category.id, slug: category.slug }
                            }"
                            class="text-uppercase text-decoration-none font-weight-bold"
                        >
                            {{ category.name }}
                        </router-link>
                        <span v-if="index != post.categories.length - 1">
                            , 
                        </span>
                    </span>
                </div>
                <div class="p-2">
                    {{ post.description ? post.description.substr(0, 150) + ' ...' : '' }}
                    <div class="d-flex justify-content-between align-items-center py-2 border-top">
                        <div class="d-flex justify-content-between align-items-center"> 
                            <img
                                :src="post.user.avatar || '/images/default.png'"
                                class="rounded-circle fit"
                                alt=""
                                height="50px"
                                width="50px"
                            />
                            <div class="ml-3">
                                <router-link
                                    :to="{
                                        name: 'one-user',
                                        params: { id: post.user.id, slug: post.user.slug },
                                    }"
                                    class="text-decoration-none d-block text-dark font-weight-bold"
                                >
                                    {{ post.user.fullname }}
                                </router-link>
                                <b-icon icon="clock" />
                                {{ moment(post.created_at).locale('vi').fromNow() }}
                            </div>
                        </div>
                        <router-link
                            :to="{
                                name: 'one-post',
                                params: { id: post.id, slug: post.slug },
                            }"
                            class="btn btn-outline-primary rounded-0"
                        >
                            <span class="d-none d-md-inline">Đọc thêm</span>
                            <b-icon icon="three-dots" />
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <span 
                class="btn btn-outline-success my-3"
                @click="more += more"
            >
                Xem thêm ...
            </span>
        </div>
    </div> 
</template>


<script>
import { mapActions, mapGetters } from 'vuex';

/*****COMPONENTS*****/

import moment from 'moment';

export default {
    data() {
        return {
            moment: moment,
            id: this.$route.params.id,
            slug: this.$route.params.slug,
            show: false,
            more: 10,
        }
    },

    computed: {
        ...mapGetters([
            'getOneCat',
        ])
    },

    watch: {
        getOneCat() {
            if(this.slug != this.getOneCat.slug)
                this.$router.push({ name: 'home' })
        }  
    },

    methods: {
        ...mapActions(['oneCat']),
        handle() {
            this.oneCat(this.id)
        },
    },

    created() {
        this.handle()
    },

    mounted() {
        this.show = true
    }
}
</script>

<style scoped>
.title {
    font-size: 2.5rem;
    font-weight: bold;
    letter-spacing: 3px;
}
.fit {
    object-fit: cover;
}
</style>