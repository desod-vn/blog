<template>
    <div class="container">
        <div class="mx-auto col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6 col-xxl-6">
            <div class="h2 mb-3 text-center">Chỉnh sửa thông tin</div>
            <div class="form-group">
                <label class="form-control-label">
                    Tên tài khoản:
                    <span class="text-danger">*</span>
                </label>
                <input
                    type="text"
                    name="name"
                    class="form-control border rounded-0"
                />
            </div>

            <div class="form-group row">
                <div class="col-4">
                  <img 
                    height="200px"
                    width="100%"
                    :src="'http://localhost:8000/users-img/cjxebarjspCoayB0PCEZPOlfMC4AWIIdmDIckdlH.jpg'" 
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
                    class="form-control border rounded-0"
                />
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
                    />
                    <label class="form-check-label" for="female">Nữ</label>
                </div>

                <div class="form-check form-check-inline">
                    <input 
                        class="form-check-input" 
                        type="radio"
                        name="gender"
                        id="other"
                        value="khác"
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
                    placeholder="0123456789"
                />
            </div>

            <div class="form-group">
                <label class="form-control-label">Ngày sinh: </label>
                <input
                    type="date"
                    name="name"
                    max="9999-12-31"
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
                />
            </div>
            <div class="d-flex align-items-center">
                <button type="submit" class="mt-2 btn btn-block border rounded-0 btn-info text-white">Cập nhật</button>
            </div>
        </div>
    </div>       
</template>
<script>
export default {
    data() {
        return {

        }
    },

    components: {
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