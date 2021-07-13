 <template>
	<div class="container">
        <div class="mx-auto col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 col-xxl-6">
            <div class="h2 mb-3 text-center">Tạo bài viết mới</div>
			
			<div class="form-group">
				<label class="form-control-label">
                    Tên bài viết:
                    <span class="text-danger">*</span>
                </label>
                <input
                    type="text"
                    name="name"
                    class="form-control border rounded-0 p-3"
					placeholder="Tên bài víết"
                    v-model="post.name"
                />
            </div>

            <div class="form-group row">
				<label class="form-control-label">
                    Hình ảnh bài viết:
                    <span class="text-danger">*</span>
                </label>
                 <div class="small font-italic mt-2">
					Tối đa 2 MB - png, jpg, jpeg, gif.
                    <hr />
                    Hình ảnh bài viết được điều chỉnh kích thước hiện thị tự động.
                    Để có hình ảnh bài viết hoàn hảo nhất, bạn <b>nên</b> chọn ảnh có tỉ lệ 16:9.
                </div>
                <div class="col-12">
                  <img 
                    height="200px"
                    width="100%"
                    :src="urlImage || '/images/no-image.jpg'" 
                    class="border p-1 fit" 
                    alt=""
                />
                </div>

                <div class="col-12">
                <input
                    type="file"
                    name="name"
                    class="form-control border rounded-0"
                    @change="onFile"
                />
                </div>
            </div>

            <div class="form-group">
				<label class="form-control-label">
                    Mô tả bài viết:
                </label>
                <textarea
                    class="form-control border rounded-0"
                    rows="3"
                    placeholder="Mô tả bài viết"
                    v-model="post.description"
                ></textarea>
            </div>

            <div class="form-group">
				<label class="form-control-label">
                    Nội dung bài viết:
                    <span class="text-danger">*</span>
                </label>
				<Editor
					api-key="6feu1v34eos8yi81r4rc8m7ldmtca0c8hdal79feshheclm3"
					:init="{
						height: 500,
						menubar: false,
						plugins: [
							'advlist autolink lists link image charmap print preview anchor',
							'searchreplace visualblocks code fullscreen',
							'insertdatetime media table paste code help wordcount'
						],
						toolbar:
							`undo redo | formatselect | bold italic backcolor | 
							alignleft aligncenter alignright alignjustify | 
							bullist numlist outdent indent | removeformat | help`
					}"
                    v-model="post.content"
				/>
			</div>
            
            <div class="form-group">
                <label class="form-control-label">
                    Chuyên mục:
                    <span class="text-danger">*</span>
                </label>
                
                <div class="border p-3">
                    <div class="input-group mt-3 mb-2">

                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <b-icon icon="search" />
                            </span>
                        </div>
                        
                        <input
                            type="text"
                            class="form-control"
                            v-model="category"
                            @change="findCategory(category)"
                        />

                    </div>

                    <div class="py-3">
                        <span 
                            v-for="(category, index) in getAllCat" 
                            :key="index"
                        >
                            <input
                                :value="category.id"
                                type="checkbox"
                                class="d-none"
                                :ref="`category.${category.id}`"
                                v-model="post.categories"
                            />

                            <span
                                @click="handleClickCategory(`category.${category.id}`)"
                                class="btn btn-outline-primary rounded-pill m-1"
                            >
                                {{ category.name }}
                            </span>

                        </span>
                    </div>
                </div>
            </div>
            <Error v-if="errors" :errors="errors" />
            <div class="d-flex align-items-center">
                <button 
                    type="submit"
                    @click="handle()"
                    class="mt-2 btn btn-block border btn-lg rounded-0 btn-success"
                >
                    TẠO BÀI VIẾT
                </button>
            </div>
		</div>
	</div>
</template>


<script>
import { mapActions, mapGetters, mapMutations } from 'vuex';

/*****COMPONENTS*****/

import Error from '../../components/Error';

import Editor from '@tinymce/tinymce-vue'

export default {
    data() {
        return {
            post: {
                name: '',
                image: '',
                description: '',
                content: '',
                categories: [],
            },
            category: '',
            urlImage: '',
            errors: false,
        }
    },

   	components: {
    	Editor,
        Error,
   	},

    computed: {
        ...mapGetters([
            'getAllCat',
            'getPost',
            'getError',
        ])
    },

    watch: {
        getError () {
            this.errors = this.getError
        },

        getPost() {
                this.$router.push({ 
                    name: 'one-post',
                    params: { id: this.getPost.id, slug: this.getPost.slug }

                })
        }
    },

    methods: {
        ...mapMutations(['SET_POSTUPDATE']),
        ...mapActions(['allCat', 'createPost']),
        handle() {
            let post = new FormData();

            post.append("name", this.post.name)
            post.append("image", this.post.image)
            if(this.post.description) post.append("description", this.post.description)
            post.append("content", this.post.content)

            for (const category of this.post.categories)
                post.append("categories[]", category)

            this.createPost(post)
        },

        handleClickCategory(ref) {
            this.$refs[ref][0].click()
        },

        findCategory(category) {
            this.allCat(category)
        },

        onFile (e) {
            this.post.image = e.target.files[0]
            this.urlImage = e.target.files[0]
            this.createImage(this.urlImage)
        },

        createImage (file) {
            let reader = new FileReader();
            reader.onload = (e) => {
                this.urlImage = e.target.result
            }
            reader.readAsDataURL(file)
        },
    },

    created() {
        this.allCat()
    }
    
}
</script>

<style scoped>
input[type=checkbox]:checked + span {
    background: #0091ff;
    font-weight: bold;
    border: 1px dotted #0091ff;
    color: white;
}
input[type=checkbox]:checked + span::after {
    content: '+';
}
.fit {
    object-fit: cover;
}
</style>