<template>
    <section>
        <Breadcrumb :breadcrumb="breadcrumb" />
        <Error :error="error" />
        <div class="flex flex-col justify-center items-center">
            <div class="lg:w-1/2 w-full">
                <h1 class="tracking-wider text-xl mb-2">
                    Nhập tên chuyên mục: 
                </h1>
                <input 
                    v-model="category.name"
                    type="text" 
                    class="bg-gray-100 border-2 border-gray-100 focus:outline-none block w-full py-3 px-4 rounded-lg focus:border-gray-500" 
                    placeholder="Chuyên mục" 
                />
                
                <div class="my-2">
                    <button 
                        @click="handle()"
                        type="submit" 
                        class="border-2 uppercase border-blue-200 focus:outline-none bg-blue-400 text-white font-bold tracking-wider block py-3 px-5 rounded-lg focus:border-blue-500 hover:bg-blue-500"
                    >
                        Tạo mới
                    </button>
                </div>
            </div>
            
        </div>
    </section>
</template>
<script>
import desod from '../../../utils/axios'
// Components List
import Breadcrumb from '../../../components/Breadcrumb'
import Error from '../../../components/Error'

export default {
    data() {
        return {
            breadcrumb: [
                {
                    link: 'dashboard',
                    name: 'Quản trị',
                },
                {
                    link: 'create-category',
                    name: 'Thêm chuyên mục',
                }
            ],
            error: {},
            category: {
                name: '',
            }
        }
    },
    components: {
        Breadcrumb,
        Error
    },
    methods: {
        handle() {
            desod
                .post(`category`, this.category)
                .then(response => {
                    this.error = {}
                    if (response.data.status) {
                        alert('Thành công')
                    }
                })
                .catch(error => {
                    this.error = error.response.data.errors
                })
        }
    }
}
</script>