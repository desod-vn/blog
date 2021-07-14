 <template>
	<div class="container">
        <img 
            :src="getPost.image || '/images/default-thumb.png'" 
            class="img-fluid" 
            alt="" 
        />
        <div 
            class="bg-white col-12 col-sm-12 col-md-8 mx-auto point p-5">
            <div class="h1 mb-3">{{ getPost.name }}</div>
			<span 
                v-for="(category, index) in getPost.categories"
                :key="index"
            >
            {{ category.name }}, 
            </span>
            <div class="row mt-2 mb-5 p-2">
                <div class="col-6 text-md-center">
                    <router-link to="">
                        <img 
                            height="100px"
                            width="100px"
                            :src="getPost.user.avatar || '/images/default-thumb.png'" 
                            class="p-1 fit rounded-circle" 
                            alt="" 
                        />
                    </router-link>
                </div>

                <div class="col-6 p-2">
                    <div>
                        <router-link 
                            :to="{ 
                                name: 'one-user',
                                params: {
                                    id: getPost.user.id,
                                    slug: getPost.user.slug
                                } 
                            }"
                            class="text-decoration-none"            
                        >
                            {{ getPost.user.fullname }}
                        </router-link>
                    </div>
                    <div>
                        <b-icon icon="clock-history" />
                        {{ moment(getPost.user.created_at).locale('vi').format("HH:MM - DD/MM/YYYY") }}
                    </div>
                    <div>
                        {{ getPost.view }} lượt xem.
                    </div>
                </div>

                <div class="col-12">
                    <p class="border-left mt-5">
                        {{ getPost.description }}
                    </p>
                </div>
                <div class="col-12">
                    <div v-html="getPost.content" class="p-2"></div>
                </div>
                <div class="col-12">
                    <hr />
                    <div class="position-absolute stick">
                        <router-link 
                            :to="{ name: 'update-post' }"
                            v-if="getPost.user.id == getUser.id"
                            class=" btn btn-dark rounded-0"
                        >
                            <b-icon icon="pencil-square" /> Sửa bài viết
                        </router-link>
                        <router-link 
                            :to="{ name: 'update-post' }"
                            v-if="getPost.user.id == getUser.id"
                            class=" btn btn-danger rounded-0"
                        >
                            <b-icon icon="trash" /> Xóa bài viết
                        </router-link>
                    </div>
                    <div>
                        <a href="" class="me-4 text-reset">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="" class="me-4 text-reset">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="" class="me-4 text-reset">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="" class="me-4 text-reset">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="" class="me-4 text-reset">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="" class="me-4 text-reset">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                </div>
            </div>
		</div>
        <div class="col-md-8 mx-auto">
            Để lại bình luận
            <div>
                <input type="text" class="form-control">
            </div>
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
        }
    },

    computed: {
        ...mapGetters([
            'getPost',
            'getUser'
        ])
    },

    methods: {
        ...mapActions(['onePost']),
        handle() {
            this.onePost(this.id)
        },
    },

    created() {
        this.handle()
    }
    
}
</script>

<style scoped>
.point {
    margin-top: -10%;
}
.stick {
    top: 0;
    right: 50%;
    z-index: 1;
    display: inline-block;
    transform: translateX(50%);
}
.fit {
    object-fit: cover;
}
</style>