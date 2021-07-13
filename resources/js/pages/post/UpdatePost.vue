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
                />
            </div>

            <div class="form-group row">
				<label class="form-control-label">
                    Hình ảnh bài viết:
                    <span class="text-danger">*</span>
                </label>
                <div class="col-12">
                  <img 
                    height="200px"
                    width="100%"
                    :src="'/images/no-image.jpg'" 
                    class="border p-1 fit" 
                    alt=""
                />
                </div>

                <div class="col-12">
                <input
                    type="file"
                    name="name"
                    @change="onFile"
                    class="form-control border rounded-0"
                />
                <div class="small font-italic mt-2">
					Tối đa 5 MB - png, jpg, jpeg, gif.
                    <hr />
                    Hình ảnh bài viết được điều chỉnh kích thước hiện thị tự động.
                    Để có hình ảnh bài viết hoàn hảo nhất, bạn <b>nên</b> chọn ảnh có tỉ lệ 16:9.
                </div>
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
                            <span class="input-group-text"><b-icon icon="search" /></span>
                        </div>
                        <input
                            type="text"
                            class="form-control"
                        />
                    </div>

                    <div class="pt-3 pb-3">
                        <span v-for="place in 10" :key="place">
                            <span
                                :class="
                                    true
                                        ? 'btn btn-dark rounded-pill m-1'
                                        : 'btn btn-outline-dark rounded-pill m-1'
                                "
                            >
                                {{ place }}
                            </span>
                        </span>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center">
                <button 
                    type="submit" 
                    class="mt-2 btn btn-block border btn-lg rounded-0 btn-success"
                    @click="handle()"
                >
                    SỬA BÀI VIẾT
                </button>
            </div>
		</div>
	</div>
</template>


<script>
import Editor from '@tinymce/tinymce-vue'

export default {
   	components: {
    	Editor
   	}
}
</script>

