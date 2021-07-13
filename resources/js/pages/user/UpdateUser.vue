<template>
    <div class="container">
        <div class="mx-auto col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 col-xxl-6">
            <div class="h2 mb-3 text-center">Chỉnh sửa thông tin</div>

            <div class="form-group">
                <label class="form-control-label">
                    Tên đăng nhập:
                </label>
                <input
                    type="text"
                    name="name"
                    class="form-control border rounded-0"
                    v-model="getUser.name"
                    disabled
                />
            </div>

            <div class="form-group">
                <label class="form-control-label">
                    Địa chỉ email:
                </label>
                <input
                    type="email"
                    name="name"
                    class="form-control border rounded-0"
                    v-model="getUser.email"
                    disabled
                />
            </div>

            <div class="form-group text-right">
                <router-link 
                    :to="{ name: 'change-password' }"
                    class="text-decoration-none"
                >
                    <b-icon icon="key-fill" /> Đổi mật khẩu
                </router-link>
            </div>

            <div class="form-group">
                <label class="form-control-label">
                    Tên tài khoản:
                    <span class="text-danger">*</span>
                </label>
                <input
                    type="text"
                    name="name"
                    class="form-control border rounded-0"
                    v-model="getUser.fullname"
                />
            </div>

            <div class="form-group row">
                <div class="col-4">
                  <img 
                    height="200px"
                    width="100%"
                    :src="urlImage || getUser.avatar || '/images/default-thumb.png'" 
                    class="border p-1 fit" 
                    alt=""
                />
                </div>
                <div class="col-8">
                <label class="form-control-label">
                    Ảnh đại diện:
                    <span class="text-danger">*</span>
                </label>
                <input
                    type="file"
                    name="name"
                    @change="onFile"
                    class="form-control border rounded-0"
                />
                <div class="small font-italic mt-2">
                    Tối đa 5 MB - png, jpg, jpeg, gif.
                    <hr />
                    Ảnh đại hiện được điều chỉnh kích thước hiện thị tự động.
                    Để có ảnh đại diện hoàn hảo nhất, bạn <b>nên</b> chọn ảnh có tỉ lệ 1:1.
                </div>
                </div>
            </div>

            <div class="form-group">
                <label class="form-control-label">
                    Giới thiệu bản thân:
                    <span class="text-danger">*</span>
                </label>
                <textarea
                    class="form-control border rounded-0"
                    rows="3"
                    placeholder="Giới thiệu bản thân"
                    v-model="getUser.story"
                ></textarea>
            </div>

           <div class="form-group">
                <label class="form-control-label">
                    Giới tính: 
                    <span class="text-danger">*</span>
                </label>
                <br />

                <div class="form-check form-check-inline">
                    <input 
                        class="form-check-input" 
                        type="radio"
                        name="gender"
                        id="male"
                        value="Nam"
                        v-model="getUser.gender"
                        checked='checked'
                    />
                    <label class="form-check-label" for="male">Nam</label>
                </div>

                <div class="form-check form-check-inline">
                    <input 
                        class="form-check-input" 
                        type="radio"
                        name="gender"
                        id="female"
                        value="Nữ"
                        v-model="getUser.gender"
                    />
                    <label class="form-check-label" for="female">Nữ</label>
                </div>

                <div class="form-check form-check-inline">
                    <input 
                        class="form-check-input" 
                        type="radio"
                        name="gender"
                        id="other"
                        value="Khác"
                        v-model="getUser.gender"
                    />
                    <label class="form-check-label" for="other">Khác</label>

                </div>
            </div>

            <div class="form-group">
                <label class="form-control-label">
                    Số điện thoại: 
                    <span class="text-danger">*</span>
                </label>
                <input
                    type="number"
                    name="name"
                    class="form-control border rounded-0"
                    step="1"
                    v-model="getUser.phone"
                    placeholder="0123456789"
                />
            </div>

            <div class="form-group">
                <label class="form-control-label">
                    Ngày sinh: 
                    <span class="text-danger">*</span>
                </label>
                <input
                    type="date"
                    name="name"
                    max="9999-12-31"
                    v-model="getUser.birthday"
                    class="form-control border rounded-0"
                />
            </div>

            <div class="form-group">
                <label class="form-control-label">
                    Địa chỉ:
                    <span class="text-danger">*</span>
                </label>
                <input
                    type="text"
                    name="name"
                    class="form-control border rounded-0"
                    placeholder="Địa chỉ"
                    v-model="getUser.address"
                />
            </div>
            <Error v-if="errors" :errors="errors" />
            <div class="d-flex align-items-center">
                <button 
                    type="submit" 
                    class="mt-2 btn btn-block border btn-lg rounded-0 btn-info text-white"
                    @click="handle()"
                >
                CẬP NHẬT
                </button>
            </div>
        </div>
    </div>       
</template>
<script>
import { mapActions, mapGetters, mapMutations } from 'vuex';

/*****COMPONENTS*****/

import Error from '../../components/Error';

export default {
    data() {
        return {
            image: '',
            urlImage: '',
            errors: false,
        }
    },

    components: {
        Error,
    },

    computed: {
        ...mapGetters([
            'getUser',
            'getError',
            'getUserUpdate'
        ])
    },

    watch: {
        getError () {
            this.errors = this.getError
        },

        getUserUpdate() {
            if(this.getUserUpdate == true)
            {
                this.SET_USERUPDATE(false)
                this.$router.push({ 
                    name: 'one-user',
                    params: { id: this.getUser.id, slug: this.getUser.slug }
                })
            }
        }

    },

    methods: {
        ...mapMutations(['SET_USERUPDATE']),
        ...mapActions(['updateUser', 'avatarUser']),
        handle() {
            if (this.image) {
                let user = new FormData();

                user.append("id", this.getUser.id)
                user.append("image", this.image)

                this.avatarUser(user)
            }

            this.updateUser(this.getUser)
        },

        onFile (e) {
            this.image = e.target.files[0]
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
    }
}
</script>


<style scoped>
.fixed--image {
    height: 300px;
    max-width: 1000px;
}
.fit {
    object-fit: cover;
}
</style>