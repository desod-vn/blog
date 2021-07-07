<template>
    <aside class="flex flex-col">
        <div class="flex-shink border-r shadow-2xl border-gray-300 md:max-w-xs max-w-sx h-full md:h-screen">
            <div class="px-3 p-2">
                <section class="text-4xl text-center text-gray-700 bold tracking-widest mb-5">
                    DASHBOARD
                </section>
                <div class="">
                    <section class="p-2">
                        <div class="p-1 text-2xl semibold tracking-wide text-blue-500 mb-2">
                            CHUYÊN MỤC
                        </div>
                        
                        <div class="my-1 px-3 py-1 hover:bg-gray-600 hover:border rounded-xl hover:text-white">
                            <router-link 
                                :to="{ name: 'create-category'}" 
                                class="hover:text-white hover:no-underline"
                            >
                                <i class="fas fa-plus"></i>
                                Thêm chuyên mục mới
                            </router-link>
                        </div>

                        <div class="my-1 px-3 py-1 hover:bg-gray-600 hover:border rounded-xl hover:text-white">
                            <router-link to="/" class="hover:text-white hover:no-underline">
                                <i class="fas fa-list-ul"></i>
                                Danh sách chuyên mục
                            </router-link>
                        </div>

                        <div class="my-1 px-3 py-1 hover:bg-gray-600 hover:border rounded-xl hover:text-white">
                            <router-link to="/" class="hover:text-white hover:no-underline">
                                <i class="fas fa-heart"></i>
                                Chuyên mục yêu thích
                            </router-link>
                        </div>
                    </section>

                    <section class="p-2">
                        <div class="p-1 text-2xl semibold tracking-wide text-blue-500 mb-2">
                            BÀI VIẾT
                        </div>
                        
                        <div class="my-1 px-3 py-1 hover:bg-gray-600 hover:border rounded-xl hover:text-white">
                            <router-link to="/" class="hover:text-white hover:no-underline">
                                <i class="fas fa-book-open"></i>
                                Quản lý bài viết
                            </router-link>
                        </div>

                        <div class="my-1 px-3 py-1 hover:bg-gray-600 hover:border rounded-xl hover:text-white">
                            <router-link to="/" class="hover:text-white hover:no-underline">
                                <i class="fas fa-star"></i>
                                Top bài viết
                            </router-link>
                        </div>

                        <div class="my-1 px-3 py-1 hover:bg-gray-600 hover:border rounded-xl hover:text-white">
                            <router-link to="/" class="hover:text-white hover:no-underline">
                                <i class="fas fa-chart-bar"></i>
                                Thống kê thời gian đọc
                            </router-link>
                        </div>
                    </section>

                    <section class="p-2">
                        <div class="p-1 text-2xl semibold tracking-wide text-blue-500 mb-2">
                            THÀNH VIÊN
                        </div>
                        
                        <div class="my-1 px-3 py-1 hover:bg-gray-600 hover:border rounded-xl hover:text-white">
                            <router-link to="/" class="hover:text-white hover:no-underline">
                                <i class="fas fa-users"></i>
                                Danh sách thành viên
                            </router-link>
                        </div>

                        <div class="my-1 px-3 py-1 hover:bg-gray-600 hover:border rounded-xl hover:text-white">
                            <router-link to="/" class="hover:text-white hover:no-underline">
                                <i class="fas fa-user-check"></i>
                                Thành viên nổi bật
                            </router-link>
                        </div>

                        <div class="my-1 px-3 py-1 hover:bg-gray-600 hover:border rounded-xl hover:text-white">
                            <router-link to="/" class="hover:text-white hover:no-underline">
                                <i class="fas fa-id-card"></i>
                                <span class="text-red-500">Yêu cầu thẻ thành viên</span>
                            </router-link>
                        </div>
                    </section>

                    <section class="p-2">
                        <div class="p-1 text-2xl semibold tracking-wide text-blue-500 mb-2">
                            CẤU HÌNH
                        </div>
                        
                        <div class="my-1 px-3 py-1 hover:bg-gray-600 hover:border rounded-xl hover:text-white">
                            <router-link to="/" class="hover:text-white hover:no-underline">
                                <i class="fas fa-sliders-h"></i>
                                Cài đặt
                            </router-link>
                        </div>

                        <div class="my-1 px-3 py-1 hover:bg-gray-600 hover:border rounded-xl hover:text-white">
                            <router-link to="/" class="hover:text-white hover:no-underline">
                                <i class="fas fa-trash-alt"></i>
                                Thùng rác
                            </router-link>
                        </div>

                        <div class="my-1 px-3 py-1 hover:bg-gray-600 hover:border rounded-xl hover:text-white">
                            <router-link to="/" class="hover:text-white hover:no-underline">
                                <i class="fas fa-flag"></i>
                                Báo cáo
                            </router-link>
                        </div>
                    </section>
                </div>
            </div>
            
        </div>
    </aside>
</template>

<script>
export default {
    
}
</script>